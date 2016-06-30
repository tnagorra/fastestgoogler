<?php
//mysql_real_escape_string
session_start ();
if(isset($_SESSION['login']) && $_SESSION['login']=='true')
{
	 header( 'Location: admin.php' ) ;
	 exit();
}
if(isset($_POST['username']) && isset($_POST['password']))
{
	$username=($_POST['username']);
	$password=($_POST['password']);
	
		if($username == 'harisadu' && $password='noob12345')
		{
			$_SESSION['login']='true';
			header( 'Location: /fastestgoogler/admin.php' ) ;
			exit();
		}
	
}
?>
<html>
<head><title>Fastest Googler Login</title><link href="/fastestgoogler/style.css" rel="stylesheet" type="text/css" /></head>
<body>
<div class="main" style:"width:50%;">

<h3>Admin Login</h3>
<form id='login' action='/fastestgoogler/login.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='text' name='username' id='username' maxlength="50" placeholder="Username" required=""/><br/>
<input type='password' name='password' id='password' maxlength="50" placeholder="Password" required=""/><br />
<input type='submit' name='Submit' value='Submit' />
 
</fieldset>
</form>

</div>
</body>
</html>