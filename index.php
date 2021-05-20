<?php 
SESSION_START();
if(!isset($_SESSION['customer']))
{
  $_SESSION['customer']=false;
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Food-Shala</title>
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
        <a class="navbar-brand" href="">Food-Shala</a>
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
              <a class="nav-link" href="home/customer/customer.php">Order Food</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" 
              id="navbarDropdown" role="button" data-toggle="dropdown">Login</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="home/restaurants/login.php">Restaurant</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="home/customer/login.php">Customer</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle btn btn-info" href="#" 
              id="navbarDropdown" role="button" data-toggle="dropdown">Register</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item btn btn-info" href="home/restaurants/register.php" role="button">Restaurant</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item btn btn-info" href="home/customer/register.php" role="button">Customer</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
  </section>
  <!-- START THE FEATURETTES -->

      <div class="container">
        <div class="container" id="About">
          <div class="row featurette">
            <div class="col-md-7">
            <h2 class="featurette-heading"> About Food-Shala: <span class="text-muted">Place For Foodies</span></h2>
              <p class="lead">A portal where foodies can register and order foods from their favourite restaurants. 
                Online ordering of food and multiple options to choose from. Both Restraunts and Customers can register at this portal 
                and connect with each other. We act as a waiter who serves your ordered food. Intrestingly, Your order can be from multiple
                 restraunts at any given time. In times like this, where whole world is affected by Covid-19, we 
                 deliver you your favourite dish and ensure it to be fully healthy and safe. It was created by Sudhir Daga as an assignment
                  for Software Development Engineer(Web Development) role in Internshala.</p>
            </div>
            <div class="col-md-5">
              <img class = "featurette-img1 img-responsie center-block" style="width:110%;padding-top:50px;position:absolute" src="images/foodShala.jpg" alt="">
            </div>
          </div>
        </div>


        <hr class="featurette-divider">
        <div class="container">
          <div class="row featurette">
            <div class="col-md-7 order-md-2">
              <h2 class="featurette-heading">Order Food Online : <span class="text-muted">Served Hot And Fresh</span></h2>
              <p class="lead">Serves your food under 30 minutes and give you a great experience by serving it hot and fresh. 
                Various Restraunts and amazing options to choose from. We gurantee food to be healthy and safe so that you and your 
                taste-buds can enjoy and get the best even in time of covid-19. Feel free to register to our portal and join our family.</p>
            </div>
            <div class="col-md-5 order-md-1">
              <img class = "featurette-img img-responsie center-block" style="padding-top:40px;" src="images/order.png" alt="">
            </div>
          </div>
        </div>


        <hr class="featurette-divider">
        <div class="container">
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading">Yummazing Offers : <span class="text-muted">Get upto 60% Cashback on your First 5 orders</span></h2>
              <p class="lead">We are here to serve you yummy food with amazing offers and discounts. On joining you will get upto 60% 
                cashback on your first 5 orders upto Rs 150. It doesnot stop here, There are daily offers which will be as fascinating 
                as this one. Start ordering now and give yourself a treat. </p>
            </div>
            <div class="col-md-5">
              <img class = "featurette-img img-responsie center-block" style="margin-top:40px;" src="images/cashback.jpg" alt="">
            </div>
          </div>
        </div>
        <hr class="featurette-divider">
      </div>

      <!-- /END THE FEATURETTES -->

  <!-- Footer -->

  <footer id="footer">
    <p><i class="space far fa-envelope"></i> : sudhirdaga1998@gmail.com</p>
    <p>© Copyright 2021 FoodShala</p>

  </footer>


</body>

</html>
