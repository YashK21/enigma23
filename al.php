<?php 
session_start();
include('config.php');


	if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if(!empty($_POST["username"]) and !empty($_POST["pwd"]))
	{
		$email=$_POST["username"];
		$password=md5($_POST["pwd"]);
		$result=mysqli_query($conn,"SELECT * FROM admin WHERE username='".$email."' AND pwd='".$password."';");
		if($result and mysqli_num_rows($result)==1)
		{
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$_SESSION['adminLOGGEDIN']=1;
			echo "<meta content=\"0;ap.php\" http-equiv=\"refresh\">";
		}
		else echo'<script>alert("Wrong Credentials")</script>';
	}
}
?>
<html>
<head><title>Login</title></head>
<body>
<center>
<br/><br/><br/>
<h1>Login</h1>
<form action="al.php" method="POST">
<h4>
  Username:
  <input type="text" name="username" id="username"><br>
  <br>
  Password: 
  <input type="password" name="pwd" id="pwd">
  <br><br>
  <input type="submit" id="submit" value="Login">
  <h4>
</form>

</body>
</html>