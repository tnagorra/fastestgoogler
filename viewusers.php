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
<head><title>Fastest Googler Admin Page: View all users.</title><link href="/fastestgoogler/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main">
<h3>View all users.</h3>
<table>
<thead><td>id</td></thead>
<?php
$users=GetUsersList();
foreach($users as $user)
{
	echo "<tr><td>".$user['id']."</td></tr>";
}
?>
</table>
<a href="/fastestgoogler/admin.php">Back</a>
</div>
</body>
</html>