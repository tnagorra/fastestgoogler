<!DOCTYPE html>
<html>
<?php
include("include.php");
?>
<head>
	<title>Fastest Googler</title>
	<link href="/fastestgoogler/style.css" rel="stylesheet" type="text/css" />
	 <script src="/fastestgoogler/jquery.js"></script>
</head>
<body>
<div class="main">
<div align="center">
  <img src="/fastestgoogler/logo.jpg" alt="The fastest Googler"/>
</div>


<?php
if(isset($_POST['userid']) && isset($_POST['answer'])) {
		$userid=$_POST['userid'];
		$answer=$_POST['answer'];
		if(UserExists($userid)==true) {
			SetUserAnswer($userid,$answer);
			echo '<p style="text-align:center;color:#0f0;">Your answer has been submitted. You can change your answer by submitting again. </p>';
		} else
			echo '<p style="text-align:center;color:#f00;">Invalid user id!</p>';
	}
?>


<script type="text/javascript">
$(document).ready(function () {

    function load() {
        $.ajax({ //create an ajax request to load_page.php
            type: "GET",
            url: "/fastestgoogler/getQuestion.php",
            dataType: "html", //expect html to be returned                
            success: function (response) {
            	if( response !== "no"){
            		$("#dynamic").html(response);
            		setTimeout(reload,2000);
            	}else{
            		setTimeout(load, 2000);
            	}
            }
        });
    }

    function reload(){
    	$.ajax({
    		type: "GET",
    		url: "/fastestgoogler/getQuestion.php",
    		dataType: "html",
    		success: function(response){
    			if( response == "no"){
    				$("#dynamic").html('<p style="text-align:center;color:#f00;">The competition is currently offline. Hold on!</p>');
    				setTimeout(load,2000);
    			}else{
    				setTimeout(reload,2000);
                }
    		}
    	});
    }

    load(); //if you don't want the click
   // $("#display").click(load); //if you want to start the display on click
});
</script>

<div id="dynamic"><p style="text-align:center;color:#f00;">The competition is currently offline. Hold on!</p></div>
</body>
</html>