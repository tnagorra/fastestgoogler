<?php
//mysql_real_escape_string
session_start ();
if(!isset($_SESSION['login']) || $_SESSION['login']!=='true')
{
	 header( 'Location: /fastestgoogler/login.php' ) ;
	 exit();
}
if(isset($_GET['logout']) && $_GET['logout']=='true')
{
	$_SESSION['login']='false';
	header( 'Location: /fastestgoogler/login.php' ) ;
	exit();
}
include("include.php");
?>

<html>
<head><title>Fastest Googler Admin</title><link href="/fastestgoogler/style.css" rel="stylesheet" type="text/css" />
 <script src="/fastestgoogler/jquery.js"></script>
</head>
<body>
<div class="main">
<h3>Admin Page</h3>
<p style="text-align:right;"><a href="/fastestgoogler/index.php">Home</a> | <a href="/fastestgoogler/admin.php?logout=true">Logout</a></p>
<?php

if($live=="no"){
	if(isset($_POST['qid'])){
		$color=$message='';
		if(!ActivateQuestion($_POST['qid'])){
			echo '<p style="color:#f00;text-align:center;">Invalid Question</p>';
		}else{
			// RESET USER ANSWERS
			ResetUsers();
			//redirect again to same page
			header( 'Location: /fastestgoogler/admin.php' ) ;
			exit();
		}
	}

?>

<form id='startmatch' action='/fastestgoogler/admin.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Start a new round</legend>
<input type='text' name='qid' id='qid'  maxlength="50" required="" placeholder="Question id"/> 
<input type='submit' name='Submit' value='Submit' /> 
</fieldset>
</form>
<ol>
	<li><a href="/fastestgoogler/viewquestions.php">View</a> all questions.</li>
	<li><a href="/fastestgoogler/viewusers.php">View</a> all users</li>
	<li><a href="/fastestgoogler/viewreport.php">View</a> report of previous round.</li>
	<li><a href="/fastestgoogler/newusers.php">Create</a> new set of users.</li>
	<li><a href="/fastestgoogler/resetquestions.php">Reset</a> question history.</li>
</ol>

<?php
}else {
	$question=GetCurrentQuestion();
	if(isset($_GET['stop']) && $_GET['stop']==$question['ID'])
	{
		EndCurrentQuestion($question);
		//redirect to same page
		header( 'Location: /fastestgoogler/admin.php' ) ;
		exit();
	}
?>

<p><?php echo htmlspecialchars($question['question']);?></p>
<p>Ans: <b><?php echo htmlspecialchars($question['answer']);?></b></p>

<script type="text/javascript">
$(document).ready(function () {

    function load() {
        $.ajax({ //create an ajax request to load_page.php
            type: "GET",
            url: "/fastestgoogler/dynamicstat.php",
            dataType: "html", //expect html to be returned                
            success: function (response) {
                $("#dynamic").html(response);
                setTimeout(load, 2000)
            }
        });
    }

    load(); //if you don't want the click
   // $("#display").click(load); //if you want to start the display on click
});
</script>
<div id="dynamic">Loading...</div>
<p><a href="/fastestgoogler/admin.php?stop=<?php echo $question['ID'];?>">Stop</a> the round.</p>


<?php
}
?>
</div>
</body>
</html>
