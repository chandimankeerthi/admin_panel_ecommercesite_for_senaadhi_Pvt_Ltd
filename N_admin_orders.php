<?php
include "config.php";
if(isset($_REQUEST['update'])){

    $tracking_id=$_REQUEST['tracking_id'];
    $date_of_delivered=$_REQUEST['date_of_delivered'];
    $order_status=$_REQUEST['order_status'];
    $id=$_REQUEST['id'];
    
    $update="UPDATE `order_detail` SET `date_of_delivered`='$date_of_delivered',`order_status`='$order_status',`tracking_id`='$tracking_id' WHERE id=$id";
    //echo $update;
    $conn->query($update);

    if ($conn->query($update)) {
        // Deletion was successful
        echo '<script>alert("Order Details Successfully Updated ");</script>';
    } else {
        // Deletion failed
        echo '<script>alert("No Changes Passed");</script>';
    }
}


if(isset($_REQUEST['delete'])){
    $id=$_REQUEST['id'];
    $delete="DELETE FROM `order_detail` WHERE id='$id'";
    $conn->query($delete);

    if ($conn->query($delete)) {
        // Deletion was successful
        echo '<script>alert("Order Successfully Deleted ");</script>';
    } else {
        // Deletion failed
        echo '<script>alert("Failed to Delete Order");</script>';
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
                                <h2>Orders</h2>
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
                                            Orders
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
                                                <h6>Order ID</h6>
                                            </th>
                                            <th>
                                                <h6>Buyer Full Name</h6>
                                            </th>
                                            <th>
                                                <h6>Buyer Email</h6>
                                            </th>
                                            <th>
                                                <h6>Buyer Address</h6>
                                            </th>
                                            <th>
                                                <h6>Buyer Postal Code</h6>
                                            </th>
                                            <th>
                                                <h6>Buyer Contact Number</h6>
                                            </th>
                                            <th>
                                                <h6>Delevery Full Name</h6>
                                            </th>
                                            <th>
                                                <h6>Delevery Email</h6>
                                            </th>
                                            <th>
                                                <h6>Delevery Contact Number</h6>
                                            </th>
                                            <th>
                                                <h6>Delevery Address</h6>
                                            </th>
                                            <th>
                                                <h6>Delevery Postal Code</h6>
                                            </th>
                                            <th>
                                                <h6>Item ID</h6>
                                            </th>
                                            <th>
                                                <h6>Product Name</h6>
                                            </th>
                                            <th>
                                                <h6>Size</h6>
                                            </th>
                                            <th>
                                                <h6>Color</h6>
                                            </th>
                                            <th>
                                                <h6>Product Cost</h6>
                                            </th>
                                            <th>
                                                <h6>Total Price</h6>
                                            </th>
                                            <th>
                                                <h6>Date of Ordered</h6>
                                            </th>
                                            <th>
                                                <h6>Date of Delivered</h6>
                                            </th>
                                            <th>
                                                <h6>Tracking ID</h6>
                                            </th>
                                            <th>
                                                <h6>Status</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        <?php
$getORD="SELECT * FROM `order_detail` where 1";
$resultORD=$conn->query($getORD);
while($rowORD=$resultORD->fetch_array()){


?> <form>
                                            <tr>
                                                <td class="min-width">
                                                    <p><?php echo $rowORD['id']; ?></p>
                                                    <input type="hidden" value="<?php echo $rowORD['id']; ?>" name="id">
                                                </td>
                                                <td>
                                                    <div class="Order-details">
                                                        <p><?php echo $rowORD['buyer_fname']; ?>
                                                            <?php echo $rowORD['buyer_lname']; ?></p>
                                                    </div>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $rowORD['buyer_email']; ?></p>
                                                </td>
                                                <td class="min-width">
                                                    <p><a href="#0"><?php echo $rowORD['buyer_residence1']; ?>,<br><?php echo $rowORD['buyer_residence2']; ?>,<br>
                                                            <?php echo $rowORD['buyer_city']; ?>,<?php echo $rowORD['buyer_country']; ?></a>
                                                    </p>
                                                </td>
                                                <td class="min-width">
                                                    <span
                                                        class="status-btn active-btn"><?php echo $rowORD['buyer_postalcode']; ?></span>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $rowORD['buyer_contact']; ?></p>
                                                </td>
                                                <td class="min-width">
                                                    <p><a href="#0"><?php echo $rowORD['shipping_fname']; ?>
                                                            <?php echo $rowORD['shipping_lname']; ?></a></p>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $rowORD['shipping_email']; ?></p>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $rowORD['shipping_contact']; ?></p>
                                                </td>
                                                <td class="min-width">
                                                    <p><a href="#0"><?php echo $rowORD['shipping_residence1']; ?>,<br><?php echo $rowORD['shipping_residence2']; ?>,<br>
                                                            <?php echo $rowORD['shipping_city']; ?>,<?php echo $rowORD['shipping_country']; ?></a>
                                                    </p>
                                                </td>
                                                <td class="min-width">
                                                    <span
                                                        class="status-btn active-btn"><?php echo $rowORD['shipping_postalcode']; ?></span>
                                                </td>
                                                <td class="min-width">
                                                    <span
                                                        class="status-btn active-btn"><?php echo $rowORD['item_id']; ?></span>
                                                </td>

                                                <td class="min-width">
                                                    <span
                                                        class="status-btn active-btn"><?php echo $rowORD['product_name']; ?></span>
                                                </td>
                                                <td class="min-width">
                                                    <span
                                                        class="status-btn active-btn"><?php echo $rowORD['size']; ?></span>
                                                </td>
                                                <td class="min-width">
                                                    <span
                                                        class="status-btn active-btn"><?php echo $rowORD['color_family']; ?></span>
                                                </td>
                                                <td class="min-width">
                                                    <span
                                                        class="status-btn active-btn"><?php echo $rowORD['product_cost']; ?></span>
                                                </td>
                                                <td class="min-width">
                                                    <span
                                                        class="status-btn active-btn"><?php echo $rowORD['total_price']; ?></span>
                                                </td>

                                                <td class="min-width">
                                                    <p><?php echo $rowORD['timeSTMP']; ?></p>
                                                </td>
                                                <td class="min-width">
                                                    <input class="status-btn active-btn" type="date"
                                                        name="date_of_delivered"
                                                        value="<?php echo $rowORD['date_of_delivered']; ?>">
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $rowORD['tracking_id']; ?></p>
                                                    <input type="text" value="<?php echo $rowORD['tracking_id']; ?>"
                                                        name="tracking_id">
                                                </td>

                                                <td class="min-width">
                                                    <?php echo $rowORD['order_status']; ?>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="order_status">

                                                        <option value="New Order">New Order</option>
                                                        <option value="Order Confirmed">Order Confirmed</option>
                                                        <option value="Processing">Processing</option>
                                                        <option value="Out for Delevery">Out for Delevery</option>
                                                        <option value="Delevered">Delevered</option>
                                                    </select>
                                                </td>


                                                <td>
                                                    <!-- <input type="submit" value="Update" name="update"class="btn btn-success"> -->
                                                    <input type="submit" value="Update" name="update"
                                                        class="btn btn-primary">
                                                    <input type="submit" value="Delete Order" name="delete"
                                                        class="btn btn-danger">


                                                </td>

                                            </tr>
                                        </form>
                                        <!-- end table row -->
                                        <?php
}
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