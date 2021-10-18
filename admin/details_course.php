<?php
$page = 'courses';
$sub_page = 'view_courses';
include 'header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_course_info_id($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            $course_img = $row->course_thumbnail;
            $course_title = $row->course_title;
            $course_description = $row->course_desc;
            $trainer = $row->trainer_name;
            $category = $row->course_category_name;
            $fee = $row->course_fee;
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Course Details</h1>
    <p class="mb-4">Dashboard / Course / Details</p>
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Course Details</h6>
                <a href="view_courses.php" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo "uploads/courses/".$course_img; ?>" class="img-fluid" width="300px" alt="">
                    <h5 class="text-primary mt-2"><?php echo $course_title; ?></h5>
                    <hr class="">
                    <p><?php echo $course_description; ?></p>
                </div>
                <div class="col-md-6">
                    <h6><i class="fa fa-user"></i> Trainer Name : <?php echo $trainer; ?></h6>
                    <hr>
                    <h6><i class="fa fa-tag"></i> Course Category : <?php echo $category; ?></h6>
                    <hr>
                    <h6><i class="fa fa-dollar-sign"></i> Course Fee : <?php echo $fee; ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>