<?php 
require_once '../../connection.php';
$cid = $_SESSION['id'];
$result = $mysqli->query("SELECT DISTINCT rid,restaurant_name,restaurant_address,order_time,status from `checkout` WHERE cid='$cid'") or die($mysqli->error);
$k=0;
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
                <?php require_once 'includes/sidebarHistory.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 text-center">
                    <?php if($n>0): ?>
                    <h1 style="margin-top: 10px">Previous Orders</h1>
                        <div class="row justify-content-center">
                        <table class = "table">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Restaurant Name</th>
                                <th>Restaurant Address</th>
                                <th>Order Time</th>
                                <th>Status</th>
                                <th>View Full Order</th>
                            </tr>
                            </thead>
                            <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo ++$k; ?></td>
                                <td><?php echo $row['restaurant_name']; ?></td>
                                <td><?php echo $row['restaurant_address']; ?></td>
                                <td><?php echo $row['order_time']; ?></td>
                                <td>
                                    <?php if($row['status']==0): ?>
                                        <p style="color:orange;">Delivery On The Way</p>
                                    <?php else: ?>
                                        <p style="color:green;">Delivered</p>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="details.php?details=<?php echo $row['rid']; ?>" class = "btn btn-info" role="button">View Orders</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                        </div>
                    <?php else: ?>
                        <h1 style="margin-top: 10px">No Previous Orders</h1>
                    <?php endif; ?>
                </main>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once 'includes/footer.php'; ?>
    </body>
</html>
