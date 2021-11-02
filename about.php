<?php include 'font-header.php'; ?>
<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>About Us</h2>
      <p>A mentor is a person or friend who guides a less experienced person by building trust and modeling positive behaviors.</p>
    </div>
  </div><!-- End Breadcrumbs -->
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
          <span data-purecounter-start="0" data-purecounter-end="<?php echo $get_total_events_number; ?>" data-purecounter-duration="1" class="purecounter"></span>
          <p>Events</p>
        </div>
        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="<?php echo $total_trainers; ?>" data-purecounter-duration="1" class="purecounter"></span>
          <p>Trainers</p>
        </div>
      </div>
    </div>
  </section><!-- End Counts Section -->
  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Testimonials</h2>
        <p>What are they saying</p>
      </div>

      <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
        <?php
          if ($feedback_result->num_rows > 0) {
            while ($row = $feedback_result->fetch_object()) {
              ?>
                <div class="swiper-slide">
                  <div class="testimonial-wrap">
                    <div class="testimonial-item">
                      <img src="<?php echo "admin/uploads/students/".$row->student_img; ?>" class="testimonial-img" alt="">
                      <h3><?php echo $row->student_name; ?></h3>
                      <h4><?php echo $row->course_category_name; ?></h4>
                      <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        <?php
                          if(empty($row->feedback)){
                            echo 'Nothing!';
                          }else{
                            echo $row->feedback;
                          }
                        ?>
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                      </p>
                    </div>
                  </div>
                </div>
              <?php
            }
          }
        ?>
          
          <!-- End testimonial item -->
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section><!-- End Testimonials Section -->
</main><!-- End #main -->
<!-- ======= Footer ======= -->
<?php include 'font-footer.php'; ?>