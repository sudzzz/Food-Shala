<?php
require_once '../../connection.php';
$searchKey = "";

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
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <h1 style="margin-top: 10px">Avaliable Restaurants</h1>
                    <?php
                        $result = $mysqli->query("SELECT * FROM `restaurant-register`");
                        if(isset($_POST['search']))
                        {
                            $searchKey = $_POST['search'];
                            $result = $mysqli->query("SELECT * from `restaurant-register` WHERE name LIKE '%$searchKey%'");
                        }
                    ?>
                    <!-- Search form -->
                    <form action="" method="POST">
                            <div class="col-md-6">
                            <input type="text" name="search" class='form-control' placeholder="Search By Restaurant Name" value="<?php echo $searchKey; ?>" >
                            <button class="btn btn-info justify-content-center" style="margin-top:10px; margin-bottom:10px;">Search</button>
                            </div>
                    </form>
                    <div class="row justify-content-center">
                    <table class = "table">
                        <thead>
                        <tr>
                            <th>Restaurant's Name</th>
                            <th>Restaurant's Address</th>
                            <th>Order</th>
                        </tr>
                        </thead>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td>
                                <a href="order.php?accept=<?php echo $row['id']; ?>" class = "btn btn-info" role="button">Order</a>
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
