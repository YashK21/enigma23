<?php 
session_start();
include('config.php');
if(!isset($_SESSION['reg_no'])){
    header('location:index.php');
}
$_SESSION['level']=18;
$reg_no=$_SESSION['reg_no'];
$sql="select * from users where reg_no='$reg_no'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$level=18;
$usr_level=$row['level'];
if($usr_level<$level){
    $link='level'.$usr_level.'.php';
    header('location:'.$link);
}
?>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if(!empty($_POST["ans"]) and isset($_POST["submit"]))
	{
		$result=mysqli_query($conn,"SELECT * from levels where level='18';"); 
	if($result and mysqli_num_rows($result)==1)
	{
		$row_ans=mysqli_fetch_array($result,MYSQLI_ASSOC); 
		if($row_ans["ans"]==md5($_POST["ans"]))
		{
			$_SESSION['level']=19;
			$res=mysqli_query($conn,"SELECT level from users where reg_no='".$_SESSION['reg_no']."';");
			$row1=mysqli_fetch_array($res,MYSQLI_ASSOC);
			if($_SESSION['level']>$row1['level']){
				$sql_up="update users set level='19',up_time='".date("Y-m-d H:i:s")."' where reg_no='".$row['reg_no']."'";
				if(mysqli_query($conn,$sql_up)){
					$_SESSION['level']=19;
					header('location:level19.php');
				}
				else{
					echo mysqli_error($conn);
				}
			}else{
				$link='level'.$usr_level.'.php';
                header('location:'.$link);
			}
			
		}
		 
	}
}	
}
?>

<?php if(!isset($_SESSION['level']))
	die("<h1>access denied</h1>");
else if($_SESSION['level']<18)
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
            <h1 class="mb-3"><span class="border-bottom border-danger"><?php echo "LEVEL ".$_SESSION['level'] ?></span></h1>
            <div class="col-md-9">
            <div class="row">
            <div class="col-lg-12">
            <img class="img-fluid" src="./assets/img/lvl/taishas8adsaca8axsvakvs.jpg" style="border-radius:25px;padding:0px;">
            </div>
            </div>
            <br/>
            <div class="row">
            <div class="col-sm-12">
            <form class="form-inline" role="form" method="POST" action="">
                            <div class="form-group">
                                    <input type="text" class="form-control" id="ans" name="ans" placeholder="Enter Answer" pattern="[a-zA-Z0-9._@ ]+" required>
                            </div>
                                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm mt-3" style="border-radius:5px;">Submit</button>
            </form>
            </div></div></div>
            <div class="col-md-3">
            <br/><br/><br/><br/><br/>
            <?php
					$hint=0;
					$res=mysqli_query($conn,"SELECT up_time from users where reg_no='".$_SESSION['reg_no']."';");
					$row1=mysqli_fetch_array($res,MYSQLI_ASSOC);
          $tt=strtotime($row1['up_time']);
          
          $now=time();
          				
          $limit=(-$tt+$now)/3600;

					$result=mysqli_query($conn,"SELECT * from hints where level_h='18' order by hint_n");
					if($result)
                        $hint=mysqli_num_rows($result);
                        if($hint>=1)
                        {
                          $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                          echo '<div class="row">
                            <div class="col-sm-8 col-lg-offset-4">
                            <button type="button" class="banner-button" data-bs-toggle="modal" data-bs-target="#hint1" style="width:250px;">Hint 1</button>
                            </div>
                            </div>
                            <div class="modal fade" id="hint1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content bg-dark">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hint 1</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">'.$row["hint"].'</div>
                                                </div>
                                              </div>
                                            </div> <br/>';
                        }
                          if($hint>=2)
                          {
                              $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                              echo '<div class="row">
                                  <div class="col-sm-8 col-lg-offset-4">
                                  <button type="button" class="banner-button" data-bs-toggle="modal" data-bs-target="#hint2" style="width:250px;">Hint 2</button>
                                  </div>
                                  </div>
                                  <div class="modal fade" id="hint2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-dark">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hint 2</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">'.$row["hint"].'</div>
                                        </div>
                                      </div>
                                    </div> <br/>';
                          }
                          if($hint>=3)
                          {
                              $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                              echo '<div class="row">
                                  <div class="col-sm-8 col-lg-offset-4">
                                  <button type="button" class="banner-button" data-bs-toggle="modal" data-bs-target="#hint3" style="width:250px;">Hint 3</button>
                                  </div>
                                  </div>
                                  <div class="modal fade" id="hint3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-dark">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hint 3</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">'.$row["hint"].'</div>
                                        </div>
                                      </div>
                                    </div> <br/>';
                          }
                          if($hint>=4)
                          {
                              $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                              echo '<div class="row">
                                  <div class="col-sm-8 col-lg-offset-4">
                                  <button type="button" class="banner-button" data-bs-toggle="modal" data-bs-target="#hint4" style="width:250px;">Hint 4</button>
                                  </div>
                                  </div>
                                  <div class="modal fade" id="hint4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-dark">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hint 4</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">'.$row["hint"].'</div>
                                        </div>
                                      </div>
                                    </div> <br/>';
                          }
                          if($hint>=5)
                          {
                              $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                              echo '<div class="row">
                                  <div class="col-sm-8 col-lg-offset-4">
                                  <button type="button" class="banner-button" data-bs-toggle="modal" data-bs-target="#hint5" style="width:250px;">Hint 5</button>
                                  </div>
                                  </div>
                                  <div class="modal fade" id="hint5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-dark">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hint 5</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">'.$row["hint"].'</div>
                                        </div>
                                      </div>
                                    </div> <br/>';
                          }
            
            ?>
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