<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="../../index.php">
                    <span data-feather="arrow-left"></span>
                    Back
                </a>
            </li>
            <?php if(isset($_SESSION['customer']) && $_SESSION['customer']==true): ?>
                <li class="nav-item">
                <a class="nav-link" href="history.php">
                    <span data-feather="clipboard"></span>
                    View Orders
                </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
