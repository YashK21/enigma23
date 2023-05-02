
<?php
  session_start();

  include_once('config.php');
  if(isset($_SESSION['reg_no']))
  {
      header('location:level0.php');
  }

  $error_reg=false;
if(isset($_POST['register'])){
    $name_f = $_POST['name_f'];
    $name_f = strip_tags($name_f);
    $name_f = htmlspecialchars($name_f);

    $name_l = $_POST['name_l'];
    $name_l = strip_tags($name_l);
    $name_l = htmlspecialchars($name_l);

    $name = $name_f.' '.$name_l;

    $institute = $_POST['institute'];
    $institute = htmlspecialchars(strip_tags($institute));

    $city = $_POST['city'];
    $city = htmlspecialchars(strip_tags($city));

    $mob_no = trim($_POST['mob_no']);
    $mob_no = htmlspecialchars(strip_tags($mob_no));

    $email = $_POST['email'];
    $email = htmlspecialchars(strip_tags($email));

    $password = $_POST['password'];
    $password = htmlspecialchars(strip_tags($password));
   
    //validate
    if(empty($name_f) || empty($name_l)){
        $error_reg = true;
        $errorUsername = 'Please input name';
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_reg = true;
        $errorEmail = 'Please a valid input email';
    }

    if(empty($password)){
        $error_reg = true;
        $errorPassword = 'Please password';
    }elseif(strlen($password) < 6){
        $error_reg = true;
        $errorPassword = 'Password must at least 6 characters';
    }
    if(empty($mob_no)){
        $error_reg = true;
        $errorMob_no = 'Please input mob_no';
    }elseif(is_numeric($mob_no)) {
       if(strlen($mob_no) !=10)
       {
        $error_reg = true;
        $errorMob_no = 'Mobile Number must of 10 digits';
       }
    }else{
         $error_reg = true;
        $errorMob_no = 'Mobile Number must be a numerical value';
    }
    
    
    if(empty($city)){
        $error_reg = true;
        $errorCity = 'Please input city';
    }
     
    if(empty($institute)){
        $error_reg = true;
        $errorInstitute = 'Please input institute';
    }
    $hash=md5($password);

    if(!$error_reg) {
        $sql1 = "select * from users where email='$email' ";
        $result = mysqli_query($conn, $sql1);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($count==1) { 
            $errorMsg= "This email has already been registerd. Please login.";
                     
        } elseif($count==0) {
            $sql = "insert into users(name, institute ,city, mobile_no, email, password , hash, level) values('$name', '$institute', '$city','$mob_no','$email','$password','$hash', '0')";
            if(mysqli_query($conn, $sql))
           {
              $reg_no=mysqli_query($conn,"select * from users where email='$email'");
              $reg_no=mysqli_fetch_assoc($reg_no);
              $reg_no=$reg_no['reg_no'];

              $msg = "Registeration Successfull. Please Login.";
            }
    }
  }
}

