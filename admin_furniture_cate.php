<?php
include "config.php";
session_start();
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
                                <h2>Customers</h2>
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
                                            Customers
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
                                                <h6>ID</h6>
                                            </th>
                                            <th>
                                                <h6>image</h6>
                                            </th>
                                            <th>
                                                <h6>Name</h6>
                                            </th>
                                            <th>
                                                <h6>Email</h6>
                                            </th>
                                            <th>
                                                <h6>Phone</h6>
                                            </th>
                                            <th>
                                                <h6>Residence</h6>
                                            </th>
                                            <th>
                                                <h6>Status</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="customers-details">
                                                    <p>001</p>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="assets/images/lead/lead-1.png" alt="" />
                                            </td>
                                            <td class="min-width">
                                                <p>chandiman keerthi</p>
                                            </td>
                                            <td class="min-width">
                                                <p><a href="#0">chandiman@gmail.com</a></p>
                                            </td>
                                            <td class="min-width">
                                                <span class="status-btn active-btn">07212345678</span>
                                            </td>
                                            <td class="min-width">
                                                <p>Kegalle</p>
                                            </td>
                                            <td class="min-width">
                                                <span class="status-btn active-btn">Active</span>
                                            </td>
                                            <td>
                                                <div class="action">
                                                    <button class="text-danger">
                                                        <i class="lni lni-trash-can"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end table row -->
                                        <tr>
                                            <td>
                                                <div class="customers-details">
                                                    <p>001</p>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="assets/images/lead/lead-1.png" alt="" />
                                            </td>
                                            <td class="min-width">
                                                <p>supun sandaruwan</p>
                                            </td>
                                            <td class="min-width">
                                                <p><a href="#0">supun123@gmail.com</a></p>
                                            </td>
                                            <td class="min-width">
                                                <span class="status-btn active-btn">07212345678</span>
                                            </td>
                                            <td class="min-width">
                                                <p>Kegalle</p>
                                            </td>
                                            <td class="min-width">
                                                <span class="status-btn active-btn">Active</span>
                                            </td>
                                            <td>
                                                <div class="action">
                                                    <button class="text-danger">
                                                        <i class="lni lni-trash-can"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end table row -->

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