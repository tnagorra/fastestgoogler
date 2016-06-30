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
<head><title>Fastest Googler Admin Page: View all questions.</title><link href="/fastestgoogler/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main">
<h3>View all questions.</h3>
<table>
<thead><td>id</td><td>Question</td><td>Answer</td><td>Asked?</td></thead>
<?php
$users=GetAllQuestion();
foreach($users as $user)
{
	echo "<tr><td>".$user['ID']."</td><td>".$user['question']."</td><td>".$user['answer']."</td><td>". ($user['state'] > 0 ? 'yes' : 'no') ."</td></tr>";
}
?>
</table>
<a href="/fastestgoogler/admin.php">Back</a>
</div>
</body>
</html>