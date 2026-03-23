<?php
include '../config/config.php';
checkLogin();
checkRole(['admin', 'staff']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/sidebar.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/icon/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'cremona', serif;
            background: #cbd5c0;
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        /* TOPBAR */
        .topbar {
            position: sticky;
            top: 0;
            left: 250px;

            right: 0;
            z-index: 1000;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;

            margin-top: -40px;
            margin-bottom: -20px;

            padding: 25px 20px;
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);

            transition: all 0.3s ease;
        }

        i {
            font-size: 25px;
        }

        /* Left side (Dashboard title) */
        .topbar-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topbar-left h1 {
            margin: 0;
            font-size: 1.5rem;
            color: #064adb;
        }

        /* Right side (Welcome Admin) */
        .topbar-right p {
            margin: 0;
            font-size: 0.95rem;
            color: #6b7280;
        }

        /* CONTENT */
        .content {
            margin-left: 250px;
            /* sidebar width */
 
            min-height: 100vh;
            padding-left: 30px;
            padding-right: 20px;
        }

        h2 {
            margin-bottom: 15px;
            color: #111827;
        }

        /* CHARTS ROW */
        .charts-row {
            margin-top: 5%;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            /* stack on small screens */
            margin-bottom: 40px;
        }

        .chart-wrapper {
            flex: 1;
            min-width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            height: 400px;
            display: flex;
            flex-direction: column;
        }

        .chart-wrapper h3 {
            margin-bottom: 15px;
            font-size: 1.2rem;
            font-weight: 600;
            color: #111827;
        }

        .chart-wrapper canvas {
            flex: 1;
        }

        /* RECENT ORDERS TABLE */
        .orders-container {
            overflow-x: auto;
            margin-bottom: 50px;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
        }

        .orders-table th,
        .orders-table td {
            padding: 12px 15px;
            text-align: left;
            font-size: 14px;
        }

        .orders-table thead {
            background: #2563eb;
            color: #fff;
            font-weight: 600;
        }

        .orders-table tbody tr {
            border-bottom: 1px solid #f3f4f6;
        }

        .orders-table tbody tr:hover {
            background: #f9fafb;
        }

        .orders-table td ul {
            padding-left: 15px;
            margin: 0;
        }

        .orders-table td ul li {
            list-style-type: disc;
        }
    </style>
</head>

<body>

    <?php include '../include/sidebar.php'; ?>



    <div class="content">
        <div class="header">
            <!-- TOPBAR -->
            <div class="topbar">
                <button id="sidebar-toggle"><i class="fas fa-bars"></i></button>
                <h1>Analytics Report</h1>
                <p>
                    Welcome, <?= $_SESSION['users'] ?? 'Guest' ?>
                    (<?= $_SESSION['role'] ?? 'Unknown' ?>)
                    <i class="fas fa-user-circle"></i>
                </p>
            </div>
            <!-- CHARTS SIDE BY SIDE -->
            <div class="charts-row">
                <!-- MONTHLY CHART -->
                <div class="chart-wrapper">
                    <h3>Monthly Sales</h3>
                    <?php include 'monthly_sales.php'; ?>
                </div>

                <!-- WEEKLY CHART -->
                <div class="chart-wrapper">
                    <h3>Weekly Sales</h3>
                    <?php include 'weekly_sales.php'; ?>
                </div>
            </div>

            <script>
                // Optional: Add smooth animations to charts if not already in your monthly/weekly scripts
                Chart.defaults.animation.duration = 1000;
            </script>

</body>

</html>