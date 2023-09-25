<?php
    session_start();
    include "config.php";



if(isset($_REQUEST['delete'])){
    $id=$_REQUEST['delete'];
    $sql="DELETE FROM `product_details` WHERE id=$id";
    $conn->query($sql);

    if ($conn->query($sql)) {
        // Deletion was successful
        echo '<script>alert("Product Successfully Deleted ");</script>';
    } else {
        // Deletion failed
        echo '<script>alert("Failed to Delete Product");</script>';
    }

} 


if(isset($_POST['update'])){
    $iden=$_REQUEST['iden'];
    $price=$_REQUEST['price'];
    $disco=$_REQUEST['disco'];
    $quantity=$_REQUEST['quantity'];    
    if(isset($_REQUEST['trending'])){
        $trending=$_REQUEST['trending'];
    }
    else{
        $trending='NULL';
    }
    
    $sql="UPDATE `product_details` SET `productPrice`=$price,`discountpercentage`=$disco,`trending`='$trending',`productQuantity`=$quantity WHERE id=$iden";

    $conn->query($sql);

    if ($conn->query($sql)) {
        // Deletion was successful
        echo '<script>alert("Product Successfully Updated ");</script>';
    } else {
        // Deletion failed
        echo '<script>alert("No Changes Passed");</script>';
    }

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
                                <h2>Chairs</h2>
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
                                            Chairs
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
                                                <h6>Chair ID</h6>
                                            </th>
                                            <th>
                                                <h6>Main Category</h6>
                                            </th>
                                            <th>
                                                <h6>Chair Category</h6>
                                            </th>
                                            <th>
                                                <h6>Brand Name</h6>
                                            </th>
                                            <th>
                                                <h6>product Name</h6>
                                            </th>
                                            <th>
                                                <h6>Arm Type</h6>
                                            </th>
                                            <th>
                                                <h6>Color Family</h6>
                                            </th>
                                            <th>
                                                <h6>Back Height Type</h6>
                                            </th>
                                            <th>
                                                <h6>Deskchair Type</h6>
                                            </th>
                                            <th>
                                                <h6>Upholstory Type</h6>
                                            </th>
                                            <th>
                                                <h6>Adjustable Handle</h6>
                                            </th>
                                            <th>
                                                <h6>Warranty Type</h6>
                                            </th>
                                            <th>
                                                <h6>Warranty Period</h6>
                                            </th>
                                            <th>
                                                <h6>coreconstruction Type</h6>
                                            </th>
                                            <th>
                                                <h6>Pattern Type</h6>
                                            </th>
                                            <th>
                                                <h6>Linenfabric Type</h6>
                                            </th>
                                            <th>
                                                <h6>Feature Type</h6>
                                            </th>
                                            <th>
                                                <h6>Material Type</h6>
                                            </th>
                                            <th>
                                                <h6>Product Information</h6>
                                            </th>
                                            <th>
                                                <h6>Product Description</h6>
                                            </th>
                                            <th>
                                                <h6>Product Image 1</h6>
                                            </th>
                                            <th>
                                                <h6>Product Image 2</h6>
                                            </th>
                                            <th>
                                                <h6>Product Image 3</h6>
                                            </th>
                                            <th>
                                                <h6>Product Price</h6>
                                            </th>
                                            <th>
                                                <h6>Discount Percentage</h6>
                                            </th>
                                            <th>
                                                <h6>Product Quantity</h6>
                                            </th>
                                            <th>
                                                <h6>Trending Status</h6>
                                            </th>
                                            <th>
                                                <h6>Stock Status</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        <!-- end table row -->
                                        <?php

                                
$query = "select * from product_details where mainCat='Chair' order by id asc";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)){
                                        ?><form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                                            <tr>
                                                <td>
                                                    <div class="Chair-details">
                                                        <p><?php echo $row['id'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p><?php echo $row['mainCat'] ?></p>
                            </div>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['sub_categorey'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['brand'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['Productname'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['armtype'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['colorfamily'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['backheight'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['deskchairtype'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['upholsterytype'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['adjustablehandle'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['warrantytype'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['warrantyperiod'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['coreconstruction'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['patterntype'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['linenfabric'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['featuretype'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['materialtype'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['productInfo'] ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $row['productDes'] ?></p>
                            </td>
                            <td class="min-width">
                                <span class="status-btn active-btn"><img
                                        src="<?php echo $row['productImage1'] ?>"></span>
                            </td>
                            <td class="min-width">
                                <span class="status-btn active-btn"><img
                                        src="<?php echo $row['productImage2'] ?>"></span>
                            </td>
                            <td class="min-width">
                                <span class="status-btn active-btn"><img
                                        src="<?php echo $row['productImage3'] ?>"></span>
                            </td>
                            <td class="min-width">
                                Rs.<input type="number" value="<?php echo $row['productPrice'] ?>" name="price">
                            </td>
                            <td class="min-width">
                                <input type="number" value="<?php echo $row['discountpercentage'] ?>" name="disco">
                            </td>
                            <td class="min-width">
                                <input type="number" value="<?php echo $row['productQuantity'] ?>" name="quantity">
                            </td>
                            <td class="min-width">
                                <span class="status-btn active-btn"><input type="checkbox" name="trending" value="T"
                                        <?php if($row['trending']=="T"){echo "checked";} ?>></span>
                            </td>

                            <td class="min-width">

                                <h2>
                                    <p class="mb-2"
                                        style="color: <?php echo $row["productQuantity"] != '0' ? 'green' : 'red'; ?>">
                                        <?php echo $row["productQuantity"] != '0' ? 'In Stock' : 'Out of Stock'; ?>
                                    </p>
                                </h2>

                            </td>

                            <td class="min-width">
                                <input type="hidden" value="<?php echo $row['id']; ?>" name="iden">
                                <span class="status-btn active-btn"><input type="submit" name="update" value="Update"
                                        class="btn btn-primary"></span>
                            </td>

                            <td>
                                <div class="action">
                                    <a class="text-danger"
                                        href="N_admin_view_chair.php?delete=<?php echo $row['id']; ?>">
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