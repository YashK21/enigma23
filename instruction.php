<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Enigma | TS'22 </title>
    <style>
    .youtube {
      width: 50%;
    }

    @media only screen and (max-width: 600px) {
      .youtube {
        width: 90%;
      }
    }
    </style>
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
                <a class="nav-link active" aria-current="page" href="./">Instruction</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./contact.php">Contact Us</a>
              </li>
              </ul>
          </div>
        </div>
      </nav>

      <!-- Navbar -->

    <!-- Instructions -->
    <section class="container my-3 mt-5 pt-5 text-white text-center">
          <div class="row">
            <h1 class='mb-4'>Rules</h1>
            <div class="col-12 col-md-8 offset-md-2">
                <div class="card bg-dark border-danger">
                    <div class="card-body"> 
                        <ul style='text-align: left'>
                            <li>Each level comprises of one question.</li>
                            <li>Each level will have 3 to 5 hints.</li>
                            <li>You must answer the question with all lowercase without spaces. (Ex- ieeesbmmmut)</li>
                            <li>You must enter numbers in numerals. (Ex- 1948 as oneninefoureight)</li>
                            <li>Answer must not contain any special characters or punctuation.</li>
                            <li>Always use <b>complete names</b> while answering. Probably, the name in wikipedia.</li>
                            <li>There is no time limit for solving a particular level.</li>
                            <li>One who completes all the levels first wins.</li>
                            <li>Any use of unfair means will not be tolarated.</li>
                            <li>In case of any dispute, the say of the organizers will be final.</li>
                            <br>
                            <li>
                              Some useful resources
                              <ul style='text-align: left'>
                                <li>Decode ciphers:- <a href="https://cryptii.com/" style='text-decoration:none' target='_blank'>Crypti</a> / <a href="https://www.dcode.fr/en" style='text-decoration:none'target='_blank'>Dcode</a> 
                                </li>
                                <li>Snip Tool Windows Shortcut: <span class='text-primary'>Win+Shift+S</span></li>
                              </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
          </div>
    </section>
    <!-- Instructions -->

    <!-- Sample Question -->
    <section class="container my-3 mt-5 text-white">
      <div class="row mt-5">
        <h1 class='mb-4 text-center'>Sample Question-1</h1>
        <div class="mx-auto youtube ratio ratio-16x9">
        <iframe src="https://www.youtube.com/embed/3UgxCMbEA80" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      </div>
      <div class="row mt-5">
        <h1 class='mb-4 text-center'>Sample Question-2</h1>
        <div class="col-12 col-md-8 offset-md-2">
          <div class="card bg-dark border-warning">
            <div class="card-body">
              <div class='row'>
                <div class='col-12 col-md-6'>
                  <img class='img-fluid' src='./assets/img/sample.jpg' alt='sample'/>
                </div>
                <div class='col-12 col-md-6'>
                  <p class='text-muted'>
                    Going through the first line one find two words "ENQUIRE" and "TIM" and the question where?<br>
                    Google searching it one finds Tim Berners-Lee developed WWW project name ENQUIRE at <b class='text-info'>CERN</b>. The first image gives Micheal Langdon. CERN + <b class='text-info'>Langdon</b> gives a novel Angel & Demons by Dan Brown. The 2nd image gives Vetra and 3rd gives chest. The answer is the word inscribed on the chest of learando vetra in Angel & Demons. [<b class='text-danger'>ILLUMINATI</b>] <br>
                    Source: <a href="https://en.wikipedia.org/wiki/Angels_%26_Demons#Plot" style='text-decoration:none' target='_blank'>Here</a>
                  </p>                
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="mt-5 pb-2 text-center text-secondary">
        Copyright &copy;2021
        <a
          href="https:\\instagram.com\techsrijan.mmmut"
          target="_blank"
          rel="noreferrer"
          style="text-decoration: none;"
        >
          techSRIJAN'22
        </a>
      </footer>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="./assets/js/script.js"></script>
</body>
</html>