$error_log = false;
if(isset($_POST['login'])){
    $email1 = trim($_POST['email1']);
    $email1 = htmlspecialchars(strip_tags($email1));

    $password1 = trim($_POST['password1']);
    $password1 = htmlspecialchars(strip_tags($password1));

    if(empty($email1)){
        $error_log = true;
        $errorEmail1 = 'Please input email';
    }elseif(!filter_var($email1, FILTER_VALIDATE_EMAIL)){
        $error_log = true;
        $errorEmail1 = 'Please enter a valid email address';
    }

    if(empty($password1)){
        $error_log = true;
        $errorPassword1 = 'Please enter password';
    }

    if(!$error_log){
      
        $sql = "select * from users where email='$email1' ";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($count==1 && $row['password'] == $password1){

            $_SESSION['email']=$row['email'];
            $_SESSION['reg_no']=$row['reg_no'];
            // $_SESSION['t1']=0.0167;
                header('location:level0.php');
            
        }else {
          $loginErrorMsg = 'Invalid Email or Password';
          }

    }
}

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
                <a class="nav-link active" aria-current="page" href="./">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./leaderboard.php" target='_blank'>Leaderboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./instruction.php">Instruction</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./contact.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="banner-button" data-bs-toggle="modal" data-bs-target="#login">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Navbar -->
      <!-- Header -->
      <header class="banner">
      <div class="banner-contents">
        <h1 class="banner-title">Enigma</h1>
        <h1 class="banner-description">
          Show us how good you are with science <br />
          <strong>"Time to unveil!"</strong>
        </h1>
        <div class="banner-buttons">
          <a class="banner-button" data-bs-toggle="modal" data-bs-target="#login">
            Login
          </a>
          <a href="#register-form" class="banner-button">
            Register
          </a>
        </div>
      </div>
      <div class="banner-fadeBottom"></div>
    </header>
    <!-- Header -->

    <!-- Login Modal -->
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <?php
                  echo '<span class="text-danger">';
                    if(isset($loginErrorMsg)){ echo $loginErrorMsg;}
                    if(isset($errorEmail1)){ echo $errorEmail1;} 
                    if(isset($errorPassword1)){ echo $errorPassword1;}
                  echo '</span>';
                ?>
            <form class="row g-3" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <div class="col-12">
                <label for="email1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email1" placeholder="example@mail.com" required>
              </div>
              <div class="col-12">
                <label for="password1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password1" required>
              </div>
              <div class="col-12 text-center">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Login Modal -->


    <!-- Register -->
    <section class="container my-3 text-white" id='register-form'>
          <h1 class="text-center"><span class="border-bottom border-danger">Register Now</span></h1>

          <!-- Registeration Form -->
          <div class="col-md-6 offset-md-3 mt-5 px-2">
            <?php if(isset($msg)) echo"<div class='alert alert-primary' role='alert'>$msg</div>"; ?>          
            <?php if(isset($errorMsg)) echo"<div class='alert alert-danger' role='alert'>$errorMsg</div>"; ?>          
          <form class="row g-3" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="col-md-6">
              <label for="firstName" class="form-label">First Name</label>
              <?php if(isset($errorUsername)) echo"<small class='text-danger'>$errorUsername</small>" ?>
              <input type="text" class="form-control" name="name_f" required>
            </div>
            <div class="col-md-6">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" class="form-control" name="name_l" required>
            </div>
            <div class="col-md-6">
                <label for="college" class="form-label">Company / Institute</label>
                <?php if(isset($errorInstitute)) echo"<small class='text-danger'>$errorInstitute</small>" ?>
                <input type="text" class="form-control" name="institute" required>
            </div>
            <div class="col-md-6">
                <label for="city" class="form-label">City</label>
                <?php if(isset($errorCity)) echo"<small class='text-danger'>$errorCity</small>" ?>
                <input type="text" class="form-control" name="city" required>
            </div>
            <div class="col-12">
              <label for="mob_no" class="form-label">Contact No.</label>
              <?php if(isset($errorMob_no)) echo"<small class='text-danger'>$errorMob_no</small>" ?>
              <input type="text" class="form-control" name="mob_no" required pattern="[0-9]{10}" title="Please enter correct Mobile No.">
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <?php if(isset($errorEmail)) echo"<small class='text-danger'>$errorEmail</small>" ?>
              <input type="email" class="form-control" name="email" required placeholder="example@mail.com">
            </div>
            <div class="col-12">
              <label for="password" class="form-label">Password</label>
              <?php if(isset($errorPassword)) echo"<small class='text-danger'>$errorPassword</small>" ?>
              <input type="password" class="form-control" required name="password">
            </div>
            <div class="col-12 text-center">
              <button type="submit" name='register' class="btn btn-primary">Register</button>
            </div>
          </form>
        </div>
          <!-- Registeration Form -->
    </section>
    <!-- Register -->
    <!-- Footer -->
    <footer class="mt-5 pb-2 text-center text-secondary">
        Copyright &copy;2021
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