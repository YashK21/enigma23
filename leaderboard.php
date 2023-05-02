<?php
session_start();
include('config.php');


	$_SESSION["result"]=mysqli_query($conn,"SELECT * FROM users ORDER BY level DESC, up_time ASC;");
	if($_SESSION["result"])
	{
		$r=mysqli_num_rows($_SESSION["result"]);
	}
	else die("Some error occured, please try later");
	$t=1;
	echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Enigma | TS\'22 </title>
</head>
<body>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container-fluid">
                <a class="navbar-brand" href="./index.php">
                  <img src="./assets/img/favicon.png" style="filter: invert()" alt="" width="30" height="24" class="d-inline-block align-top">
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
                <a class="nav-link active" aria-current="page" href="./">Leaderboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./instruction.php">Instruction</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./contact.php">Contact Us</a>
              </li>
              </ul>
          </div>
        </div>
      </nav>

      <!-- Navbar -->
      <!-- Header -->
      <header class="banner">
      <div class="banner-contents text-center">
        <h1 class="banner-title">Leaderboard</h1>
        <h1 class="banner-description"></h1>
        </div>
      </div>
      <div class="banner-fadeBottom"></div>
    </header>
    <!-- Header -->

    <!-- Leaderboard -->
    <section class="container my-3 text-white text-center">
          <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">Rank</th>
                  <th scope="col">Name</th>
                  <th scope="col">Institute</th>
                  <th scope="col">Level</th>
                </tr>
              </thead>
              <tbody>';
							for($i=0;$i<555;$i++)
							if($r)
							{	$row=mysqli_fetch_array($_SESSION["result"],MYSQLI_ASSOC);
						echo'<tr>
						<td>'.$t.'</td>
						<td>'.$row["name"].'</td>
						<td>'.$row["institute"].'</td>
						<td>'.$row["level"].'</td>
						</tr>';
						$r--;
						$t++;
							}
					echo '</tbody>
            </table>
        </div>
    </section>
    <!-- Leaderboard -->
    <!-- Footer -->
    <footer class="mt-5 pb-2 text-center text-secondary">
        Copyright &copy;2021
        <a
          href="https:\\instagram.com\techsrijan.mmmut"
          target="_blank"
          rel="noreferrer"
          style="text-decoration: none;"
        >
          techSRIJAN\'22
        </a>
      </footer>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="./assets/js/script.js"></script>
</body>
</html>'; ?>