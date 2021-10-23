<?php include 'font-header.php'; ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Events</h2>
        <p>Our's Specials Events</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <?php
            if($total_events->num_rows > 0){
              while($row = $total_events->fetch_object()){
                ?>
                  <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card">
                      <div class="card-img">
                        <img src="<?php echo "admin/uploads/events/".$row->event_img; ?>" class="img-fluid" style="height: 300px; width:100%;" alt="...">
                      </div>
                      <div class="card-body">
                        <h5 class="card-title"><a href=""><?php echo $row->event_title; ?></a></h5>
                        <p class="fst-italic text-center"><?php echo date('D F j, Y, g:i a',strtotime($row->event_time)); ?></p>
                        <p class="card-text"><?php echo $row->event_desc; ?></p>
                      </div>
                    </div>
                  </div>
                <?php
              }
            }
          ?>
        </div>

      </div>
    </section><!-- End Events Section -->

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include 'font-footer.php'; ?>