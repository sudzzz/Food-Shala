
<nav class="navbar bg-dark navbar-expand-lg fixed-top navbar-dark">
  <?php if(isset($_SESSION['customer']) && $_SESSION['customer']==true): ?>
    <a class="navbar-brand" ><?php echo $_SESSION['name'];?></a>
  <?php else: ?>
    <a class="navbar-brand" ><?php echo "Menu List";?></a>
  <?php endif; ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <?php 
    $result = $mysqli->query("SELECT * FROM `cart`") or die($mysqli->error);
    $n = mysqli_num_rows($result);
  ?>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="cart.php" class="btn btn-info" role="button">Mycart(<?php echo $n;?>)</a>
        </li>
        <?php if(isset($_SESSION['customer']) && $_SESSION['customer']==true): ?>
            <li class="nav-item">
            <a href="../../logout.php" class="btn btn-info" role="button">Logout</a>
            </li>
        <?php endif; ?>
      </ul>
    </div>
</nav>
