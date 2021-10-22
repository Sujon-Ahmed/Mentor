<?php
session_start();
include "admin/database.php";
$obj = new Database();
$profile_retrive = $obj->profile_retrive_photo();
if($profile_retrive->num_rows > 0){
  while($row = $profile_retrive->fetch_object()){
    $email = $row->admin_email;
    $phone = $row->admin_phone;
  }
}
$banner = $obj->get_limit_banner();
$about = $obj->get_limit_about();
$why_about = $obj->get_limit_why_about();
$course_features = $obj->features_limit();
$get_course_category = $obj->get_course_category();
$get_trainers_with_limit = $obj->get_trainers_limit();
$get_all_trainers = $obj->get_all_trainers();
$total_trainers = $obj->get_trainers_number();
$get_course_limit = $obj->get_course_limit();
$get_total_courses = $obj->get_total_courses();
// $get_course_with_id = $obj->get_course_id();
$total_course = $obj->total_course();
$total_student = $obj->total_student();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Mentor</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Mentor - v4.3.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.php">Mentor</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a href="trainers.php">Trainers</a></li>
          <li><a href="events.php">Events</a></li>
          <li><a href="pricing.php">Pricing</a></li>
          <li class="dropdown"><a href="#"><span>Pages</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Page 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="register.php" class="get-started-btn">Get Started</a>
    </div>
  </header><!-- End Header -->