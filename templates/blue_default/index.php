<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BlueCP</title>
	<?php include('./templates/blue_default/header_includes.php'); ?>
</head>
<body>

    <div class="loginform">
    	<div class="title"> <img src="./templates/blue_default/img/logo.png" width="112" height="35" /></div>
        <div class="body">
       	  <form id="form1" name="form1" method="post" action="index.php?id=login">
          	<label class="log-lab">Username or Email</label>
            <input name="username" type="text" class="login-input-user" id="textfield" value=""/>
          	<label class="log-lab">Password</label>
            <input name="password" type="password" class="login-input-pass" id="textfield" value=""/>
            <input type="submit" name="button" id="button" value="Login" class="button"/>
       	  </form>
        </div>
    </div>
	
</div>
</body>
</html>


