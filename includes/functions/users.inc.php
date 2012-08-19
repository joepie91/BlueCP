<?php

// Defines the class as User
class User extends CPHPDatabaseRecordClass {

	// Select and load the accounts table
	public $table_name = "accounts";
	public $id_field = "id";
	public $fill_query = "SELECT * FROM accounts WHERE `id` = :Id";
	public $verify_query = "SELECT * FROM accounts WHERE `id` = :Id";
	public $query_cache = 1;
	
	// Define all of the variable names and their coresponding MYSQL collumn
	public $prototype = array(
		'string' => array(
			'Username' 	    => "username",
			'Password'	    => "password",
			'Salt'			=> "salt",
			'EmailAddress'	    => "email",
			'ActivationCode'    => "activation_code"
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
	
	// Function to check if a username is taken
	public static function ValidateUsername($uUsername){
		if($result = $database->CachedQuery("SELECT COUNT(*) FROM users WHERE `username` = :Username", array(':Username' => $uUsername))){
			if($result->data['COUNT(*)'] > 0){
	               		return false;
			} else {
				return true;
			}
		}
	}
	
	// Function to check the users passwords
	public static function ValidatePasswords($uPasswordOne, $uPasswordTwo){
		if($uPasswordOne == $uPasswordTwo){
			if(strlen($uPasswordOne) > 4){
			return true;
			}
		}
		return false;
	}
	
	// Function to check the users email address
	public static function ValidateEmail($uEmailAddress){
		if(filter_var($uEmailAddress, FILTER_VALIDATE_EMAIL)) {
			if($result = $database->CachedQuery("SELECT COUNT(*) FROM users WHERE `email` = :Email", array(':Email' => $uEmailAddress))){
				if($result->data['COUNT(*)'] > 0){
	               			return false;
				} else {
					return true;
				}
			}
		} else {
			return false;
		}
	}
	
	// Function takes the current timestamp and username to generate an auth code.
	public static function GenerateAuthorizationCode(){
		$uActivationCode = random_string(25);
		return $uActivationCode;
	}
	
	// Function sends a welcome email with an activation link
	public static function SendActivationEmail($uEmailAddress, $uActivationCode){
		$uEmailSubject = "BytePlan Activation Email";
		$uEmailContent = '<div align="center">
			BytePlan Activation<br><hr>
			<a href="http://byteplan.com/activate.php?id='.$uActivationCode.'" target="_blank">Click Here To Activate Your Account</a>
			</div>';
		$uEmailHeaders  = "From: noreply@byteplan.com\r\n";
		$uEmailHeaders .= "Content-type: text/html\r\n"; 
		if (mail($uEmailAddress, $uEmailSubject, $uEmailContent, $uEmailHeaders)) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to register a new user
	public static function register($uUsername, $uPasswordOne, $uPasswordTwo, $uEmailAddress){
		// Run validation of username, passwords and email
		if(User::ValidateUsername($uUsername) === true){
			if(User::ValidatePasswords($uPasswordOne, $uPasswordTwo) === true){
				if(User::ValidateEmail($uEmailAddress) === true){
		
				// Generate the activation code
				$uActivationCode = User::GenerateAuthorizationCode();
		
				// Send Email
					if(User::SendActivationEmail($uEmailAddress, $uActivationCode) === true){
		
						// Create the user
						$uSalt = User::GenerateSalt();
						$uPasswordHash = GenerateHash($uPasswordOne, $uSalt);
						$sUser = new User(0);
						$sUser->uUsername = $uUsername;
						$sUser->uPassword = $uPasswordHash;
						$sUser->uSalt = $uSalt;
						$sUser->uEmailAddress = $uEmailAddress;
						$sUser->uActivationCode = $uActivationCode;
						$sUser->InsertIntoDatabase();
						header("Location: register.php?id=activate");
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
				return "Username or password was incorrect, please try again!";
			}
		}
	}
}

