<?php
session_start();
include('config.php');
	
	if(!isset($_SESSION["adminLOGGEDIN"]))
		die("Access Denied");
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) 
{
	if(!empty($_POST["ans"]) && !empty($_POST["level"]) )
	{
		
		$sql="INSERT INTO `levels`(`level`, `ans`) VALUES ('".$_POST["level"]."','".md5($_POST["ans"])."')";
		 $result=mysqli_query($conn,$sql);
		
	if($result)
		echo '<script>alert("Success");</script>';
	else echo '<script>alert("Error");</script>';
	}
	else echo '<script>alert("Empty");</script>';
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hint_but"])) 
{
	if(!empty($_POST["hint_n"]) && !empty($_POST["hint"]))
	{
		$sql1="INSERT INTO `hints`(`level_h`, `hint_n`, `hint`) VALUES ('".$_POST["level_h"]."','".$_POST["hint_n"]."','".$_POST["hint"]."')";
		 $result=mysqli_query($conn,$sql1);
	if($result)
		echo '<script>alert("Success");</script>';
	else echo '<script>alert("Error");</script>';
	}
	else echo "empty";
}

	if($_SESSION["adminLOGGEDIN"]!=1)
		die("Access Denied");
	else
	{
?>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>AP</title></head>
<body>
<br/><br/><br/>

<div class="row">
<div class="col-lg-5" style="margin-left:5%">
<h1>Update Levels</h1>
<form class="form-horizontal" action="ap.php" method="POST">
<h4>
  Level:
  <input type="text" name="level" id="level"><br>
  <br>
  Answer: 
  <input type="text" name="ans" id="ans">
  
  <br><br>
  <input type="submit" name="submit" id="submit" value="Update">
  </h4>
</form>
</div>
<div class="col-lg-5" style="margin-left:5%">

<h1>Update Hints</h1>
<form action="ap.php" method="POST">
<h4>
  Level:
  <input type="text" name="level_h" id="levelh"><br>
  <br>
  Hint No.: 
  <input type="text" name="hint_n" id="hintn">
  <br><br>
  Hint: 
  <input type="text" name="hint" id="hint">
  <br><br>
  <input type="submit" name="hint_but" id="hint_but" value="Update">
  </h4>
</form>
</div></div><br/>
<a href="logout.php" style="margin:25px;"><button>Logout</button></a>
</body>
</html>
	<?php } ?>