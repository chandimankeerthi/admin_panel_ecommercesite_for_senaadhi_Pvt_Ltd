<?php
session_start();
include "config.php";


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Admin</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>

    <!-- ==========side navbars start ========== -->
    <?php
        include "admin_sidenav.php";
        
    ?>
    <!-- ==========side navbars end ========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">

        <!-- ========== topbar start ========== -->
        <?php
        include "admin_topbar.php";
    ?>
        <!-- ========== topbar end ========== -->

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h1>Site Dashboard</h1>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper mb-30">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#0">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Dashboard
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->

                <!-- //////////////////Dashboard Filter///////////////////////// -->

                <h2>Filter Your Search</h2><br>


                <?php


function getOrderCountByStatus($conn, $status, $startDate = null) {
    $sql = "SELECT COUNT(*) AS order_count FROM order_detail WHERE order_status='$status'";
    if ($startDate) {
        $sql .= " AND timeSTMP >= '$startDate'";
    }

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    return $row['order_count'];
}

function getTotalIncomeByStatus($conn, $status, $startDate = null) {
    $sql = "SELECT SUM(total_price) AS total_income FROM order_detail WHERE order_status='$status'";
    if ($startDate) {
        $sql .= " AND timeSTMP >= '$startDate'";
    }

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    return $row['total_income'];
}





// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected time period from the form
    $selectedTimePeriod = $_POST["timePeriod"];

    // Calculate the start date based on the selected time period
    $startDate = date('Y-m-d', strtotime('-' . $selectedTimePeriod . ' days'));

    // Use the start date in the SQL query for order counts
    $newOrderCount = getOrderCountByStatus($conn, 'New Order', $startDate);
    $processingOrderCount = getOrderCountByStatus($conn, 'Processing', $startDate);
    $outForDeliveryOrderCount = getOrderCountByStatus($conn, 'Out for Delevery', $startDate);
    $deliveredOrderCount = getOrderCountByStatus($conn, 'Delevered', $startDate);

    // Use the start date in the SQL query for total income
    $totalIncomeDelivered = getTotalIncomeByStatus($conn, 'Delevered', $startDate);
    $totalIncomeOutForDelivery = getTotalIncomeByStatus($conn, 'Out for Delevery', $startDate);
    
}
else{

// Set the initial time period to 7 days
$selectedTimePeriod = 1;

// Calculate the start date based on the selected time period
$startDate = date('Y-m-d', strtotime('-' . $selectedTimePeriod . ' days'));


// Use the start date in the SQL query for order counts
$newOrderCount = getOrderCountByStatus($conn, 'New Order', $startDate);
$processingOrderCount = getOrderCountByStatus($conn, 'Processing', $startDate);
$outForDeliveryOrderCount = getOrderCountByStatus($conn, 'Out for Delevery', $startDate);
$deliveredOrderCount = getOrderCountByStatus($conn, 'Delevered', $startDate);

// Use the start date in the SQL query for total income
$totalIncomeDelivered = getTotalIncomeByStatus($conn, 'Delevered', $startDate);
$totalIncomeOutForDelivery = getTotalIncomeByStatus($conn, 'Out for Delevery', $startDate);


}
?>

                <!-- Add a form element to select the time period -->
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="timePeriod">Select Time Period:</label>
                        <select class="form-control" id="timePeriod" name="timePeriod">
                            <option value="1" <?php if ($selectedTimePeriod == 1) echo "selected"; ?>>Last 1 days
                            </option>
                            <option value="3" <?php if ($selectedTimePeriod == 3) echo "selected"; ?>>Last 3 days
                            </option>
                            <option value="7" <?php if ($selectedTimePeriod == 7) echo "selected"; ?>>Last 7 days
                            </option>
                            <option value="30" <?php if ($selectedTimePeriod == 30) echo "selected"; ?>>Last 30 days
                            </option>
                            <option value="90" <?php if ($selectedTimePeriod == 90) echo "selected"; ?>>Last 90 days
                            </option>
                            <!-- Add more options as needed -->
                        </select><br>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <br>
                <!-- Your HTML code here -->

                <div class="row">
                    <!-- New Orders -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">New Orders (Last <?php echo $selectedTimePeriod; ?> days)</h6>
                                <h3 class="text-bold mb-10"><?php echo $newOrderCount; ?></h3>
                                <p class="text-sm text-danger">
                                    <span class="text-gray">Current</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Processing Orders -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Processing Orders (Last <?php echo $selectedTimePeriod; ?> days)</h6>
                                <h3 class="text-bold mb-10"><?php echo $processingOrderCount; ?></h3>
                                <p class="text-sm text-danger">
                                    <span class="text-gray">Current</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Out for Delivery Orders -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Out for Delivery Orders (Last <?php echo $selectedTimePeriod; ?> days)
                                </h6>
                                <h3 class="text-bold mb-10"><?php echo $outForDeliveryOrderCount; ?></h3>
                                <p class="text-sm text-danger">
                                    <span class="text-gray">Current</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Delivered Orders -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Delivered Orders (Last <?php echo $selectedTimePeriod; ?> days)</h6>
                                <h3 class="text-bold mb-10"><?php echo $deliveredOrderCount; ?></h3>
                                <p class="text-sm text-danger">
                                    <span class="text-gray">Current</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Income (Delevered Orders) -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon success">
                                <i class="lni lni-dollar"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Total Net Income (Last <?php echo $selectedTimePeriod; ?> days)</h6>
                                <h3 class="text-bold mb-10">Rs.<?php echo $totalIncomeDelivered; ?></h3>
                                <p class="text-sm text-danger">
                                    <span class="text-gray">Current</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Income (Out for Delivery Orders) -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon success">
                                <i class="lni lni-dollar"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Pending Payments (Last <?php echo $selectedTimePeriod; ?> days)</h6>
                                <h3 class="text-bold mb-10">Rs.<?php echo $totalIncomeOutForDelivery; ?></h3>
                                <p class="text-sm text-danger">
                                    <span class="text-gray">Current</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Add more sections for other statuses as needed -->
                </div>

                <!-- /////////////////Dashboard filter End////////////////// -->


                <h2>General Details</h2><br>


                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <?php

