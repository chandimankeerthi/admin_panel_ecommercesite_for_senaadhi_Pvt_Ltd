<?php
include "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Tables</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
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

        <!-- ========== table components start ========== -->
        <section class="table-components">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h2>Inventories</h2>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper mb-30">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#0">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Inventories
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

                <!-- ========== tables-wrapper start ========== -->


                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="lni lni-credit-cards"></i>
                        </div>
                        <div class="content">
                            <?php
            $getInStockCountSql = "SELECT COUNT(*) AS out_stock_count FROM product_details WHERE productQuantity = 0";
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


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <h6 class="mb-10">Out of Stock Product Table</h6>
                            <div class="table-wrapper table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6>Product ID</h6>
                                            </th>
                                            <th>
                                                <h6>Product Name</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        <?php

                                
$query = "select * from product_details WHERE productQuantity = 0 order by id asc";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)){
                                        ?><form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                                            <tr>
                                                <td>

                                                    <div class="inventory-details">
                                                        <p><?php echo $row['id'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="inventory-details">
                                                        <p><?php echo $row['Productname'] ?></p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- end table row -->
                                        </form>
                                        <?php
                                    }}
                                    ?>
                                    </tbody>
                                </table>
                                <!-- end table -->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <h6 class="mb-10">Instock Product Table</h6>
                            <div class="table-wrapper table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6>Product ID</h6>
                                            </th>
                                            <th>
                                                <h6>Product Name</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        <?php

                                
$query = "select * from product_details WHERE productQuantity > 0 order by id asc";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)){
                                        ?><form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                                            <tr>
                                                <td>

                                                    <div class="inventory-details">
                                                        <p><?php echo $row['id'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="inventory-details">
                                                        <p><?php echo $row['Productname'] ?></p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- end table row -->
                                        </form>
                                        <?php
                                    }}
                                    ?>
                                    </tbody>
                                </table>
                                <!-- end table -->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== tables-wrapper end ========== -->

        </section>
        <!-- ========== table components end ========== -->


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
</body>

</html>