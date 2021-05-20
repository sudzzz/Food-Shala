<?php
require_once '../../connection.php';

//When Submit button is clicked
if(isset($_POST["submit"]))
{
  $email = $_POST['email'];
  $password = $_POST['password'];

  $qe = "SELECT * FROM `customer-register` where email = '$email'";
  $res = mysqli_query($mysqli,$qe);
  $n = mysqli_num_rows($res);
  if(!$n)
  {
    echo "<script> alert('This user do not exists!!'); window.location = 'login.php'</script>";
  }

  $q = "SELECT * FROM `customer-register` where email = '$email' and password = '$password' ";   //Select the given row with entered email and password
  $result = mysqli_query($mysqli,$q);               //Store it
  $row = mysqli_fetch_assoc($result);             //this stores the data of the given row in the form of array
  $num = mysqli_num_rows($result);                //Check if there is only 1 row for given email and password i.e. no duplicate data

  if($num==1)   // If entered email or username exists
  {
    $_SESSION['id']       = $row['id'];
    $_SESSION['name']     = $row['name'];
    $_SESSION['address']  = $row['address'];
    $_SESSION['phone']    = $row['phone'];
    $_SESSION['email']    = $row['email'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['customer'] = true;

    header('location: customer.php');
  }


  else
  {
    echo "<script> alert('Username and Password does not match!!'); window.location = 'login.php'</script>";
  }
}

$mysqli->close();

?>

<!DOCTYPE html>
<html>

<style type="text/css">
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.error{
  width: 92%;
  margin: 0px,auto;
  padding: 10px;
  border: 1px solid #a94442;
  color: #a94442;
  background: #f2dede;
  border-radius: 5px;
  text-align: left;
}
</style>
  <head>
    <meta charset="utf-8">
    <!-- CSS Stylesheets -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700i,800,900|Ubuntu&display=swap" rel="stylesheet">
    <!-- Font Awsome -->
    <script src="https://kit.fontawesome.com/bfd4febf56.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>Food Shala Login</title>
  </head>

  <body class="text-center">
    <form action="login.php" class="form-signin" method="post">

	     <div class="d-flex flex-column pb-3">
         <img class="img-fluid mx-auto d-block" src="../../images/foodShala.jpg"  width="90" height="90">
       </div>

	      <h1 class="h3 mb-3 font-weight-normal">Login</h1>

	       <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

	       <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
  </body>

  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
  <p>Not a User?<a href="register.php"><b>Register Here</b></a></p>
  <a href="../../index.php">Home</a>
</html>
