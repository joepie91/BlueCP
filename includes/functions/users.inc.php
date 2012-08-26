<?php

class User extends CPHPDatabaseRecordClass {

	public $table_name = "accounts";
	public $id_field = "id";
	public $fill_query = "SELECT * FROM accounts WHERE `id` = :Id";
	public $verify_query = "SELECT * FROM accounts WHERE `id` = :Id";
	public $query_cache = 1;
	
	public $prototype = array(
		'string' => array(
			'Username' 	    => "username",
			'Hash'	            => "password",
			'Salt'			=>	"salt",
			'EmailAddress'	    => "email",
			'ActivationCode'    => "activation_code",
			'Plan'		=>	"plan"
		),
		'boolean' => array(
			'Active' 	=> "active"
		)
	);
	
	public function GenerateSalt(){
		$this->uSalt = random_string(10);
	}
	
	public function GenerateHash(){
		if(!empty($this->uSalt)){
			if(!empty($this->uPassword)){
				$this->uHash = $this->CreateHash($this->uPassword);
			} else {
				throw new MissingDataException("User object is missing a password.");
			}
		} else {
			throw new MissingDataException("User object is missing a salt.");
		}
	}
	
	public function CreateHash($input){
		global $cphp_config;
		$hash = crypt($input, "$5\$rounds=50000\${$this->uSalt}{$cphp_config->settings->salt}$");
		$parts = explode("$", $hash);
		return $parts[4];
	}
	
	public function VerifyPassword($password){
		if($this->CreateHash($password) == $this->sHash){
			return true;
		} else {
			return false;
		}
	}
	
	public static function ValidateUsername($uUsername){
		global $database;
		if($result = $database->CachedQuery("SELECT COUNT(*) FROM accounts WHERE `username` = :Username", array(':Username' => $uUsername), 1)){
			if($result->data[0]['COUNT(*)'] > 0){
	               		return false;
			} else {
				return true;
			}
		}
	}
	
	public static function ValidatePasswords($uPasswordOne, $uPasswordTwo){
		if($uPasswordOne == $uPasswordTwo){
			if(strlen($uPasswordOne) > 4){
				return true;
			}
		}
		return false;
	}
	
	public static function ValidateEmail($uEmailAddress){
		global $database;
		if(filter_var($uEmailAddress, FILTER_VALIDATE_EMAIL)) {
			if($result = $database->CachedQuery("SELECT COUNT(*) FROM accounts WHERE `email` = :Email", array(':Email' => $uEmailAddress), 1)){
				if($result->data[0]['COUNT(*)'] > 0){
	               			return false;
				} else {
					return true;
				}
			}
		} else {
			return false;
		}
	}
	
	public function GenerateAuthorizationCode(){
		$this->uActivationCode = random_string(25);
	}
	
	public function SendActivationEmail($uEmailAddress){
	$sPanelTitle = Core::GetSetting('panel_title');
		$uEmailSubject = $sPanelTitle->sValue." Activation Email";
		$uEmailContent = '<div align="center">
			BytePlan Activation<br><hr>
			<a href="http://byteplan.com/activate.php?id='.$this->uActivationCode.'" target="_blank">Click Here To Activate Your Account</a>
			</div>';
		$uEmailHeaders  = "From: noreply@byteplan.com\r\n";
		$uEmailHeaders .= "Content-type: text/html\r\n";
		return true; // This is temporary for testing until I have a way to send mail.
		if (mail($uEmailAddress, $uEmailSubject, $uEmailContent, $uEmailHeaders)) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function register($uUsername, $uPasswordOne, $uPasswordTwo, $uEmailAddress){
		global $database;
		if(User::ValidateUsername($uUsername) === true){
			if(User::ValidatePasswords($uPasswordOne, $uPasswordTwo) === true){
				if(User::ValidateEmail($uEmailAddress) === true){
					$sUser = new User(0);
					
					$sUser->GenerateAuthorizationCode();
					if($sUser->SendActivationEmail($uEmailAddress) === true){
						$sUser->uUsername = $uUsername;
						$sUser->uPassword = $uPasswordOne;
						$sUser->GenerateSalt();
						$sUser->GenerateHash();
						$sUser->uEmailAddress = $uEmailAddress;
						pretty_dump($sUser);
						$sUser->InsertIntoDatabase();
						header("Location: register.php?id=activate");
						die();
					} else {
						return "An error occured while attempting to send you an activation email. Please contact us at admin@byteplan.com";
					}
				} else {
					return "The email address you entered was invalid please try again!";
				}
			} else {
				return "Your passwords must match and must be at least 5 characters in length.";
			}
		} else {
			return "The username you entered is already in use, please try a different username.";
		} 
		
	}
	
	public static function login($uUsername, $uPassword){
		global $database;
		if($result = $database->CachedQuery("SELECT * FROM accounts WHERE (`email` = :Username || `username` = :Username)", array(
		':Username' => $uUsername), 5)){
			$sUser = new User($result);
			if($sUser->VerifyPassword($uPassword)){
				$_SESSION['user_id'] = $sUser->sId;
				header("Location: member_home.php");
				die();
			} else {
				return false;
			}
		}
	}
}
