<?php 
include "font-header.php"; 
?>
  <!-- ======= Hero Section ======= -->
  <?php
    if($banner->num_rows > 0){
      while($banner_limit = $banner->fetch_object()){
        ?>
          <section id="hero" class="d-flex justify-content-center align-items-center">
            <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
              <h1><?php echo $banner_limit->banner_title; ?></h1>
              <h2><?php echo $banner_limit->banner_desc; ?></h2>
              <a href="courses.php" class="btn-get-started">Get Started</a>
            </div>
          </section>
        <?php
      }
    }
  ?>
  <!-- End Hero -->
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <?php
          if($about->num_rows > 0){
            while($about_details = $about->fetch_object()){
              ?>
                <div class="row">
                  <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                    <img src="<?php echo "admin/uploads/about/".$about_details->about_image; ?>" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3><?php echo $about_details->about_title; ?></h3>
                    <p class="fst-italic"><?php echo $about_details->about_desc; ?></p>
                  </div>
                </div>
              <?php
            }
          }
        ?>
      </div>
    </section><!-- End About Section -->
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">
        <div class="row counters">
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $total_student; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $total_course; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Courses</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $total_trainers; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Trainers</p>
          </div>
        </div>
      </div>
    </section><!-- End Counts Section -->
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <?php
              if($why_about->num_rows > 0){
                while($row = $why_about->fetch_object()){
                  ?>
                  <div class="content">
                    <h3><?php echo $row->why_about_title; ?></h3>
                    <p class="text-muted"><?php echo $row->why_about_desc; ?></p>
                    <div class="text-center">
                      <a href="about.php" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                    </div>
                  </div>
                  <?php
                }
              }
            ?>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <?php
                  if($course_features->num_rows > 0){
                    while($row = $course_features->fetch_object()){
                      ?>
                        <div class="col-xl-4 d-flex align-items-stretch">
                          <div class="icon-box mt-4 mt-xl-0">
                            <i class="<?php echo $row->course_features_icon; ?> bx-tada-hover"></i>
                            <h4><?php echo $row->course_features_title; ?></h4>
                            <p><?php echo $row->course_features_desc; ?></p>
                          </div>
                        </div>
                      <?php
                    }
                  }
                ?>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->
    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <?php
            if($get_course_category->num_rows > 0){
              while($row = $get_course_category->fetch_object()){
                ?>
                  <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box">
                      <i class="<?php echo $row->course_category_icon; ?>" style="color: #29cc61;"></i>
                      <h3><a href=""><?php echo $row->course_category_name; ?></a></h3>
                    </div>
                  </div>
                <?php
              }
            }
          ?>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Courses</h2>
          <p>Popular Courses</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <?php
            if($get_course_limit->num_rows > 0){
              while($row = $get_course_limit->fetch_object()){
                ?>
                  <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="course-item">
                      <img src="<?php echo "admin/uploads/courses/".$row->course_thumbnail; ?>" class="img-fluid" alt="">
                      <div class="course-content">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <h4><?php echo $row->course_category_name; ?></h4>
                          <p class="price">$<?php echo $row->course_fee; ?></p>
                        </div>

                        <h3><a href="course-details.php?id=<?php echo $row->course_id; ?>"><?php echo $row->course_title; ?></a></h3>
                        <p>
                          <?php
                            $description = $row->course_desc;
                            if(strlen($description) > 400){
                              echo substr($description,0,400).'...';
                            }else{
                              echo $description;
                            }
                          ?>
                        </p>
                        <div class="trainer d-flex justify-content-between align-items-center">
                          <div class="trainer-profile d-flex align-items-center">
                            <img src="<?php echo "admin/uploads/trainers/".$row->trainer_image; ?>" class="img-fluid" alt="">
                            <span><?php echo $row->trainer_name; ?></span>
                          </div>
                          <!-- <div class="trainer-rank d-flex align-items-center">
                            <i class="bx bx-user"></i>&nbsp;35
                            &nbsp;&nbsp;
                            <i class="bx bx-heart"></i>&nbsp;42
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
              }
            }
          ?>
          <!-- End Course Item-->
        </div>

      </div>
    </section><!-- End Popular Courses Section -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <?php
            if($get_trainers_with_limit->num_rows > 0){
              while($row = $get_trainers_with_limit->fetch_object()){
                ?>
                  <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                      <img src="<?php echo "admin/uploads/trainers/".$row->trainer_image; ?>" class="img-fluid" alt="">
                      <div class="member-content">
                        <h4><?php echo $row->trainer_name; ?></h4>
                        <span><?php echo $row->course_category_name; ?></span>
                        <p>
                          <?php echo $row->trainer_about; ?>
                        </p>
                        <div class="social">
                          <a href=""><i class="bi bi-twitter"></i></a>
                          <a href=""><i class="bi bi-facebook"></i></a>
                          <a href=""><i class="bi bi-instagram"></i></a>
                          <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
              }
            }
          ?>
        </div>
      </div>
    </section><!-- End Trainers Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<?php include "font-footer.php"; ?>