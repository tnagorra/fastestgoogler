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
<table class="gridtable">
<thead><td>id</td><td>Answer</td><td>Time</td></thead>
<?php
	$users=GetUsersListOrdered();
	foreach($users as $user){
			echo '<tr><td>'.$user['id'].'</td><td>'.$user['answer'].'</td><td>'.$user['time']."</td></tr>";
	}
?>
</table>