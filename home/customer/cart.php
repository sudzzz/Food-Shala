<?php 
require_once '../../connection.php';

$result = $mysqli->query("SELECT * FROM `cart`") or die($mysqli->error);
$n = mysqli_num_rows($result);
$k = 0;
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s', time());
if(isset($_POST['quantity']))
{
    $quantity = $_POST['quantity'];
    $id = $_POST['modifyId'];
    $res = $mysqli->query("SELECT * FROM `cart` WHERE id='$id'") or die($mysqli->error);
    $r = mysqli_fetch_assoc($res);
    $price = $r['price']; 
    $total = $price*$quantity;            
    $mysqli->query("UPDATE `cart` SET quantity='$quantity',total='$total' WHERE id='$id'") or die($mysqli->error);
}

if(isset($_POST['remove']))
{
    $id = $_POST['remove'];
    $mysqli->query("DELETE FROM `cart` WHERE id='$id'") or die($mysqli->error);
}

if(isset($_POST['checkout']))
{
    $cid = $_SESSION['id'];
    $customer_name = $_SESSION['name'];
    $customer_address = $_SESSION['address'];
    $res = $mysqli->query("SELECT * FROM `cart` WHERE cid='$cid'") or die($mysqli->error);
    while ($row = $res->fetch_assoc())
    {
        $food = $row['food'];
        $quantity = $row['quantity'];
        $price = $row['total'];
        $rid = $row['rid'];
        $restaurant = $mysqli->query("SELECT name,address FROM `restaurant-register` WHERE id='$rid'") or die($mysqli->error);
        $data = mysqli_fetch_assoc($restaurant);
        $restaurant_name = $data['name'];
        $restaurant_address = $data['address'];

        $mysqli->query("INSERT INTO `checkout` (rid,cid,food_name,quantity,price,restaurant_name,customer_name,restaurant_address,customer_address,order_time) VALUES('$rid','$cid','$food','$quantity','$price','$restaurant_name','$customer_name','$restaurant_address','$customer_address','$date')") or die($mysqli->error);
    }
    echo "<script> alert('Your Order Has been Placed Successfully!');window.location = 'customer.php'</script>";
    $mysqli->query("TRUNCATE Table `cart`") or die($mysqli->error);

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
        <?php require_once 'includes/headerCart.php'; ?>
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 text-center border rounded bg-light my-5">
                    <h1 style="margin-top: 10px;">My Cart</h1>
                </div>
                <div class="col-lg-8 row justify-content-center">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Food Name</th>
                                <th>Food Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td>
                                        <?php echo ++$k; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['food'];?>
                                    </td>
                                    <td>
                                        <strong> <span style="font-size: 18px;">&#x20b9;</span><?= number_format($row['price'],2) ?></strong>
                                        <input type="hidden" class="foodprice" value="<?php echo $row['price'] ?>">
                                    </td>
                                    <td>
                                    <form action="" method="POST">
                                        <input class="text-center foodquantity" name="quantity" onchange="this.form.submit()" type="number" min="1" max="10" value="<?php echo $row['quantity'] ?>">
                                        <input type="hidden" name ="modifyId" value = "<?php echo $row['id'] ?>">
                                    </form>
                                    </td>
                                    <td class="foodtotal">
                                    </td>
                                    <td>
                                        <form action="" method="POST">
                                            <button name="remove" class="btn btn-sm btn-outline-danger">Remove</button>
                                            <input type="hidden" name ="remove" value = "<?php echo $row['id'] ?>">
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                    </table>
                </div>

                <div class="col-lg-4">
                    <div class="border bg-light rounded p-4">
                        <h4>Grand Total:</h4>
                        <h5 class="text-right" id="gtotal"></h5>
                        <br>
                        <form action="" method="POST">
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">Cash On Delivery</label>
                            </div>
                            <br>
                            <button class="btn btn-primary btn-block" name="checkout">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once 'includes/footer.php'; ?>
        <script>
            var gt=0;
            var foodprice = document.getElementsByClassName("foodprice");
            var foodquantity = document.getElementsByClassName("foodquantity");
            var foodtotal = document.getElementsByClassName("foodtotal");
            var gtotal = document.getElementById("gtotal");

            function subTotal()
            {
                gt=0;
                for(i=0;i<foodprice.length;i++)
                {
                    foodtotal[i].innerText = (foodprice[i].value)*(foodquantity[i].value);
                    gt=gt+(foodprice[i].value)*(foodquantity[i].value);
                }
                gtotal.innerText="Rs "+gt;
            }
            subTotal();
        </script>
    </body>
</html>
