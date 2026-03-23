<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sidebar</title>

</head>

<body>
    <div class="sidebar">
        <h2 style="border-bottom: #16161665 solid 2px; font-size: 25px; font-weight: bolder; padding-bottom: 20px; margin-bottom: 15px;">
            Nadine's <?= $_SESSION['role'] ?? 'Unknown' ?>
        </h2>
        <?php if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'staff'): ?>
            <a href="<?= $base_url ?>index.php">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>
        <?php endif; ?>
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a href="<?= $base_url ?>src/menu/menu.php">
                <i class="fas fa-utensils"></i> Menu
            </a>
        <?php endif; ?>

        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a href="<?= $base_url ?>src/order/orders.php">
                <i class="fas fa-receipt"></i> Orders
            </a>


        <?php endif; ?>
        <?php if ($_SESSION['role'] === 'staff'): ?>
            <a href="<?= $base_url ?>src/order/view.php">
                <i class="fas fa-chart-bar"></i> View Orders <i class="fa-regular fa-bell" style="margin-left: 30px;"></i>
            </a>
        <?php endif; ?>
        <?php if ($_SESSION['role'] === 'admin'): ?>

            <a href="<?= $base_url ?>src/manage/menu_management.php">
                <i class="fas fa-edit"></i> Custom Menu
            </a>

            <a href="<?= $base_url ?>src/accounts/staff.php">
                <i class="fas fa-user-shield"></i> Accounts
            </a>

            <a href="<?= $base_url ?>src/dashboard/stats.php">
                <i class="fas fa-chart-bar"></i> Statistics
            </a>



        <?php endif; ?>

        <a href="<?= $base_url ?>auth/logout.php">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

</body>

</html>