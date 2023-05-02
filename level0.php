<?php 
session_start();
include('config.php');

$_SESSION['level']=0;
$reg_no=$_SESSION['reg_no'];
$sql="select * from users where reg_no='$reg_no'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$level=0;
$usr_level=$row['level'];

if($usr_level>$level){
    $link='level'.$usr_level.'.php';
    header('location:'.$link);
}
?>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if(isset($_POST["submit"]))
	{
            
            $_SESSION['level']=1;
            $res=mysqli_query($conn,"SELECT level from users where reg_no='".$_SESSION['reg_no']."';");
            $row1=mysqli_fetch_array($res,MYSQLI_ASSOC);
            if($_SESSION['level']>$row1['level']){

			$sql_up="update users set level='1',up_time='".date("Y-m-d H:i:s")."' where reg_no='".$row['reg_no']."'";
            if(mysqli_query($conn,$sql_up)){
            header('location:level1.php');
            $_SESSION['level']=1;
        }
        
		 
	}else{
                $link='level'.$usr_level.'.php';
                header('location:'.$link);
        }}
        }
	
?>

<?php if(!isset($_SESSION['level']))
	die("<h1>access denied</h1>");
else if($usr_level<0)
	die("<h1>access denied</h1>");
	else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Enigma | TS'22 </title>
</head>
<body>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container-fluid">
                <a class="navbar-brand" href="./index.php">
                  <img src="./assets/img/favicon.png" style='filter: invert()' alt="" width="30" height="24" class="d-inline-block align-top">
                  Enigma
                </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pe-2">
              <li class="nav-item">
                <a class="nav-link" href="./index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./leaderboard.php" target='_blank'>Leaderboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./instruction.php">Instruction</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-danger" href='./logout.php'>Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Navbar -->

    <!-- Leaderboard -->
    <section class="container mt-5 pt-5 mb-3 text-white text-center">
        <div class="row">
            <h1 class="mb-3"><span class="border-bottom border-danger">Let's Begin</span></h1>
            <div class="col-md-8 offset-md-2" >
                <div class="row">
                    <div class="col-lg-12">
                        <img class="img-fluid" src="./assets/img/lvls/lvl0.jpg" style="border-radius:25px;padding:0px;">
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-sm-12">
                        <form action="" method="POST">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-MD" style="border-radius:5px;">Start <span class="glyphicon glyphicon-arrow-right"></span> 
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </section>
    <!-- Leaderboard -->
    <!-- Footer -->
    <footer class="mt-5 pt-5 pb-2 text-center text-secondary">
        Copyright &copy;2022
        <a
          href="https:\\instagram.com\techsrijan.mmmut"
          target="_blank"
          rel="noreferrer"
          style='text-decoration: none;'
        >
          techSRIJAN'22
        </a>
      </footer>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="./assets/js/script.js"></script>
</body>
</html>

<?php } ?>