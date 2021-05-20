<?php 
require_once '../../connection.php';
$rid = 0;
$p=0;
if(isset($_GET['details']))
{
    $rid = $_GET['details'];
}
$result = $mysqli->query("SELECT food_name,quantity,price from `checkout` WHERE rid='$rid'") or die($mysqli->error);
$total = $mysqli->query("SELECT SUM(price) AS total FROM `checkout` WHERE rid='$rid'");
$data = mysqli_fetch_assoc($total);
$amount = $data['total'];
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
                <?php require_once 'includes/sidebarDetails.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 text-center">
                    <h1 style="margin-top: 10px">Order Details</h1>
                        <div class="row justify-content-center">
                        <table class = "table">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Food Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo ++$p ?></td>
                                <td><?php echo $row['food_name']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                        <h3 style="margin-top: 10px">Total = <?php echo $amount;?></h3>
                        </div>
                </main>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once 'includes/footer.php'; ?>


    </body>
</html>