$getToCartSql="SELECT COUNT(*) AS order_count FROM order_detail WHERE order_status='New Order'";

$resultGetToCart = $conn->query($getToCartSql);
$rowGetToCart = $resultGetToCart->fetch_assoc();

// Check if there are rows with the status 'Processing'
    if ($rowGetToCart['order_count'] > 0) {
    ?>
                                <h6 class="mb-10">New Orders</h6>
                                <h3 class="text-bold mb-10"><?php echo $rowGetToCart['order_count']; ?></h3>
                                <p class="text-sm text-success">
                                    <span class="text-gray">Current</span>
                                </p>
                                <?php
    } else {
        // No orders with 'Processing' status found
        echo "<h6 class='mb-10'>New Orders</h6>";
        echo "<h3 class='text-bold mb-10'>0</h3>";
    }
    ?>

                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>

                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <?php

$getToCartSql="SELECT COUNT(*) AS order_count FROM order_detail WHERE order_status='Processing'";

$resultGetToCart = $conn->query($getToCartSql);
$rowGetToCart = $resultGetToCart->fetch_assoc();

// Check if there are rows with the status 'Processing'
    if ($rowGetToCart['order_count'] > 0) {
    ?>
                                <h6 class="mb-10">Processing Orders</h6>
                                <h3 class="text-bold mb-10"><?php echo $rowGetToCart['order_count']; ?></h3>
                                <p class="text-sm text-success">
                                    <span class="text-gray">Current</span>
                                </p>
                                <?php
    } else {
        // No orders with 'Processing' status found
        echo "<h6 class='mb-10'>Processing Orders</h6>";
        echo "<h3 class='text-bold mb-10'>0</h3>";
    }
    ?>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>

                    <!-- End Col -->

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <?php

$getToCartSql="SELECT COUNT(*) AS order_count FROM order_detail WHERE order_status='Out for Delevery'";

$resultGetToCart = $conn->query($getToCartSql);
$rowGetToCart = $resultGetToCart->fetch_assoc();

// Check if there are rows with the status 'Processing'
    if ($rowGetToCart['order_count'] > 0) {
    ?>
                                <h6 class="mb-10">Out for Delevery Orders</h6>
                                <h3 class="text-bold mb-10"><?php echo $rowGetToCart['order_count']; ?></h3>
                                <p class="text-sm text-success">
                                    <span class="text-gray">Current</span>
                                </p>
                                <?php
    } else {
        // No orders with 'Processing' status found
        echo "<h6 class='mb-10'>Out for Delevery Orders</h6>";
        echo "<h3 class='text-bold mb-10'>0</h3>";
    }
    ?>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>

                    <!-- End Col -->

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <?php

$getToCartSql="SELECT COUNT(*) AS order_count FROM order_detail WHERE order_status='Delevered'";

$resultGetToCart = $conn->query($getToCartSql);
$rowGetToCart = $resultGetToCart->fetch_assoc();

