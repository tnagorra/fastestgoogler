<?php
$connection=false;
function connecttodatabase()
{
	global $connection;
	$connection=true;
	mysql_connect("localhost","root","toor");
	mysql_select_db("bagchal");
}
function GetConfig($name)
{
	global $connection;
	if($connection===false)
	{
		connecttodatabase();
	}
	$query="SELECT value FROM config WHERE item='$name'";
	$result=mysql_query($query);
	$rows = mysql_num_rows($result);
	if($rows>0)
	{
		$row=mysql_fetch_array($result);
		return $row['value'];
	}
	return false;
}

function SetConfig($name,$value)
{
	global $connection;
	if($connection===false)
	{
		connecttodatabase();
	}
	$query='';
	if(GetConfig($name) === false)
	{
		$query="INSERT INTO  config (`item` ,`value`) VALUES ('$name',  '$value');";
	}
	else
	{
		$query="UPDATE  `config` SET  `value` =  '$value' WHERE  `item` =  '$name' LIMIT 1 ;";
		echo htmlspecialchars($query);
	}
	$result=mysql_query($query);
	return;
}
function GetUsersList()
{
	global $connection;
	if($connection===false)
	{
		connecttodatabase();
	}
	$query="SELECT * FROM users";
	$result=mysql_query($query);
	$arr=array();
	while($row=mysql_fetch_array($result))
	{
		$arr[]=$row;
	}
	return $arr;
}

function GetAllQuestion()
{
	global $connection;
	if($connection===false)
	{
		connecttodatabase();
	}
	$query="SELECT * FROM questions";
	$result=mysql_query($query);
	$arr=array();
	while($row=mysql_fetch_array($result))
	{
		$arr[]=$row;
	}
	return $arr;
}

function UserExists($userid)
{
	$users=GetUsersList();
	for($i=0;$i<10;$i++)
	{
		$user=$users[$i];
		if($userid == $user['id'])
			return true;
	}
	return false;
}
function GetUsersListOrdered()
{
	global $connection;
	if($connection===false)
	{
		connecttodatabase();
	}
	$query="SELECT * FROM users ORDER BY time ASC";
	$result=mysql_query($query);
	$arr=array();
	while($row=mysql_fetch_array($result))
	{
		$arr[]=$row;
	}
	return $arr;
}
function CreateNewUsers()
{
	global $connection;
	if($connection===false)
	{
		connecttodatabase();
	}
	//empty the table
	$query='TRUNCATE TABLE users';
	$result=mysql_query($query);
	//create new set of users
	srand(time(0));
	$ids=array();
	for($i=0;$i<10;$i++)
	{
		$ids[]=100000+rand()%900000;
	}
	foreach($ids as $id)
	{
		$query="INSERT INTO  `users` (`id` ,`answer` ,`time`)VALUES ('$id',  '',  '');";
		mysql_query($query);
	}
	
}


function ResetUsers()
{
	global $connection;
	if($connection===false)
	{
		connecttodatabase();
	}
	//empty the table
	$query="UPDATE users SET answer='',time=''";
	$result=mysql_query($query);
}

function ResetQuestions(){
	global $connection;
	if($connection===false)
	{
		connecttodatabase();
	}
	//empty the table
	$query="UPDATE questions SET state='0'";
	$result=mysql_query($query);
}


function GetCurrentQuestion()
{
	global $connection;
	if($connection===false)
	{
		connecttodatabase();
	}
	$query="SELECT * FROM questions WHERE state='1'";
	$result=mysql_query($query);
	$rows = mysql_num_rows($result);
	if($rows>0)
	{
		$row=mysql_fetch_array($result);
		return $row;
	}
	return false;
}



function EndCurrentQuestion($question)
{
	SetConfig("prevqsn",$question['ID']);
	SetConfig("live","no");
}

function SetUserAnswer($userid,$answer)
{
	global $connection;
	if($connection===false)
	{
		connecttodatabase();
	}
	$uid=intval($userid);
	$ans=mysql_real_escape_string($answer);
	$query="";
	$query="UPDATE  `users` SET  `answer` =  '$ans' WHERE  `id` =  '$uid';";
	$result=mysql_query($query);
	$query="UPDATE  `users` SET  `time` =  '".date("Y-m-d H:i:s")."' WHERE  `id` =  '$uid';";
	$result=mysql_query($query);
}
function ActivateQuestion($questionid)
{
	global $connection;
	if($connection===false)
	{
		connecttodatabase();
	}
	$qid=mysql_real_escape_string($questionid);
	//deactivate the previous question
	
	$query="UPDATE  `questions` SET  `state` =  '2' WHERE  `state` =  '1';";
	$result=mysql_query($query);
	
	//search for the question

	$query="SELECT * FROM questions WHERE ID='$qid' AND `state` =  '0'";
	$result=mysql_query($query);
	$rows = mysql_num_rows($result);

	if($rows>0)
	{
		$row=mysql_fetch_array($result);
		//activate the question
		SetConfig("live","yes");
		$query="UPDATE  `questions` SET  `state` =  '1' WHERE  `ID` =  '$qid' LIMIT 1 ;";
		mysql_query($query);
		return true;
	}
	return false;
}


if(GetConfig("live") === false)
{
	SetConfig("live","no");
}
$live=GetConfig("live");
?>
