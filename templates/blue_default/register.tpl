<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{%?PageTitle} - Register</title>
    <link rel="stylesheet" type="text/css" href="templates/blue_default/style/base.css" /> 
    <!--[if IE 7]>	  <link rel="stylesheet" type="text/css" href="templates/blue_default/style/ie7-style.css" />	<![endif]-->
	<script type="text/javascript" src="templates/blue_default/js/jquery.min.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery-ui-1.8.11.custom.min.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery-settings.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/toogle.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.tipsy.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/raphael.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/analytics.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/popup.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/fullcalendar.min.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.ui.core.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.ui.mouse.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.ui.slider.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.ui.datepicker.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.ui.tabs.js"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.ui.accordion.js"></script>
	<script type="text/javascript" src="templates/blue_default/https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="templates/blue_default/js/jquery.dataTables.js"></script>
</head>
<body>
	
    <div class="loginform">
    	<div class="title"> <img src="templates/blue_default/img/logo.png" width="112" height="35" /></div>
		 <div class="body">
		{%if isempty|ErrorMessage == false}
			<div style="z-index: 670;" class="albox errorbox">
			{%?ErrorMessage}
			<a original-title="close" href="#" class="close tips">close</a></div>
		{%/if}<br><div align="center"><strong>BlueCP Registration</strong></div><br>
		<form id="form1" name="form1" method="post" action="register.php?id=register">
          	<label class="log-lab">Username</label>
            <input name="username" type="text" class="login-input-user" id="textfield" value=""/>
			<label class="log-lab">Email Address</label>
            <input name="email" type="text" class="login-input-user" id="textfield" value=""/>
          	<label class="log-lab">Password</label>
            <input name="passwordone" type="password" class="login-input-pass" id="textfield" value=""/>
			<label class="log-lab">Password (Again)</label>
            <input name="passwordtwo" type="password" class="login-input-pass" id="textfield" value=""/>
            <input type="submit" name="button" id="button" value="Register" class="button"/>
       	  </form>
        </div>
    </div>

</div>
</body>
</html>
