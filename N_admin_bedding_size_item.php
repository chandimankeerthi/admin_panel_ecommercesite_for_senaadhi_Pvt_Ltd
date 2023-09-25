<?php
    session_start();
    include "config.php";



if(isset($_REQUEST['delete'])){
    $id=$_REQUEST['delete'];
    $sql="DELETE FROM `furniture_bedding_size` WHERE id=$id";    

    if ($conn->query($sql)) {
        // Deletion was successful
        echo '<script>alert("Details Successfully Deleted ");</script>';
    } else {
        // Deletion failed
        echo '<script>alert("Failed to Delete Details");</script>';
    }


} 


if(isset($_POST['update'])){
    $iden=$_REQUEST['iden'];    
    $bed_size=$_REQUEST['bed_size'];  
     
    $sql="UPDATE `furniture_bedding_size` SET `bed_size`='$bed_size' WHERE id=$iden";


    if ($conn->query($sql)) {
        // Deletion was successful
        echo '<script>alert("Details Successfully Updated ");</script>';
    } else {
        // Deletion failed
        echo '<script>alert("No Changes Passed");</script>';
    }

}

if(isset($_REQUEST['AddDetails'])){    
    
    
    $add_cate=$_REQUEST['add_cate'];
    $sqlAddCat="INSERT INTO `furniture_bedding_size`(`bed_size`) VALUES ('$add_cate')";
    
    if ($conn->query($sqlAddCat)) {
        // Deletion was successful
        echo '<script>alert("Details Successfully Added ");</script>';
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
                                <h2>Bedding Size</h2>
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
                                            Bedding Size
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

                            <br>
                            <h6>Add New Details</h6></br>
                            <form class="row g-3">

                                <div class="col-md-4">
                                    <label for="inputCname" class="form-label"></label>
                                    <input type="text" class="form-control" id="inputProductName" required
                                        name="add_cate">
                                </div>
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary" value="Add Details" name="AddDetails">
                                </div>
                            </form><br>

                            <h6 class="mb-10">Details Table</h6>
                            <div class="table-wrapper table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6>ID</h6>
                                            </th>
                                            <th>
                                                <h6>Size Category</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        <!-- end table row -->
                                        <?php

                                
$query = "select * from furniture_bedding_size order by id asc";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)){
                                        ?><form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                                            <tr>
                                                <td>
                                                    <div class="Shirt Cate-details">
                                                        <p><?php echo $row['id'] ?></p>
                                                    </div>
                                                </td>

                                                <td class="min-width">
                                                    <input type="text" value="<?php echo $row['bed_size'] ?>"
                                                        name="bed_size">
                                                </td>
                                                <td class="min-width">
                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="iden">
                                                    <span class="status-btn active-btn"><input type="submit"
                                                            name="update" value="Update" class="btn btn-primary"></span>
                                                </td>

                                                <td>
                                                    <div class="action">
                                                        <a class="text-danger"
                                                            href="N_admin_bedding_size_item.php?delete=<?php echo $row['id']; ?>">
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