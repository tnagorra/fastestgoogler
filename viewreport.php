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
<head><title>Fastest Googler Admin Page: View report.</title><link href="/fastestgoogler/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main">
<h3>View reports.</h3>

<?php
if($live =='yes'){
	echo "You cannot view report while a game is going on ";
} else {
?>
<table>
<thead><td>id</td><td>Answer</td><td>Time</td></thead>
<?php
	$users=GetUsersListOrdered();
	foreach($users as $user){
			if($user['time']!='0000-00-00 00:00:00'){
			echo '<tr><td>'.$user['id'].'</td><td>'.$user['answer'].'</td><td>'.$user['time']."</td></tr>";
		}
	}
}
?>
</table>
<a href="/fastestgoogler/admin.php">Back</a>
</div>
</body>
</html>
