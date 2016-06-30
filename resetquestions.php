<?php
//mysql_real_escape_string
session_start ();
if(!isset($_SESSION['login']) || $_SESSION['login']!=='true')
{
	 header( 'Location: /fastestgoogler/login.php' ) ;
	 exit();
}
include("include.php");
?>
<html>
<head><title>Fastest Googler Admin Page: Reset questions</title><link href="/fastestgoogler/style.css" rel="stylesheet" type="text/css" /></head>
<body>
<div class="main">
<h3> Reset question history.</h3>
<?php
if(isset($_POST['yes']))
{
	if($_POST['yes']=='yes')
	{
		ResetQuestions();
		echo '<p>Question history is reset! <a href="/fastestgoogler/admin.php">Back</a></p>';
	}
	else
	{
			header( 'Location: /fastestgoogler/admin.php' ) ;
			exit();
	}
}
else
{
?>
	<p>Are you sure that you want to reset the history?</p>
	<form action='/fastestgoogler/resetquestions.php' method='post' accept-charset='UTF-8'>
<input type='submit' name='yes' value='yes' />
<input type='submit' name='yes' value='no' />
</form>
<?php
}
?>
</div>
</body>
</html>