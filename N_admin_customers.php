<?php
include "config.php";

if(isset($_REQUEST['update'])){

    $userRole=$_REQUEST['userRole'];    
    $id=$_REQUEST['id'];
    
    $update="UPDATE `user_details` SET `userRole`='$userRole' WHERE id=$id";
    //echo $update;
    $conn->query($update);

    if ($conn->query($update)) {
        // Deletion was successful
        echo '<script>alert("Customer Details Successfully Updated ");</script>';
    } else {
        // Deletion failed
        echo '<script>alert("No Changes Passed");</script>';
    }
}


if(isset($_REQUEST['delete'])){
    $id=$_REQUEST['delete'];
    $sql="DELETE FROM `user_details` WHERE id=$id";
    $conn->query($sql);

    if ($conn->query($sql)) {
        // Deletion was successful
        echo '<script>alert("User Successfully Deleted ");</script>';
    } else {
        // Deletion failed
        echo '<script>alert("Failed to Delete User");</script>';
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
                                <h2>Users</h2>
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
                                                <h6>Customer ID</h6>
                                            </th>
                                            <th>
                                                <h6>Customer First Name</h6>
                                            </th>
                                            <th>
                                                <h6>Customer Last Name</h6>
                                            </th>
                                            <th>
                                                <h6>Customer Email</h6>
                                            </th>
                                            <th>
                                                <h6>Customer Contact Number</h6>
                                            </th>
                                            <th>
                                                <h6>Customer Address Line 1</h6>
                                            </th>
                                            <th>
                                                <h6>Customer Address Line 2</h6>
                                            </th>
                                            <th>
                                                <h6>Customer City</h6>
                                            </th>
                                            <th>
                                                <h6>Customer District</h6>
                                            </th>
                                            <th>
                                                <h6>Customer Country</h6>
                                            </th>
                                            <th>
                                                <h6>Customer Postal Code</h6>
                                            </th>
                                            <th>
                                                <h6>User Role</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        <?php

                                
$query = "select * from user_details order by id asc";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)){
                                        ?><form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                                            <tr>
                                                <td>

                                                    <div class="User-details">
                                                        <p><?php echo $row['id'] ?></p>
                                                        <input type="hidden" value="<?php echo $row['id']; ?>"
                                                            name="id">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="User-details">
                                                        <p><?php echo $row['customer_fname'] ?></p>
                                                    </div>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $row['customer_lname'] ?></p>
                                                </td>
                                                <td class="min-width">
                                                    <p><?php echo $row['email'] ?></p>
                                                </td>
                                                <td>
                                                    <div class="User-details">
                                                        <p><?php echo $row['contact_number'] ?></p>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="User-details">
                                                        <p><?php echo $row['residence1'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="User-details">
                                                        <p><?php echo $row['residence2'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="User-details">
                                                        <p><?php echo $row['city'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="User-details">
                                                        <p><?php echo $row['district'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="User-details">
                                                        <p><?php echo $row['country'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="User-details">
                                                        <p><?php echo $row['postal_code'] ?></p>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="userRole min-width">
                                                        <?php echo $row['userRole'] ?>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="userRole">

                                                            <option value="admin">admin</option>
                                                            <option value="non admin">non admin</option>
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