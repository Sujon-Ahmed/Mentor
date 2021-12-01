<?php
include 'font-header.php';
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $get_course_with_id = $obj->get_single_course_details($id);
  if($get_course_with_id->num_rows > 0){
    while($row = $get_course_with_id->fetch_object()){
      $image = $row->course_thumbnail;
      $title = $row->course_title;
      $desc = $row->course_desc;
      $trainer = $row->trainer_name;
      $fee = $row->course_fee;
      $category = $row->course_category_name;
    }
  }
}
?>
<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Course Details</h2>
      <p>In this course you will learn a lot of thing.</p>
    </div>
  </div><!-- End Breadcrumbs -->
  <!-- ======= Course Details Section ======= -->
  <section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-8">
          <img src="<?php echo "admin/uploads/courses/".$image; ?>" class="img-fluid" alt="">
          <h3><?php echo $title; ?></h3>
          <p><?php echo $desc; ?></p>
        </div>
        <div class="col-lg-4">
          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Trainer</h5>
            <p><a href="#"><?php echo $trainer; ?></a></p>
          </div>
          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Course Fee</h5>
            <p>$<?php echo $fee; ?></p>
          </div>
          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Course Category</h5>
            <p><?php echo $category; ?></p>
          </div>
          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Schedule</h5>
            <p>5.00 pm - 7.00 pm</p>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Course Details Section -->
  <!-- ======= Course Details Comments Section ======= -->
  <section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-8">
          <h3>Comments</h3>
          <div>
            <div class="fb-comments" data-href="https://developers.facebook.com/localhost/mentor/course-details.php?id=<?php echo $_GET['id']; ?>" data-width="100%" data-numposts="5"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Course Details Comments Section -->
</main><!-- End #main -->
<!-- ======= Footer ======= -->
<?php include 'font-footer.php'; ?>