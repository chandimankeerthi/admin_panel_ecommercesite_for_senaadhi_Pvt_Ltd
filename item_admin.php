<?php
    session_start();
    include "config.php";



if(isset($_REQUEST['delete'])){
    $id=$_REQUEST['delete'];
    $sql="DELETE FROM `products_new` WHERE id=$id";
    $conn->query($sql);

}


if(isset($_POST['update'])){
    $iden=$_REQUEST['iden'];
    $price=$_REQUEST['price'];
    $disco=$_REQUEST['disco'];
    $stat=$_REQUEST['stock'];
    if(isset($_REQUEST['trending'])){
        $trending=$_REQUEST['trending'];
    }
    else{
        $trending='NULL';
    }
    

    $sql="UPDATE `products_new` SET `listed_price_per_item`=$price,`discount`=$disco,`stock_status`='$stat',`trending`='$trending' WHERE id=$iden";
    $conn->query($sql);

}

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
    <style>
    .dtHorizontalExampleWrapper {
        max-width: 600px;
        margin: 0 auto;
    }

    #dtHorizontalExample th,
    td {
        white-space: nowrap;
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
    }
    </style>
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
                                <h2>Fashion Items</h2>
                                <a href="admin_add_item.php" class="main-btn primary-btn btn-hover btn-sm"
                                    style="background-color:#FFD333;"><i class="lni lni-plus mr-5"></i>Add Product
                                </a>
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
                                            Fashion Items
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




                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <h6 class="mb-10">Details Table</h6>
                            <div class="table-wrapper table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6>Product Name</h6>
                                            </th>

                                            <th>
                                                <h6>Main Category</h6>
                                            </th>

                                            <th>
                                                <h6>Sub Category 1</h6>
                                            </th>
                                            <th>
                                                <h6>Sub Category 2</h6>
                                            </th>
                                            <th>
                                                <h6>Image1</h6>
                                            </th>
                                            <th>
                                                <h6>Image2</h6>
                                            </th>
                                            <th>
                                                <h6>Details</h6>
                                            </th>
                                            <th>
                                                <h6>Quantity</h6>
                                            </th>
                                            <th>
                                                <h6>Size</h6>
                                            </th>
                                            <th>
                                                <h6>Listed Price per Item</h6>
                                            </th>
                                            <th>
                                                <h6>Discounted Price per Item</h6>
                                            </th>
                                            <th>
                                                <h6>Trending Product</h6>
                                            </th>
                                            <th>
                                                <h6>status</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        <!-- end table row -->
                                        <?php

                                
$query = "select * from products_new order by id asc";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)){
                                        ?><form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                                            <tr>
                                                <td>
                                                    <div class="Order-details">
                                                        <p><?php echo $row['product_name'] ?></p>
                                                    </div>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $row['main_category'] ?></p>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $row['sub_category_1'] ?></p>
                                                </td>
                                                <td class="min-width">
                                                    <span class="status-btn active-btn"><img
                                                            src="<?php echo $row['sub_category_2'] ?>"></span>
                                                </td>
                                                <td class="min-width">
                                                    <span class="status-btn active-btn"><img
                                                            src="<?php echo $row['image2'] ?>"></span>
                                                </td>
                                                <td class="min-width">
                                                    <span class="status-btn active-btn"><img
                                                            src="<?php echo $row['image3'] ?>"></span>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $row['product_description'] ?></p>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $row['quantity'] ?></p>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $row['size'] ?></p>
                                                </td>
                                                <td class="min-width">
                                                    Rs.<input type="number"
                                                        value="<?php echo $row['listed_price_per_item'] ?>"
                                                        name="price">

                                                </td>
                                                <td class="min-width">
                                                    Rs.<input type="number" value="<?php echo $row['discount'] ?>"
                                                        name="disco">
                                                </td>
                                                <td class="min-width">
                                                    <span class="status-btn active-btn"><input type="checkbox"
                                                            name="trending" value="T"
                                                            <?php if($row['trending']=="T"){echo "checked";} ?>></span>
                                                </td>
                                                <td class="min-width">
                                                    <span class="status-btn active-btn"><input type="text" name="stock"
                                                            maxlength="10" size="10"
                                                            value="<?php echo $row['stock_status'] ?> "></span>
                                                </td>
                                                <td class="min-width">
                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="iden">
                                                    <span class="status-btn active-btn"><input type="submit"
                                                            name="update" value="Update" class="btn btn-primary"></span>
                                                </td>
                                                <td>
                                                    <div class="action">
                                                        <a class="text-danger"
                                                            href="item_admin.php?delete=<?php echo $row['id']; ?>">
                                                            <i class="lni lni-trash-can"></i>
                                                        </a>
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
            </div>
            <!-- end card -->
            </div>
            <!-- end col -->
            </div>
            <!-- end row -->

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
    <script>
    $(document).ready(function() {
        $('#dtHorizontalExample').DataTable({
            "scrollX": true
        });
        $('.dataTables_length').addClass('bs-select');
    });
    </script>
</body>

</html>