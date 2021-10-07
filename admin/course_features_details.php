<?php
$page = 'features';
$sub_page = 'view_course_features';
include 'header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_course_features_withID($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            $icon = $row->course_features_icon;
            $title = $row->course_features_title;
            $desc= $row->course_features_desc;
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Features Details</h1>
    <p class="mb-4">Dashboard / Features / Details</p>
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Features Details</h6>
                <a href="view_course_features.php" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <i class="<?php echo $icon; ?> fa-3x"></i>
                </div>
                <div class="col-md-9">
                    <h5 class="text-primary"><?php echo $title; ?></h5>
                    <p><?php echo $desc; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>