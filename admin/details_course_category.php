<?php
$page = 'course_category';
$sub_page = 'view_course_category';
include 'header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_course_id($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            $id = $row->course_category_id;
            $icon = $row->course_category_icon;
            $name= $row->course_category_name;
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Course Category Details</h1>
    <p class="mb-4">Dashboard / Course Category / Details</p>
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Course Category Details</h6>
                <a href="view_course_category.php" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <i class="<?php echo $icon; ?> fa-3x"></i>
                </div>
                <div class="col-md-9">
                    <h5 class="text-primary"><?php echo $name; ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>