<?php include 'font-header.php'; ?>
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Pricing</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <?php
              if ($free->num_rows > 0) {
                while ($row = $free->fetch_object()) {
                  ?>
                    <div class="box">
                      <h3><?php echo $row->pricing_title; ?></h3>
                      <h4><sup>$</sup><?php echo $row->pricing_price; ?><span> / month</span></h4>
                      <ul>
                        <li><?php echo $row->pricing_desc; ?></li>
                      </ul>
                      <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                      </div>
                    </div>
                  <?php
                }
              }
            ?>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <?php 
              if ($business->num_rows > 0) {
                while ($row = $business->fetch_object()) {
                  ?>
                    <div class="box featured">
                      <h3><?php echo $row->pricing_title; ?></h3>
                      <h4><sup>$</sup><?php echo $row->pricing_price; ?><span> / month</span></h4>
                      <ul>
                        <li><?php echo $row->pricing_desc; ?></li>
                      </ul>
                      <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                      </div>
                    </div>
                  <?php
                }
              }
            ?>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <?php 
              if ($developer->num_rows > 0) {
                while ($row = $developer->fetch_object()) {
                  ?>
                    <div class="box">
                      <h3><?php echo $row->pricing_title; ?></h3>
                      <h4><sup>$</sup><?php echo $row->pricing_price; ?><span> / month</span></h4>
                      <ul>
                        <li><?php echo $row->pricing_desc; ?></li>
                      </ul>
                      <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                      </div>
                    </div>
                  <?php
                }
              }
            ?>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <?php
              if ($ultimate->num_rows > 0) {
                while ($row = $ultimate->fetch_object()) {
                  ?>
                    <div class="box">
                      <span class="advanced">Advanced</span>
                      <h3><?php echo $row->pricing_title; ?></h3>
                      <h4><sup>$</sup><?php echo $row->pricing_price; ?><span> / month</span></h4>
                      <ul>
                        <li><?php echo $row->pricing_desc; ?></li>
                      </ul>
                      <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                      </div>
                    </div>
                  <?php
                }
              }
            ?>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include 'font-footer.php'; ?>