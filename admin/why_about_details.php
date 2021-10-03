<?php
$page = 'why_about';
$sub_page = 'view_why_about';
include 'header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_why_about($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            $title = $row->why_about_title;
            $desc = $row->why_about_desc;
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Single Banner Details</h1>
    <p class="mb-4">Dashboard / Banner / Details</p>
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Banner Details</h6>
                <a href="view_why_about.php" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="text-primary"><?php echo $title; ?></h5>
                    <p><?php echo $desc; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>