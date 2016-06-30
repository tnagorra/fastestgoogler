<?php
include("include.php");

if(GetConfig("live") === "yes"){

?>

 <div style="margin-bottom: 20px; padding: 40px; border-color:lightgray; border-style: solid; border-width: 1px;">
    <?php 
		$question=GetCurrentQuestion();
		echo htmlentities($question['question']);
	?>
  </div>
  <div>
    <form id="form1" name="form1" method="post" action="/fastestgoogler/index.php">
		<textarea name="answer" placeholder="Answer" rows="4" id="answer"  required="" style="width:100%;"></textarea><br/>
		<input type="text" name="userid" placeholder="User id" required="" autofocus="true" />
		<input type="submit" value="answer" id="answer" /><br/>
    </form>
  </div>

<?php
} else{
	echo "no";
}
?>