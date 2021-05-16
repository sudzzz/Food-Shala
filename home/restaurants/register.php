<?php 
SESSION_START();
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
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
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <!--Google Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:700i,800,900|Ubuntu&display=swap" rel="stylesheet">
      <!-- Font Awsome -->
      <script src="https://kit.fontawesome.com/bfd4febf56.js" crossorigin="anonymous"></script>
      <!-- Bootstrap -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <title>Register</title>
    </head>
    <body class="text-center">
      <form action="register.php" class="form-signin" method="post">
        <!--Display Validation Error Here-->

         <div class="d-flex flex-column pb-3">
           <img class="img-fluid mx-auto d-block" src="../../images/foodShala.jpg"  width="72" height="72">
         </div>
            <h1 class="h3 mb-3 font-weight-normal">Register</h1>
          <input class="form-control" type="text" name="name" id="input" placeholder="Restraunt's Name" required autofocus>
          <input class="form-control" type="text" name="address" placeholder="Address" required>
          <input class="form-control" type="text" name="phone" placeholder="Phone No." required>
          <input class="form-control" type="text" name="username" placeholder="Username" required>
          <input class="form-control" type="email" name="email" placeholder="Email address" required>
          <input class="form-control" type="password" name="password1" placeholder="Password" required>
          <input class="form-control" type="password" name="password2" placeholder="Confirm Password" required>
    </body>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Register</button>
    <p>Already a User?<a href="login.php"><b>login Here</b></a></p>
</html>