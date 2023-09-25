<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Admin Profile</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>


    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== navbars start ========== -->
        <?php
        include "navbars.php";
        ?>
        <!-- ========== navbars end ========== -->
        <!-- ========== header start ========== -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                        <div class="header-left d-flex align-items-center">
                            <div class="menu-toggle-btn mr-20">
                                <button id="menu-toggle" class="main-btn primary-btn btn-hover"
                                    style="background-color: #FFD333; color: black;">
                                    <i class="lni lni-chevron-left me-2"></i><b>Menu</b>
                                </button>
                            </div>
                            <div class="header-search d-none d-md-flex">
                                <form action="#">
                                    <input type="text" placeholder="Search..." />
                                    <button><i class="lni lni-search-alt"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <!-- notification start -->
                            <div class="notification-box ml-15 d-none d-md-flex">
                                <button class="dropdown-toggle" type="button" id="notification"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="lni lni-alarm"></i>
                                    <span>2</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notification">
                                    <li>
                                        <a href="#0">
                                            <div class="image">
                                                <img src="assets/images/lead/lead-6.png" alt="" />
                                            </div>
                                            <div class="content">
                                                <h6>
                                                    John Doe
                                                    <span class="text-regular">
                                                        comment on a product.
                                                    </span>
                                                </h6>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consect etur adipiscing
                                                    elit Vivamus tortor.
                                                </p>
                                                <span>10 mins ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0">
                                            <div class="image">
                                                <img src="assets/images/lead/lead-1.png" alt="" />
                                            </div>
                                            <div class="content">
                                                <h6>
                                                    Jonathon
                                                    <span class="text-regular">
                                                        like on a product.
                                                    </span>
                                                </h6>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consect etur adipiscing
                                                    elit Vivamus tortor.
                                                </p>
                                                <span>10 mins ago</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- notification end -->
                            <!-- message start -->
                            <div class="header-message-box ml-15 d-none d-md-flex">
                                <button class="dropdown-toggle" type="button" id="message" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="lni lni-envelope"></i>
                                    <span>3</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="message">
                                    <li>
                                        <a href="#0">
                                            <div class="image">
                                                <img src="assets/images/lead/lead-5.png" alt="" />
                                            </div>
                                            <div class="content">
                                                <h6>Jacob Jones</h6>
                                                <p>Hey!I can across your profile and ...</p>
                                                <span>10 mins ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0">
                                            <div class="image">
                                                <img src="assets/images/lead/lead-3.png" alt="" />
                                            </div>
                                            <div class="content">
                                                <h6>John Doe</h6>
                                                <p>Would you mind please checking out</p>
                                                <span>12 mins ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0">
                                            <div class="image">
                                                <img src="assets/images/lead/lead-2.png" alt="" />
                                            </div>
                                            <div class="content">
                                                <h6>Anee Lee</h6>
                                                <p>Hey! are you available for freelance?</p>
                                                <span>1h ago</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- message end -->
                            <!-- filter start -->
                            <div class="filter-box ml-15 d-none d-md-flex">
                                <button class="" type="button" id="filter">
                                    <i class="lni lni-funnel"></i>
                                </button>
                            </div>
                            <!-- filter end -->
                            <!-- profile start -->
                            <div class="profile-box ml-15">
                                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-info">
                                        <div class="info">
                                            <h6>Chandiman Keerthi</h6>
                                            <div class="image">
                                                <img src="assets/images/profile/profile-image.png" alt="" />
                                                <span class="status"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <i class="lni lni-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                        <a href="admin_profile.html">
                                            <i class="lni lni-user"></i> View Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0">
                                            <i class="lni lni-alarm"></i> Notifications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0"> <i class="lni lni-inbox"></i> Messages </a>
                                    </li>
                                    <li>
                                        <a href="#0"> <i class="lni lni-cog"></i> Settings </a>
                                    </li>
                                    <li>
                                        <a href="#0"> <i class="lni lni-exit"></i> Sign Out </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- profile end -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="titlemb-30">
                                <h2>Admin Profile</h2>
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
                                        <li class="breadcrumb-item"><a href="#0">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Admin profile
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

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-style settings-card-1 mb-30">
                            <div class="
                    title
                    mb-30
                    d-flex
                    justify-content-between
                    align-items-center
                  ">
                                <h6>My Profile</h6>
                                <button class="border-0 bg-transparent">
                                    <i class="lni lni-pencil-alt"></i>
                                </button>
                            </div>
                            <div class="profile-info">
                                <div class="d-flex align-items-center mb-30">
                                    <div class="profile-image">
                                        <img src="assets/images/profile/profile-1.png" alt="" />
                                        <div class="update-image">
                                            <input type="file" />
                                            <label for=""><i class="lni lni-cloud-upload"></i></label>
                                        </div>
                                    </div>
                                    <div class="profile-meta">
                                        <h5 class="text-bold text-dark mb-10">Chandiman Keerthi</h5>
                                        <p class="text-sm text-gray"></p>
                                    </div>
                                </div>
                                <div class="input-style-1">
                                    <label>Email</label>
                                    <input type="email" placeholder="admin@example.com" value="admin@example.com" />
                                </div>
                                <div class="input-style-1">
                                    <label>Password</label>
                                    <input type="password" value="admin@example.com" />
                                </div>
                                <div class="input-style-1">
                                    <label>Website</label>
                                    <input type="text" placeholder="www.uideck.com" value="www.senaadhi.com" />
                                </div>
                                <div class="input-style-1">
                                    <label>Bio</label>
                                    <textarea placeholder="Write your bio here" rows="4">
Admin profile</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card-style settings-card-2 mb-30">
                            <div class="title mb-30">
                                <h6>My Profile</h6>
                            </div>
                            <form action="#">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Full Name</label>
                                            <input type="text" placeholder="Full Name" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Email</label>
                                            <input type="email" placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Company</label>
                                            <input type="text" placeholder="Company" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Address</label>
                                            <input type="text" placeholder="Address" />
                                        </div>
                                    </div>
                                    <div class="col-xxl-4">
                                        <div class="input-style-1">
                                            <label>City</label>
                                            <input type="text" placeholder="City" />
                                        </div>
                                    </div>
                                    <div class="col-xxl-4">
                                        <div class="input-style-1">
                                            <label>Zip Code</label>
                                            <input type="text" placeholder="Zip Code" />
                                        </div>
                                    </div>
                                    <div class="col-xxl-4">
                                        <div class="select-style-1">
                                            <label>Country</label>
                                            <div class="select-position">
                                                <select class="light-bg">
                                                    <option value="">Select category</option>
                                                    <option value="">USA</option>
                                                    <option value="">UK</option>
                                                    <option value="">Canada</option>
                                                    <option value="">India</option>
                                                    <option value="">Bangladesh</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>About Me</label>
                                            <textarea placeholder="Type here" rows="6"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="main-btn primary-btn btn-hover">
                                            Update Profile
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

        <!-- ========== footer start =========== -->

        <!-- ========== footer end =========== -->
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