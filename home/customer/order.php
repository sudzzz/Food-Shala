<?php 
require_once '../../connection.php';
$id = 0;
if(isset($_GET['accept']))
{
    $id = $_GET['accept'];
}
$searchKey = "";
if(isset($_POST['add']))
{
    if(isset($_SESSION['customer']) && $_SESSION['customer']==false)
    {
        echo "<script> alert('Please LogIn to order food!'); window.location = 'login.php'</script>";
    }
    else
    {
        $cid = $_SESSION['id'];
        $rid = $id;
        $food = $_POST['food'];
        $price = $_POST['price'];

        $result = $mysqli->query("SELECT * FROM `cart` WHERE food = '$food' AND rid='$rid'") or die($mysqli->error);
        if(mysqli_num_rows($result)==0)
        {
            $mysqli->query("INSERT INTO `cart` (cid,rid,food,price,total) VALUES('$cid','$rid','$food','$price','$price')") or die($mysqli->error);
            echo "<script> alert('Item is added to cart!');</script>";
        }
        else
        {
            echo "<script> alert('Item is already present in the cart!');</script>";
        }
     
    }
}
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['link'] = $actual_link;
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <!-- Head metas, css, and title -->
        <?php require_once 'includes/head.php'; ?>
    </head>
    <body>
        <!-- Header banner -->
        <?php require_once 'includes/headerOrder.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar menu -->
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="customer.php">
                                    <span data-feather="arrow-left"></span>
                                    Back
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <h1 style="margin-top: 10px;">Avaliable Menu</h1>
                    <?php
                        $result = $mysqli->query("SELECT * FROM `menu` WHERE rid='$id'");
                        if(isset($_POST['search']))
                        {
                            $searchKey = $_POST['search'];
                            $result = $mysqli->query("SELECT * from `menu` WHERE rid='$id' AND food LIKE '%$searchKey%'");
                        }
                    ?>
                    <!-- Search form -->
                    <form action="" method="POST">
                            <div class="col-md-6">
                            <input type="text" name="search" class='form-control' placeholder="Search By Food Name" value="<?php echo $searchKey; ?>" >
                            <button class="btn btn-info justify-content-center" style="margin-top:10px; margin-bottom:10px;">Search</button>
                            </div>
                    </form>
                    <div class="row justify-content-center">
                    <table class = "table">
                        <thead>
                        <tr>
                            <th>Food Name</th>
                            <th>Food Type</th>
                            <th>Food Price</th>
                            <th>Purchase</th>
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
                            <td>
                                <strong> <span style="font-size: 18px;">&#x20b9;</span><?= number_format($row['price'],2) ?></strong>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    <button type="submit" name="add" class = "btn btn-info" role="button">Add To Cart</button>
                                    <input type="hidden" name ="food" value = "<?php echo $row['food'] ?>">
                                    <input type="hidden" name="price" value = "<?php echo $row['price'] ?>">
                                </form>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                    </div>
                </main>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once 'includes/footer.php'; ?>


    </body>
</html>
