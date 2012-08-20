<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{%?PageTitle}</title>
    <link rel="stylesheet" type="text/css" href="{%?TemplatePath}/style/reset.css" /> 
    <link rel="stylesheet" type="text/css" href="{%?TemplatePath}/style/root.css" /> 
    <link rel="stylesheet" type="text/css" href="{%?TemplatePath}/style/grid.css" /> 
    <link rel="stylesheet" type="text/css" href="{%?TemplatePath}/style/typography.css" /> 
    <link rel="stylesheet" type="text/css" href="{%?TemplatePath}/style/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="{%?TemplatePath}/style/jquery-plugin-base.css" />
	
    <!--[if IE 7]>	  <link rel="stylesheet" type="text/css" href="{%?TemplatePath}/style/ie7-style.css" />	<![endif]-->

	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.min.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery-ui-1.8.11.custom.min.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery-settings.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/toogle.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.tipsy.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/raphael.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/analytics.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/popup.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/fullcalendar.min.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.ui.core.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.ui.mouse.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.ui.slider.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.ui.datepicker.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.ui.tabs.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.ui.accordion.js"></script>
	<script type="text/javascript" src="{%?TemplatePath}/https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="{%?TemplatePath}/js/jquery.dataTables.js"></script>
</head>
<body>
	
    <div class="loginform">
    	<div class="title"> <img src="{%?TemplatePath}/img/logo.png" width="112" height="35" /></div>
        <div class="body">
       	  <form id="form1" name="form1" method="post" action="index.php?id=login">
          	<label class="log-lab">Username/Email</label>
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
{%?LoggedIn}