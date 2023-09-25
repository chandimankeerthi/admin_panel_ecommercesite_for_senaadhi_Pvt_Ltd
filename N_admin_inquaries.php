<?php
include "config.php";

if(isset($_REQUEST['update'])){

    $status=$_REQUEST['status'];    
    $id=$_REQUEST['id'];
    
    $update="UPDATE `inqueries` SET `status`='$status' WHERE id=$id";
    //echo $update;
    $conn->query($update);
}


if(isset($_REQUEST['delete'])){
    $id=$_REQUEST['delete'];
    $sql="DELETE FROM `user_details` WHERE id=$id";
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
                                <h2>Customer Inqueries</h2>
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
                                            Users
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
                                                <h6>Inquary ID</h6>
                                            </th>
                                            <th>
                                                <h6>Customer First Name</h6>
                                            </th>
                                            <th>
                                                <h6>Customer Email</h6>
                                            </th>
                                            <th>
                                                <h6>Subject</h6>
                                            </th>
                                            <th>
                                                <h6>Details</h6>
                                            </th>
                                            <th>
                                                <h6>Status</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        <?php

                                
$query = "select * from inqueries order by id asc";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)){
                                        ?><form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                                            <tr>
                                                <td>

                                                    <div class="User-details">
                                                        <p><?php echo $row['id'] ?></p>
                                                        <input type="text" value="<?php echo $row['id']; ?>" name="id">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="User-details">
                                                        <p><?php echo $row['user_name'] ?></p>
                                                    </div>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $row['email'] ?></p>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $row['subject'] ?></p>
                                                </td>
                                                <td>
                                                    <div class="User-details">
                                                        <p><?php echo $row['details'] ?></p>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="status min-width">
                                                        <?php echo $row['status'] ?>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="status">
                                                            <option value="Pending">Pending</option>
                                                            <option value="Resolved">Resolved</option>
                                                        </select>
                                                    </div>
                                                </td>




                                                <td class="min-width">
                                                    <input type="submit" value="Update" name="update"
                                                        class="btn btn-primary">
                                                </td>

                                                <td>
                                                    <div class="action">
                                                        <a class="text-danger"
                                                            href="N_admin_customers.php?delete=<?php echo $row['id']; ?>">
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