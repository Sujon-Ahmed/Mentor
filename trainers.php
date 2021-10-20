<?php include 'font-header.php'; ?>

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Trainers</h2>
        <p>Ours Special Trainers</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <?php
            if($get_all_trainers->num_rows > 0){
              while($row = $get_all_trainers->fetch_object()){
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
<?php include 'font-footer.php'; ?>