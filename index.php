<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Infi-Care</title>
  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--Google Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:700i,800,900|Ubuntu&display=swap" rel="stylesheet">
  <!-- Font Awsome -->
  <script src="https://kit.fontawesome.com/bfd4febf56.js" crossorigin="anonymous"></script>
  <!-- Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>

  <section id="title">
      <!-- Nav Bar -->
      <nav class="navbar bg-dark navbar-expand-lg fixed-top navbar-dark">
        <a class="navbar-brand" href="">Infi-Care</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#About">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#footer">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a href="register.php" class="btn btn-info" role="button">Register</a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- Title -->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
      </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-lg-6">
                  <h1 class="big-heading">Don't Throw! Reuse-Recycle-Recirculate.</h1>
              </div>
              <div class="col-lg-6">
                <img class="title-image" src="images/recycle.jfif" >
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="row">
              <div class="col-lg-6">
                <h1 class="big-heading">Let's not waste unused Medicine.</h1>
              </div>
              <div class="col-lg-6">
                <img class="title-image" src="images/title.jfif" >
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="row">
              <div class="col-lg-6">
                <h1 class="big-heading">Together we can be the change.</h1>
              </div>
              <div class="col-lg-6">
                <img class="title-image" src="images/goal.jfif" >
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  </section>
<!-- START THE FEATURETTES -->

      <div class="container">
        <hr class="featurette-divider">
        <div class="container">
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading">Our Vision : <span class="text-muted">And the problem it solves.</span></h2>
              <p class="lead">Wastage of medicines is a global issue. In country like India with such a huge poulation, every year medicines worth billions of dollars gets wasted. Our Vision is to stop this wastage and help our country economically. We plan so by practising three basic things : <li>Reuse : Reusing the medicines which is not yet expired.</li> <li>Recycle : Recycling the medicines which is expired or about to expire.</li> <li>Recirculating : Recirculating the recycled medicines. back to the market</li></p>
            </div>
            <div class="col-md-5">
              <img class = "featurette-img img-responsie center-block" src="images/vision.jfif" alt="">
            </div>
          </div>
        </div>


        <hr class="featurette-divider">
        <div class="container" id="About">
          <div class="row featurette">
            <div class="col-md-7 order-md-2">
              <h2 class="featurette-heading">About Infi-Care : <span class="text-muted">Transforming India.</span></h2>
              <p class="lead">Infi-Care Cares for you and the socitey. It provides customers the platform to submit the unused and expired medicines back to the pharmacies which are collection points. Depending on the medicine submitted, the customer gets points which can be redeemed on future purchases from the pharmacy. The pharmacies will update the record on Infi-Care which will keep track of expired and un-expired Medicines. The expired medicines will be sent back to company through backchain for processing to prevent pollution caused by Medi-Waste. The Medicines which is not expired and can be used will be visible to Hospitals, Nursing Homes, NGO's who can purchase these medicines from respective pharmacies at a very low price. This will also provide medicines to the sections of socitey which cannot afford it. </p>
            </div>
            <div class="col-md-5 order-md-1">
              <img class = "featurette-img img-responsie center-block" src="images/transform.jfif" alt="">
            </div>
          </div>
        </div>


        <hr class="featurette-divider">
        <div class="container">
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading">Join The Campaign : <span class="text-muted">Together we can bring the change.</span></h2>
              <p class="lead">Be the part of Infi-Care family. Your contribution towards socitey and nation is valuable. Albert Einstien said "Only a life lived for others is a live worthwhile". Let's take a pledge, not to throw or waste any medicine. If you don't use it, give it to the ones who need it. </p>
            </div>
            <div class="col-md-5">
              <img class = "featurette-img img-responsie center-block" src="images/together.jfif" alt="">
            </div>
          </div>
        </div>
        <hr class="featurette-divider">
      </div>

      <!-- /END THE FEATURETTES -->

  <!-- Footer -->

  <footer id="footer">
    <p><i class="space far fa-envelope"></i> : sudhirdaga1998@gmail.com</p>
    <p>© Copyright 2020 FoodShala</p>

  </footer>


</body>

</html>