// Check if there are rows with the status 'Processing'
    if ($rowGetToCart['order_count'] > 0) {
    ?>
                                <h6 class="mb-10">Delevered Orders</h6>
                                <h3 class="text-bold mb-10"><?php echo $rowGetToCart['order_count']; ?></h3>
                                <p class="text-sm text-success">
                                    <span class="text-gray">Current</span>
                                </p>
                                <?php
    } else {
        // No orders with 'Processing' status found
        echo "<h6 class='mb-10'>Delevered Orders</h6>";
        echo "<h3 class='text-bold mb-10'>0</h3>";
    }
    ?>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>

                    <!-- End Col -->


                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <?php

$getToCartSql="SELECT COUNT(*) AS order_count FROM order_detail ";

$resultGetToCart = $conn->query($getToCartSql);
$rowGetToCart = $resultGetToCart->fetch_assoc();

// Check if there are rows with the status 'Processing'
    if ($rowGetToCart['order_count'] > 0) {
    ?>
                                <h6 class="mb-10">Total Orders</h6>
                                <h3 class="text-bold mb-10"><?php echo $rowGetToCart['order_count']; ?></h3>
                                <p class="text-sm text-success">
                                    <span class="text-gray">Current</span>
                                </p>
                                <?php
    } else {
        // No orders with 'Processing' status found
        echo "<h6 class='mb-10'>Total Orders</h6>";
        echo "<h3 class='text-bold mb-10'>0</h3>";
    }
    ?>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>

                    <!-- End Col -->



                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon success">
                                <i class="lni lni-dollar"></i>
                            </div>
                            <div class="content">
                                <?php
            $getTotalIncomeSql = "SELECT SUM(total_price) AS total_income FROM order_detail WHERE order_status='Delevered'";
            $resultTotalIncome = $conn->query($getTotalIncomeSql);
            $rowTotalIncome = $resultTotalIncome->fetch_assoc();

            // Check if total income is greater than 0
            if ($rowTotalIncome['total_income'] > 0) {
            ?>
                                <h6 class="mb-10">Total Net Income</h6>
                                <h3 class="text-bold mb-10">Rs.<?php echo $rowTotalIncome['total_income']; ?></h3>
                                <p class="text-sm text-success">
                                    <span class="text-gray">Increased</span>
                                </p>
                                <?php
            } else {
                // No income found
                echo "<h6 class='mb-10'>Total Net Income</h6>";
                echo "<h3 class='text-bold mb-10'>0</h3>";
            }
            ?>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>




                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon success">
                                <i class="lni lni-dollar"></i>
                            </div>
                            <div class="content">
                                <?php
            $getTotalIncomeSql = "SELECT SUM(total_price) AS total_income FROM order_detail WHERE order_status='Out for Delevery'";
            $resultTotalIncome = $conn->query($getTotalIncomeSql);
            $rowTotalIncome = $resultTotalIncome->fetch_assoc();

            // Check if total income is greater than 0
            if ($rowTotalIncome['total_income'] > 0) {
            ?>
                                <h6 class="mb-10">Pending Payments</h6>
                                <h3 class="text-bold mb-10">Rs.<?php echo $rowTotalIncome['total_income']; ?></h3>
                                <p class="text-sm text-success">
                                    <span class="text-gray">Current</span>
                                </p>
                                <?php
            } else {
                // No income found
                echo "<h6 class='mb-10'>Pending Payments</h6>";
                echo "<h3 class='text-bold mb-10'>0</h3>";
            }
            ?>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>


                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon primary">
                                <i class="lni lni-credit-cards"></i>
                            </div>
                            <div class="content">
                                <?php
            $getInStockCountSql = "SELECT COUNT(*) AS in_stock_count FROM product_details WHERE productQuantity > 0";
            $resultInStockCount = $conn->query($getInStockCountSql);
            $rowInStockCount = $resultInStockCount->fetch_assoc();

            // Check if there are products in stock
            if ($rowInStockCount['in_stock_count'] > 0) {
            ?>
                                <h6 class="mb-10">In Stock Products Count</h6>
                                <h3 class="text-bold mb-10"><?php echo $rowInStockCount['in_stock_count']; ?></h3>
                                <p class="text-sm text-danger">
                                    <span class="text-gray">Current</span>
                                </p>
                                <?php
            } else {
                // No products in stock found
                echo "<h6 class='mb-10'>In Stock Products Count</h6>";
                echo "<h3 class='text-bold mb-10'>0</h3>";
                echo "<p class='text-sm text-danger'>";
                echo "<i class='lni lni-arrow-down'></i> -2.00%";
                echo "<span class='text-gray'>Expense</span>";
                echo "</p>";
            }
            ?>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon primary">
                                <i class="lni lni-credit-cards"></i>
                            </div>
                            <div class="content">
                                <?php
            $getInStockCountSql = "SELECT COUNT(*) AS out_stock_count FROM product_details WHERE productQuantity=0";
            $resultInStockCount = $conn->query($getInStockCountSql);
            $rowInStockCount = $resultInStockCount->fetch_assoc();

            // Check if there are products in stock
            if ($rowInStockCount['out_stock_count'] > 0) {
            ?>
                                <h6 class="mb-10">Out of Stock Prod Count</h6>
                                <h3 class="text-bold mb-10"><?php echo $rowInStockCount['out_stock_count']; ?></h3>
                                <p class="text-sm text-danger">
                                    <span class="text-gray">Current</span>
                                </p>
                                <?php
            } else {
                // No products in stock found
                echo "<h6 class='mb-10'>Out of Stock Prod Count</h6>";
                echo "<h3 class='text-bold mb-10'>0</h3>";
                echo "<p class='text-sm text-danger'>";
                echo "<i class='lni lni-arrow-down'></i> -2.00%";
                echo "<span class='text-gray'>Expense</span>";
                echo "</p>";
            }
            ?>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon primary">
                                <i class="lni lni-credit-cards"></i>
                            </div>
                            <div class="content">
                                <?php
            $getInStockCountSql = "SELECT COUNT(*) AS out_stock_count FROM product_details WHERE product_type='fashion'";
            $resultInStockCount = $conn->query($getInStockCountSql);
            $rowInStockCount = $resultInStockCount->fetch_assoc();

            // Check if there are products in stock
            if ($rowInStockCount['out_stock_count'] > 0) {
            ?>
                                <h6 class="mb-10">Total Fashion Item Count</h6>
                                <h3 class="text-bold mb-10"><?php echo $rowInStockCount['out_stock_count']; ?></h3>
                                <p class="text-sm text-danger">
                                    <span class="text-gray">Current</span>
                                </p>
                                <?php
            } else {
                // No products in stock found
                echo "<h6 class='mb-10'>Total Fashion Item Count</h6>";
                echo "<h3 class='text-bold mb-10'>0</h3>";
                echo "<p class='text-sm text-danger'>";
                echo "<i class='lni lni-arrow-down'></i> -2.00%";
                echo "<span class='text-gray'>Expense</span>";
                echo "</p>";
            }
            ?>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon primary">
                                <i class="lni lni-credit-cards"></i>
                            </div>
                            <div class="content">
                                <?php
            $getInStockCountSql = "SELECT COUNT(*) AS out_stock_count FROM product_details WHERE product_type='furniture'";
            $resultInStockCount = $conn->query($getInStockCountSql);
            $rowInStockCount = $resultInStockCount->fetch_assoc();

            // Check if there are products in stock
            if ($rowInStockCount['out_stock_count'] > 0) {
            ?>
                                <h6 class="mb-10">Total Furniture Item Count</h6>
                                <h3 class="text-bold mb-10"><?php echo $rowInStockCount['out_stock_count']; ?></h3>
                                <p class="text-sm text-danger">
                                    <span class="text-gray">Current</span>
                                </p>
                                <?php
            } else {
                // No products in stock found
                echo "<h6 class='mb-10'>Total Furniture Item Count</h6>";
                echo "<h3 class='text-bold mb-10'>0</h3>";
                echo "<p class='text-sm text-danger'>";
                echo "<i class='lni lni-arrow-down'></i> -2.00%";
                echo "<span class='text-gray'>Expense</span>";
                echo "</p>";
            }
            ?>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->





                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon orange">
                                <i class="lni lni-user"></i>
                            </div>
                            <div class="content">
                                <?php

