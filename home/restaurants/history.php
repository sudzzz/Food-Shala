<?php 
require_once '../../connection.php';
$rid = $_SESSION['id'];
$result = $mysqli->query("SELECT DISTINCT cid,customer_name,customer_address,order_time,status from `checkout` WHERE rid='$rid'") or die($mysqli->error);
$k=0;
$n = mysqli_num_rows($result);

if(isset($_POST['deliver']))
{
    $time = $_POST['time'];
    $cid = $_POST['cid'];
    $status = 1;
    $mysqli->query("UPDATE `checkout` SET status='$status' WHERE cid='$cid' AND order_time='$time'");
    echo "<script> alert('The Order is Delivered Successfully!');window.location = 'history.php'</script>";
}
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
                                <th>Customer Name</th>
                                <th>Customer Address</th>
                                <th>Order Time</th>
                                <th>View Full Order</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo ++$k; ?></td>
                                <td><?php echo $row['customer_name']; ?></td>
                                <td><?php echo $row['customer_address']; ?></td>
                                <td><?php echo $row['order_time']; ?></td>
                                <td>
                                    <form action="details.php" method="POST">
                                        <button name="details" class="btn btn-info">View Orders</button>
                                        <input type="hidden" name ="time" value = "<?php echo $row['order_time'] ?>">
                                        <input type="hidden" name ="cid" value = "<?php echo $row['cid'] ?>">
                                    </form>
                                </td>
                                <td>
                                    <?php if($row['status']==0): ?>
                                        <form action="history.php" method="POST">
                                            <button name="deliver" class="btn btn-success">Deliver</button>
                                            <input type="hidden" name ="time" value = "<?php echo $row['order_time'] ?>">
                                            <input type="hidden" name ="cid" value = "<?php echo $row['cid'] ?>">
                                        </form>
                                    <?php else: ?>
                                        <p style="color:green;">Delivered</p>
                                    <?php endif; ?>
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
