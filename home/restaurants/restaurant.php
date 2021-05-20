<?php
require_once '../../connection.php';

if (isset($_GET['delete']))
{
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM `menu` WHERE id='$id'") or die($mysqli->error);
  echo "<script> alert('Record has been deleted successfully!!'); window.location = 'restaurant.php'</script>";
}

if(!isset($_SESSION['email']))
{
  header('location: ../../../index.php');
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$query = "SELECT * from `menu` where restaurant = '$name' AND email = '$email'";
$result = mysqli_query($mysqli,$query);
$n = mysqli_num_rows($result);

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <!-- Head metas, css, and title -->
        <?php require_once 'includes/head.php'; ?>
    </head>
    <body>
        <!-- Header banner -->
        <?php require_once 'includes/header.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar menu -->
                <?php require_once 'includes/sidebar.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 text-center">
                    <h1 style="margin-top: 10px">Food Menu</h1>
                    <?php if($n>0): ?>
                        <div class="row justify-content-center">
                        <table class = "table">
                            <thead>
                            <tr>
                                <th>Food Name</th>
                                <th>Food Type</th>
                                <th>Food Price</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['food']; ?></td>
                                <td>
                                    <?php if($row['type']=="Veg"): ?>
                                        <p style="color:green;">Veg</p>
                                    <?php else: ?>
                                        <p style="color:red;">Non-Veg</p>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $row['price']; ?></td>
                                <td>
                                <a href="form.php?edit=<?php echo $row['id']; ?>"
                                    class = "btn btn-info" name="edit"><i class="fa fa-edit" style="font-size:24px"></i></a>
                                    <a href="restaurant.php?delete=<?php echo $row['id']; ?>"
                                    class = "btn btn-danger" name="delete"><i class="fa fa-trash-o" style="font-size:24px"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                        </div>
                    <?php endif; ?>
                </main>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once 'includes/footer.php'; ?>


    </body>
</html>
