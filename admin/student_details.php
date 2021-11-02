<?php
$page = 'students';
$sub_page = 'view_students';
include 'header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_students_join_id($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            $img = $row->student_img;
            $admission = $row->	admintion_time;
            $name = $row->student_name;
            $phone = $row->student_phone;
            $email = $row->student_gmail;
            $course_icon = $row->course_category_icon;
            $course_name = $row->course_category_name;
            $feedback = $row->feedback;
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Student Details</h1>
    <p class="mb-4">Dashboard / Student / Details</p>
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Student Details</h6>
                <a href="view_students.php" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo "uploads/students/".$img; ?>" class="img-fluid" alt="">
                    <p class="text-primary mt-2">Admission : <?php echo date("M-d-Y h:i A",strtotime($admission)); ?></p>
                </div>
                <div class="col-md-7">
                    <h4><?php echo $name; ?></h4>
                    <hr>
                    <h6><i class="fa fa-phone-alt"></i>&nbsp; <?php echo $phone; ?></h6>
                    <hr>
                    <h6><i class="fa fa-envelope"></i>&nbsp; <?php echo $email; ?></h6>
                    <hr>
                    <h6><i class="<?php echo $course_icon;?>"></i>&nbsp; <?php echo $course_name; ?></h6>
                    <hr>
                    <h6><?php echo $feedback; ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>