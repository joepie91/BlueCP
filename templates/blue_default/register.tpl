{%if isempty|ErrorMessage == false}
	<div style="z-index: 670;" class="albox errorbox">
		{%?ErrorMessage}
		<a original-title="close" href="#" class="close tips">close</a>
	</div>
{%/if}

<div align="center">
	<strong>BlueCP Registration</strong>
</div>

<form id="form1" name="form1" method="post" action="register.php?id=register">
	<label class="log-lab">Username</label>
	<input name="username" type="text" class="login-input-user" id="textfield" value=""/>
	
	<label class="log-lab">Email Address</label>
	<input name="email" type="text" class="login-input-user" id="textfield" value=""/>
	
	<label class="log-lab">Password</label>
	<input name="passwordone" type="password" class="login-input-pass" id="textfield" value=""/>
	
	<label class="log-lab">Password (Again)</label>
	<input name="passwordtwo" type="password" class="login-input-pass" id="textfield" value=""/>
	
	<input type="submit" name="submit" id="button" value="Register" class="button"/>
</form>
