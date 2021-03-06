<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:login.php');
}
include "flash_data.php";
include "database.php";
$obj = new Database();
$get_admin_photo = $obj->profile_retrive_photo();
if($get_admin_photo->num_rows > 0){
    while($row = $get_admin_photo->fetch_object()){
        $photo = $row->admin_photo;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mentor Couching Management System">
    <meta name="author" content="Sujon Ahmed">
    <title>Admin Panel - Dashboard</title>
    <!-- Custom fonts for this template-->
    <link rel="shortcut icon" href="../admin/img/logo/logo.png" type="image/x-icon">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/sb-admin-2.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- toastr css file -->
    <link rel="stylesheet" href="css/toastr.css">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- summernote -->
    <link rel="stylesheet" href="summernote/summernote-bs4.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/toastr.min.js"></script>
    <!-- boxicon cdn link -->
    <link rel="stylesheet" href="boxicons/css/animations.css">
    <link rel="stylesheet" href="boxicons/css/boxicons.css">
    <link rel="stylesheet" href="boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="boxicons/css/transformations.css">
    <!-- style for parsley message -->
    <style>
        .parsley-errors-list li{
            color: red;
            display: block;
            width: 100%;
            padding-top: 5px;
        }
    </style>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fas fa-university"></i> -->
                    <img src="../admin/img/logo/logo.png" class="img-fluid" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">Mentor</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($page == "dashboard"){echo "active";} ?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - Banner section -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBanner"
                    aria-expanded="true" aria-controls="collapseBanner">
                    <i class="fas fa-fw fa-vr-cardboard"></i>
                    <span>Banner</span>
                </a>
                <div id="collapseBanner" class="collapse <?php if($page == "banner"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Banner</h6>
                        <a class="collapse-item <?php if($sub_page == "create_banner"){echo "active";} ?>" href="create_banner.php">Create</a>
                        <a class="collapse-item <?php if($sub_page == "view_banner"){echo "active";} ?>" href="view_banner.php">View</a>
                    </div>
                </div>
            </li>
             <!-- Nav Item - About Section -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbout"
                    aria-expanded="true" aria-controls="collapseAbout">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>About</span>
                </a>
                <div id="collapseAbout" class="collapse <?php if($page == "about"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage About</h6>
                        <a class="collapse-item <?php if($sub_page == "create_about"){echo "active";} ?>" href="create_about.php">Create</a>
                        <a class="collapse-item <?php if($sub_page == "view_about"){echo "active";} ?>" href="view_about.php">View</a>
                    </div>
                </div>
            </li>
             <!-- Nav Item - Why About-us -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWhyAbout"
                    aria-expanded="true" aria-controls="collapseWhyAbout">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Why_About</span>
                </a>
                <div id="collapseWhyAbout" class="collapse <?php if($page == "why_about"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Why About</h6>
                        <a class="collapse-item <?php if($sub_page == "create_why_about"){echo "active";} ?>" href="create_why_about.php">Create</a>
                        <a class="collapse-item <?php if($sub_page == "view_why_about"){echo "active";} ?>" href="view_why_about.php">View</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Features of Course -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFeaturesCourse"
                    aria-expanded="true" aria-controls="collapseFeaturesCourse">
                    <i class="fas fa-fw fa-award"></i>
                    <span>Course_Features</span>
                </a>
                <div id="collapseFeaturesCourse" class="collapse <?php if($page == "features"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Course Features</h6>
                        <a class="collapse-item <?php if($sub_page == "create_course_features"){echo "active";} ?>" href="create_course_features.php">Create</a>
                        <a class="collapse-item <?php if($sub_page == "view_course_features"){echo "active";} ?>" href="view_course_features.php">View</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Course Category -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourseCategory"
                    aria-expanded="true" aria-controls="collapseCourseCategory">
                    <i class="bx bx-category-alt"></i>
                    <span>Course_Category</span>
                </a>
                <div id="collapseCourseCategory" class="collapse <?php if($page == "course_category"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Course Category</h6>
                        <a class="collapse-item <?php if($sub_page == "create_course_category"){echo "active";} ?>" href="create_course_category.php">Create</a>
                        <a class="collapse-item <?php if($sub_page == "view_course_category"){echo "active";} ?>" href="view_course_category.php">View</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Manage Trainers -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTrainers"
                    aria-expanded="true" aria-controls="collapseTrainers">
                    <i class="fa fa-chalkboard-teacher"></i>
                    <span>Manage Trainers</span>
                </a>
                <div id="collapseTrainers" class="collapse <?php if($page == "trainers"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Trainers</h6>
                        <a class="collapse-item <?php if($sub_page == "add_trainer"){echo "active";} ?>" href="add_new_trainer.php">Add</a>
                        <a class="collapse-item <?php if($sub_page == "view_trainers"){echo "active";} ?>" href="view_trainers.php">View</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Manage Students -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudents"
                    aria-expanded="true" aria-controls="collapseStudents">
                    <i class="fa fa-user"></i>
                    <span>Manage Students</span>
                </a>
                <div id="collapseStudents" class="collapse <?php if($page == "students"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Students</h6>
                        <a class="collapse-item <?php if($sub_page == "view_students"){echo "active";} ?>" href="view_students.php">View</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Manage Courses -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourses"
                    aria-expanded="true" aria-controls="collapseCourses">
                    <i class="fa fa-book-open"></i>
                    <span>Manage Courses</span>
                </a>
                <div id="collapseCourses" class="collapse <?php if($page == "courses"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Courses</h6>
                        <a class="collapse-item <?php if($sub_page == "add_courses"){echo "active";} ?>" href="add_course.php">Create</a>
                        <a class="collapse-item <?php if($sub_page == "view_courses"){echo "active";} ?>" href="view_courses.php">View</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Manage Events -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvents"
                    aria-expanded="true" aria-controls="collapseEvents">
                    <i class="fa fa-calendar-check"></i>
                    <span>Manage Events</span>
                </a>
                <div id="collapseEvents" class="collapse <?php if($page == "events"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Events</h6>
                        <a class="collapse-item <?php if($sub_page == "add_events"){echo "active";} ?>" href="add_events.php">Create</a>
                        <a class="collapse-item <?php if($sub_page == "view_events"){echo "active";} ?>" href="view_events.php">View</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Manage Pricing -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePricing"
                    aria-expanded="true" aria-controls="collapsePricing">
                    <i class="fa fa-dollar-sign"></i>
                    <span>Manage Pricing</span>
                </a>
                <div id="collapsePricing" class="collapse <?php if($page == "pricing"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Pricing</h6>
                        <a class="collapse-item <?php if($sub_page == "create_pricing"){echo "active";} ?>" href="create_pricing.php">Create</a>
                        <a class="collapse-item <?php if($sub_page == "view_pricing"){echo "active";} ?>" href="view_pricing.php">View</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Manage Location -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLocation"
                    aria-expanded="true" aria-controls="collapseLocation">
                    <i class="fa fa-map-marker-alt"></i>
                    <span>Manage Location</span>
                </a>
                <div id="collapseLocation" class="collapse <?php if($page == "location"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Location</h6>
                        <a class="collapse-item <?php if($sub_page == "create_location"){echo "active";} ?>" href="create_location.php">Create</a>
                        <a class="collapse-item <?php if($sub_page == "view_location"){echo "active";} ?>" href="view_location.php">View</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Manage Contact Message -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContactMessage"
                    aria-expanded="true" aria-controls="collapseContactMessage">
                    <i class="fa fa-comments"></i>
                    <span>Manage Message</span>
                </a>
                <div id="collapseContactMessage" class="collapse <?php if($page == "message"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Message</h6>
                        <a class="collapse-item <?php if($sub_page == "view_message"){echo "active";} ?>" href="view_contact_message.php">View</a>
                    </div>
                </div>
            </li>
             <!-- Nav Item - Manage Subscriber -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubscriber"
                    aria-expanded="true" aria-controls="collapseSubscriber">
                    <i class="fa fa-bell"></i>
                    <span>Manage Subscriber</span>
                </a>
                <div id="collapseSubscriber" class="collapse <?php if($page == "subscriber"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Subscriber</h6>
                        <a class="collapse-item <?php if($sub_page == "view_subscriber"){echo "active";} ?>" href="view_all_subscriber.php">View</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>
                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler ?? 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun ?? 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez ?? 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog ?? 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name']; ?></span>
                                <?php
                                    if(!empty($photo)){
                                        ?>
                                            <img src="<?php echo "uploads/admin/".$photo; ?>" class="img-fluid img-profile rounded-circle" alt="">
                                        <?php
                                    }else{
                                        ?>
                                            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                        <?php
                                    }
                                ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="edit_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="change_password.php">
                                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" onclick="javascript:return confirm('Leave This Page?')" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->