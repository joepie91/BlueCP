{%if isempty|ErrorMessage == false}
	<div style="z-index: 670;" class="albox errorbox">
		{%?ErrorMessage}
		<a original-title="close" href="#" class="close tips">close</a>
	</div>
{%/if}

<form id="form1" name="form1" method="post" action="index.php?id=login">
	<label class="log-lab">Username/Email</label>
	<input name="username" type="text" class="login-input-user" id="textfield" value=""/>
	
	<label class="log-lab">Password</label>
	<input name="password" type="password" class="login-input-pass" id="textfield" value=""/>
	
	<input type="submit" name="submit" id="button" value="Login" class="button"/>
</form>

<div align="center">
	{%if ForgotPasswordEnabled == enabled}
		<a href="forgot.php">Forgot Password?</a>
	{%/if}
	
	{%if RegistrationEnabled == enabled}
		{%if ForgotPasswordEnabled == enabled} 
			| 
		{%/if}
	{%/if}
	
	{%if RegistrationEnabled == enabled}
		<a href="register.php">Register</a>
	{%/if}
</div>
