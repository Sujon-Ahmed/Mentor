<?php include 'font-header.php'; ?>
  <main id="main" data-aos="fade-in">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Courses</h2>
        <p>OURS POPULAR COURSES</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <?php
            if($get_total_courses->num_rows > 0){
              while($row = $get_total_courses->fetch_object()){
                ?>
                  <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-4">
                    <div class="course-item">
                      <img src="<?php echo "admin/uploads/courses/".$row->course_thumbnail; ?>" class="img-fluid" alt="">
                      <div class="course-content">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <h4><?php echo $row->course_category_name; ?></h4>
                          <p class="price">$<?php echo $row->course_fee; ?></p>
                        </div>

                        <h3><a href="course-details.html"><?php echo $row->course_title; ?></a></h3>
                        <p>
                          <?php
                            $description = $row->course_desc;
                            if(strlen($description) > 300){
                              echo substr($description,0,300).'...';
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
    </section><!-- End Courses Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<?php include 'font-footer.php'; ?>