$getToCartSql="SELECT COUNT(*) AS user_count FROM user_details WHERE userRole='non admin'";

$resultGetToCart = $conn->query($getToCartSql);
$rowGetToCart = $resultGetToCart->fetch_assoc();

// Check if there are rows with the status 'Processing'
    if ($rowGetToCart['user_count'] > 0) {
    ?>
                                <h6 class="mb-10">Total Customers</h6>
                                <h3 class="text-bold mb-10"><?php echo $rowGetToCart['user_count']; ?></h3>
                                <p class="text-sm text-danger">
                                    <span class="text-gray"> Current</span>
                                </p>
                                <?php
    } else {
        // No orders with 'Processing' status found
        echo "<h6 class='mb-10'>Total Customers</h6>";
        echo "<h3 class='text-bold mb-10'>0</h3>";
    }
    ?>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                </div>




                <!-- ///////////////////////Dashboard Graph Start/////////////////////////////////////// -->

                <div class="icon purple">
                    <i class="lni lni-cart-full"></i>
                </div>
                <div class="content">
                    <?php
            // Modify your SQL query to fetch the necessary data
            $getToCartSql = "SELECT timeSTMP, CAST(total_price AS DECIMAL(10, 2)) AS total_price_decimal FROM order_detail WHERE order_status='New Order'";
            $resultGetToCart = $conn->query($getToCartSql);

            // Initialize arrays to store data for the histogram
            $labels = [];
            $data = [];

            if ($resultGetToCart->num_rows > 0) {
                while ($row = $resultGetToCart->fetch_assoc()) {
                    $labels[] = $row["timeSTMP"];
                    $data[] = $row["total_price_decimal"];
                }
            }
            
            // Convert data to JSON format for use in JavaScript
            $dataJSON = json_encode($data);
            $labelsJSON = json_encode($labels);
            ?>

                    <h6 class="mb-10">New Orders</h6>
                    <div style="height: 600px; width: 80%;">
                        <canvas id="histogramChartNewOrders"></canvas> <!-- Use a unique ID for the canvas element -->
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                    // Load data from PHP into JavaScript
                    var data = <?php echo $dataJSON; ?>;
                    var labels = <?php echo $labelsJSON; ?>;

                    var ctx = document.getElementById('histogramChartNewOrders').getContext('2d'); // Use the unique ID
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Total Price',
                                data: data,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'timeSTMP'
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Total Price (Rs.)'
                                    }
                                }
                            }
                        }
                    });
                    </script>
                </div>
            </div>
            <!-- End Icon Cart -->
            </div>

            <div class="icon purple">
                <i class="lni lni-cart-full"></i>
            </div>
            <div class="content">
                <?php
            // Modify your SQL query to fetch the necessary data
            $getToCartSql = "SELECT timeSTMP, CAST(total_price AS DECIMAL(10, 2)) AS total_price_decimal FROM order_detail WHERE order_status='Processing'";
            $resultGetToCart = $conn->query($getToCartSql);

            // Initialize arrays to store data for the histogram
            $labels = [];
            $data = [];

            if ($resultGetToCart->num_rows > 0) {
                while ($row = $resultGetToCart->fetch_assoc()) {
                    $labels[] = $row["timeSTMP"];
                    $data[] = $row["total_price_decimal"];
                }
            }
            
            // Convert data to JSON format for use in JavaScript
            $dataJSON = json_encode($data);
            $labelsJSON = json_encode($labels);
            ?>

                <h6 class="mb-10">Processing Orders</h6>
                <div style="height: 600px; width: 80%;">
                    <canvas id="histogramChartProcessing"></canvas> <!-- Use a unique ID for the canvas element -->
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                // Load data from PHP into JavaScript
                var data = <?php echo $dataJSON; ?>;
                var labels = <?php echo $labelsJSON; ?>;

                var ctx = document.getElementById('histogramChartProcessing').getContext('2d'); // Use the unique ID
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Price',
                            data: data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'timeSTMP'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Total Price (Rs.)'
                                }
                            }
                        }
                    }
                });
                </script>
            </div>
            </div>
            <!-- End Icon Cart -->
            </div>


            <div class="icon purple">
                <i class="lni lni-cart-full"></i>
            </div>
            <div class="content">
                <?php
            // Modify your SQL query to fetch the necessary data
            $getToCartSql = "SELECT timeSTMP, CAST(total_price AS DECIMAL(10, 2)) AS total_price_decimal FROM order_detail WHERE order_status='Delevered'";
            $resultGetToCart = $conn->query($getToCartSql);

            // Initialize arrays to store data for the histogram
            $labels = [];
            $data = [];

            if ($resultGetToCart->num_rows > 0) {
                while ($row = $resultGetToCart->fetch_assoc()) {
                    $labels[] = $row["timeSTMP"];
                    $data[] = $row["total_price_decimal"];
                }
            }
            
            // Convert data to JSON format for use in JavaScript
            $dataJSON = json_encode($data);
            $labelsJSON = json_encode($labels);
            ?>

                <h6 class="mb-10">Delevered Orders</h6>
                <div style="height: 600px; width: 80%;">
                    <canvas id="histogramChartDelivered"></canvas> <!-- Use a unique ID for the canvas element -->
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                // Load data from PHP into JavaScript
                var data = <?php echo $dataJSON; ?>;
                var labels = <?php echo $labelsJSON; ?>;

                var ctx = document.getElementById('histogramChartDelivered').getContext('2d'); // Use the unique ID
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Price',
                            data: data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'timeSTMP'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Total Price (Rs.)'
                                }
                            }
                        }
                    }
                });
                </script>
            </div>
            </div>
            <!-- End Icon Cart -->
            </div>

            <div class="icon purple">
                <i class="lni lni-cart-full"></i>
            </div>
            <div class="content">
                <?php
            // Modify your SQL query to count all orders
            $getTotalOrdersSql = "SELECT COUNT(*) AS order_count FROM order_detail";
            $resultTotalOrders = $conn->query($getTotalOrdersSql);
            $rowTotalOrders = $resultTotalOrders->fetch_assoc();

            // Check if there are rows with orders
            if ($rowTotalOrders['order_count'] > 0) {
                $orderCount = $rowTotalOrders['order_count'];
            } else {
                // No orders found, set count to 0
                $orderCount = 0;
            }
            ?>

                <h6 class="mb-10">Total Orders</h6>
                <div style="height: 600px; width: 80%;">
                    <canvas id="totalOrdersChart"></canvas>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                // Load data from PHP into JavaScript
                var orderCount = <?php echo $orderCount; ?>;
                var ctx = document.getElementById('totalOrdersChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Total Orders'],
                        datasets: [{
                            label: 'Order Count',
                            data: [orderCount],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Purple color
                            borderColor: 'rgba(75, 192, 192, 1)', // Purple color
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Order Status'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Order Count'
                                }
                            }
                        }
                    }
                });
                </script>
            </div>
            </div>
            <!-- End Icon Cart -->
            </div>



            <div class="icon success">
                <i class="lni lni-dollar"></i>
            </div>
            <div class="content">
                <?php
            // Modify your SQL query to calculate total net income
            $getTotalIncomeSql = "SELECT SUM(total_price) AS total_income FROM order_detail WHERE order_status='Delevered'";
            $resultTotalIncome = $conn->query($getTotalIncomeSql);
            $rowTotalIncome = $resultTotalIncome->fetch_assoc();

            // Check if total income is greater than 0
            if ($rowTotalIncome['total_income'] > 0) {
                $totalIncome = $rowTotalIncome['total_income'];
            } else {
                // No income found, set total income to 0
                $totalIncome = 0;
            }
            ?>

                <h6 class="mb-10">Total Net Income</h6>
                <div style="height: 600px; width: 80%;">
                    <canvas id="totalIncomeChart"></canvas>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                // Load data from PHP into JavaScript
                var totalIncome = <?php echo $totalIncome; ?>;
                var ctx = document.getElementById('totalIncomeChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Total Net Income'],
                        datasets: [{
                            label: 'Income (Rs.)',
                            data: [totalIncome],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Green color
                            borderColor: 'rgba(75, 192, 192, 1)', // Green color
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Income Category'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Total Net Income (Rs.)'
                                }
                            }
                        }
                    }
                });
                </script>
            </div>
            </div>
            <!-- End Icon Cart -->
            </div>




            <!-- ///////////////////////Dashboard Graph End/////////////////////////////////////// -->

            <div class="row">
                <div class="col-lg-5">
                    <div class="card-style calendar-card mb-30">
                        <div id="calendar-mini"></div>
                    </div>
                </div>
                <!-- End Col -->

            </div>
            <!-- End Col -->
            </div>
            <!-- End Row -->
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
    // ======== jvectormap activation
    // var markers = [
    //   { name: "Egypt", coords: [26.8206, 30.8025] },
    //   { name: "Russia", coords: [61.524, 105.3188] },
    //   { name: "Canada", coords: [56.1304, -106.3468] },
    //   { name: "Greenland", coords: [71.7069, -42.6043] },
    //   { name: "Brazil", coords: [-14.235, -51.9253] },
    // ];

    // var jvm = new jsVectorMap({
    //   map: "world_merc",
    //   selector: "#map",
    //   zoomButtons: true,

    //   regionStyle: {
    //     initial: {
    //       fill: "#d1d5db",
    //     },
    //   },

    //   labels: {
    //     markers: {
    //       render: (marker) => marker.name,
    //     },
    //   },

    //   markersSelectable: true,
    //   selectedMarkers: markers.map((marker, index) => {
    //     var name = marker.name;

    //     if (name === "Russia" || name === "Brazil") {
    //       return index;
    //     }
    //   }),
    //   markers: markers,
    //   markerStyle: {
    //     initial: { fill: "#4A6CF7" },
    //     selected: { fill: "#ff5050" },
    //   },
    //   markerLabelStyle: {
    //     initial: {
    //       fontWeight: 400,
    //       fontSize: 14,
    //     },
    //   },
    // });
    // ====== calendar activation
    document.addEventListener("DOMContentLoaded", function() {
        var calendarMiniEl = document.getElementById("calendar-mini");
        var calendarMini = new FullCalendar.Calendar(calendarMiniEl, {
            initialView: "dayGridMonth",
            headerToolbar: {
                end: "today prev,next",
            },
        });
        calendarMini.render();
    });

    // =========== chart one start
    const ctx1 = document.getElementById("Chart1").getContext("2d");
    const chart1 = new Chart(ctx1, {
        // The type of chart we want to create
        type: "line", // also try bar or other graph types

        // The data for our dataset
        data: {
            labels: [
                "Jan",
                "Fab",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            // Information about the dataset
            datasets: [{
                label: "",
                backgroundColor: "transparent",
                borderColor: "#4A6CF7",
                data: [
                    600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
                ],
                pointBackgroundColor: "transparent",
                pointHoverBackgroundColor: "#4A6CF7",
                pointBorderColor: "transparent",
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 5,
                pointBorderWidth: 5,
                pointRadius: 8,
                pointHoverRadius: 8,
            }, ],
        },

        // Configuration options
        defaultFontFamily: "Inter",
        options: {
            tooltips: {
                callbacks: {
                    labelColor: function(tooltipItem, chart) {
                        return {
                            backgroundColor: "#ffffff",
                        };
                    },
                },
                intersect: false,
                backgroundColor: "#f9f9f9",
                titleFontFamily: "Inter",
                titleFontColor: "#8F92A1",
                titleFontColor: "#8F92A1",
                titleFontSize: 12,
                bodyFontFamily: "Inter",
                bodyFontColor: "#171717",
                bodyFontStyle: "bold",
                bodyFontSize: 16,
                multiKeyBackground: "transparent",
                displayColors: false,
                xPadding: 30,
                yPadding: 10,
                bodyAlign: "center",
                titleAlign: "center",
            },

            title: {
                display: false,
            },
            legend: {
                display: false,
            },

            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawTicks: false,
                        drawBorder: false,
                    },
                    ticks: {
                        padding: 35,
                        max: 1200,
                        min: 500,
                    },
                }, ],
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(143, 146, 161, .1)",
                        zeroLineColor: "rgba(143, 146, 161, .1)",
                    },
                    ticks: {
                        padding: 20,
                    },
                }, ],
            },
        },
    });

    // =========== chart one end

    // =========== chart two start
    const ctx2 = document.getElementById("Chart2").getContext("2d");
    const chart2 = new Chart(ctx2, {
        // The type of chart we want to create
        type: "bar", // also try bar or other graph types
        // The data for our dataset
        data: {
            labels: [
                "Jan",
                "Fab",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            // Information about the dataset
            datasets: [{
                label: "",
                backgroundColor: "#4A6CF7",
                barThickness: 6,
                maxBarThickness: 8,
                data: [
                    600, 700, 1000, 700, 650, 800, 690, 740, 720, 1120, 876, 900,
                ],
            }, ],
        },
        // Configuration options
        options: {
            borderColor: "#F3F6F8",
            borderWidth: 15,
            backgroundColor: "#F3F6F8",
            tooltips: {
                callbacks: {
                    labelColor: function(tooltipItem, chart) {
                        return {
                            backgroundColor: "rgba(104, 110, 255, .0)",
                        };
                    },
                },
                backgroundColor: "#F3F6F8",
                titleFontColor: "#8F92A1",
                titleFontSize: 12,
                bodyFontColor: "#171717",
                bodyFontStyle: "bold",
                bodyFontSize: 16,
                multiKeyBackground: "transparent",
                displayColors: false,
                xPadding: 30,
                yPadding: 10,
                bodyAlign: "center",
                titleAlign: "center",
            },

            title: {
                display: false,
            },
            legend: {
                display: false,
            },

            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawTicks: false,
                        drawBorder: false,
                    },
                    ticks: {
                        padding: 35,
                        max: 1200,
                        min: 0,
                    },
                }, ],
                xAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                        color: "rgba(143, 146, 161, .1)",
                        zeroLineColor: "rgba(143, 146, 161, .1)",
                    },
                    ticks: {
                        padding: 20,
                    },
                }, ],
            },
        },
    });
    // =========== chart two end

    // =========== chart three start
    const ctx3 = document.getElementById("Chart3").getContext("2d");
    const chart3 = new Chart(ctx3, {
        // The type of chart we want to create
        type: "line", // also try bar or other graph types

        // The data for our dataset
        data: {
            labels: [
                "Jan",
                "Fab",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            // Information about the dataset
            datasets: [{
                    label: "Revenue",
                    backgroundColor: "transparent",
                    borderColor: "#4a6cf7",
                    data: [80, 120, 110, 100, 130, 150, 115, 145, 140, 130, 160, 210],
                    pointBackgroundColor: "transparent",
                    pointHoverBackgroundColor: "#4a6cf7",
                    pointBorderColor: "transparent",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 3,
                    pointBorderWidth: 5,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                },
                {
                    label: "Profit",
                    backgroundColor: "transparent",
                    borderColor: "#9b51e0",
                    data: [
                        120, 160, 150, 140, 165, 210, 135, 155, 170, 140, 130, 200,
                    ],
                    pointBackgroundColor: "transparent",
                    pointHoverBackgroundColor: "#9b51e0",
                    pointBorderColor: "transparent",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 3,
                    pointBorderWidth: 5,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                },
                {
                    label: "Order",
                    backgroundColor: "transparent",
                    borderColor: "#f2994a",
                    data: [180, 110, 140, 135, 100, 90, 145, 115, 100, 110, 115, 150],
                    pointBackgroundColor: "transparent",
                    pointHoverBackgroundColor: "#f2994a",
                    pointBorderColor: "transparent",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 3,
                    pointBorderWidth: 5,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                },
            ],
        },

        // Configuration options
        options: {
            tooltips: {
                intersect: false,
                backgroundColor: "#fbfbfb",
                titleFontColor: "#8F92A1",
                titleFontSize: 16,
                titleFontFamily: "Inter",
                titleFontStyle: "400",
                bodyFontFamily: "Inter",
                bodyFontColor: "#171717",
                bodyFontSize: 16,
                multiKeyBackground: "transparent",
                displayColors: false,
                xPadding: 30,
                yPadding: 15,
                borderColor: "rgba(143, 146, 161, .1)",
                borderWidth: 1,
                title: false,
            },

            title: {
                display: false,
            },

            layout: {
                padding: {
                    top: 0,
                },
            },

            legend: false,

            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawTicks: false,
                        drawBorder: false,
                    },
                    ticks: {
                        padding: 35,
                        max: 300,
                        min: 50,
                    },
                }, ],
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(143, 146, 161, .1)",
                        zeroLineColor: "rgba(143, 146, 161, .1)",
                    },
                    ticks: {
                        padding: 20,
                    },
                }, ],
            },
        },
    });
    // =========== chart three end

    // ================== chart four start
    const ctx4 = document.getElementById("Chart4").getContext("2d");
    const chart4 = new Chart(ctx4, {
        // The type of chart we want to create
        type: "bar", // also try bar or other graph types
        // The data for our dataset
        data: {
            labels: ["Jan", "Fab", "Mar", "Apr", "May", "Jun"],
            // Information about the dataset
            datasets: [{
                    label: "",
                    backgroundColor: "#4A6CF7",
                    barThickness: "flex",
                    maxBarThickness: 8,
                    data: [600, 700, 1000, 700, 650, 800],
                },
                {
                    label: "",
                    backgroundColor: "#d50100",
                    barThickness: "flex",
                    maxBarThickness: 8,
                    data: [690, 740, 720, 1120, 876, 900],
                },
            ],
        },
        // Configuration options
        options: {
            borderColor: "#F3F6F8",
            borderWidth: 15,
            backgroundColor: "#F3F6F8",
            tooltips: {
                callbacks: {
                    labelColor: function(tooltipItem, chart) {
                        return {
                            backgroundColor: "rgba(104, 110, 255, .0)",
                        };
                    },
                },
                backgroundColor: "#F3F6F8",
                titleFontColor: "#8F92A1",
                titleFontSize: 12,
                bodyFontColor: "#171717",
                bodyFontStyle: "bold",
                bodyFontSize: 16,
                multiKeyBackground: "transparent",
                displayColors: false,
                xPadding: 30,
                yPadding: 10,
                bodyAlign: "center",
                titleAlign: "center",
            },

            title: {
                display: false,
            },
            legend: {
                display: false,
            },

            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawTicks: false,
                        drawBorder: false,
                    },
                    ticks: {
                        padding: 35,
                        max: 1200,
                        min: 0,
                    },
                }, ],
                xAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                        color: "rgba(143, 146, 161, .1)",
                        zeroLineColor: "rgba(143, 146, 161, .1)",
                    },
                    ticks: {
                        padding: 20,
                    },
                }, ],
            },
        },
    });
    // =========== chart four end
    </script>
</body>

</html>