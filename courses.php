<?php 
include 'font-header.php'; 
// pagination code
$num_per_page = 03;
if(isset($_GET["page"])){
  $page = $_GET["page"];
}else{
  $page=1;
}
// echo $page;
$start_from = ($page-1)*03;
$total_course_pagination = $obj->pagination_with_course($start_from,$num_per_page);

?>
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
            if($total_course_pagination->num_rows > 0){
              while($row = $total_course_pagination->fetch_object()){
                ?>
                  <div class="col-md-4 mt-4 mt-md-4">
                    <div class="course-item shadow-sm">
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
                            // echo $row->course_desc;
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
          <!-- pagination start -->
            <nav aria-label="Page navigation example" class="mt-5">
              <?php
                $total_record = $obj->total_course();
                $total_page = ceil($total_record/$num_per_page);
              ?>
              <ul class="pagination justify-content-center">
              <?php
                if($page>1){
                  ?>
                    <li class="page-item">
                      <a class="page-link" href="courses.php?page=<?php echo $page-1;?>">Previous</a>
                    </li>
                  <?php
                }
                for($i=1;$i<$total_page;$i++){
                  ?>
                    <li class="page-item">
                      <a class="page-link" class="<?php if($i == $page){echo 'active';} ?>" href="courses.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                  <?php
                }
                if($i>$page){
                  ?>
                    <li class="page-item">
                      <a class="page-link" href="courses.php?page=<?php echo $page+1;?>">Next</a>
                    </li>
                  <?php
                }
              ?>
            </ul>
          </nav>
          <!-- pagination end -->
        </div>
      </div>
    </section><!-- End Courses Section -->
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
<?php include 'font-footer.php'; ?>