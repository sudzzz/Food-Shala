<?php
SESSION_START();
//Get Heroku ClearDB connection information
$username = 'bd43d5a4d91ec2';
$password = 'aeb4ff93';
$database = 'heroku_bd6668f3079e644';
$hostname = 'eu-cdbr-west-01.cleardb.com';

$mysqli = new mysqli($hostname, $username, $password, $database) or die(mysqli_error($mysqli));
//When Submit button is clicked
$food = '';
$price = 0;
$type = '';
$update = false;
$id = 0;
if(isset($_POST["submit"]))
{
  $email = $_SESSION['email'];
  $name  = $_SESSION['name'];
  $food  = $_POST['food'];
  $type  = $_POST['type'];
  $price = $_POST['price'];

  $q = "SELECT * FROM `menu` WHERE email='$email' AND food='$food'";
  $res = mysqli_query($mysqli,$q);
  $n = mysqli_num_rows($res);
  if($n==1)   // If entered food exists
  {
    echo "<script> alert('Food Item Already exists!!'); window.location = 'restaurant.php'</script>";
  }
  else
  {
    $mysqli->query("INSERT INTO `menu` (restaurant,email,food,price,type) VALUES('$name','$email','$food','$price','$type')") or die($mysqli->error);
    echo "<script> alert('Data has been added successfully!!'); window.location = 'restaurant.php'</script>";
  }
 
  
}

if(isset($_GET['edit']))
{
  $id = $_GET['edit'];
  $update = true;
  $query = "SELECT * FROM `menu` WHERE id='$id'";
  $result = mysqli_query($mysqli,$query);
  $num = mysqli_num_rows($result);

  if($num==1)
  {
    $row = mysqli_fetch_assoc($result);
    $food = $row['food'];
    $price = $row['price'];
    $type = $row['type'];
  }

}


if(isset($_POST['update']))
{
  $id = $_POST['id'];
  $food = $_POST['food'];
  $price = $_POST['price'];
  $type = $_POST['type'];

  $mysqli->query("UPDATE `menu` SET food='$food',price='$price',type='$type' WHERE id='$id'") or die($mysqli->error);
  echo "<script> alert('Data has been updated successfully!!'); window.location = 'restaurant.php'</script>";
}


?>


<!doctype html>
<html lang="en">
    <head>
        <!-- Head metas, css, and title -->
        <?php require_once 'includes/head.php'; ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
              <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                  <div class="sidebar-sticky">
                      <ul class="nav flex-column">
                          <li class="nav-item">
                              <a class="nav-link" href="restaurant.php">
                                  <span data-feather="arrow-left"></span>
                                  Back
                              </a>
                          </li>
                      </ul>
                  </div>
              </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  <h1 style="margin-top: 10px">Add / Edit the Records</h1>
                  <p>Required fields are in (*)</p>
                  <div class="container">
                    <form action="form.php" method="POST">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <div class="form-group">
                          <label>Food Name Name *</label>
                          <input  class="form-control" type="text" name="food" value="<?php echo $food; ?>" placeholder="Food Name" value="" required>
                      </div>
                      <div class="form-group">
                          <label>Food Price *</label>
                          <input  class="form-control" type="text" name="price" value="<?php echo $price; ?>" placeholder="Food Price" value="" required>
                      </div>
                      <div class="form-group">
                          <label>Food Type *</label>
                          <select name="type" id="selectType">
                              <option value="Veg">Veg</option>
                              <option value="Non-Veg">Non-Veg</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <?php if($update == true): ?>
                          <button class="btn btn-info mb-2" type="submit" name="update">Update</button>
                        <?php else: ?>
                          <button class="btn btn-primary mb-2" type="submit" name="submit">Save</button>
                        <?php endif; ?>
                      </div>
                    </form>
                  </div>
                </main>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once 'includes/footer.php'; ?>
    </body>
</html>
