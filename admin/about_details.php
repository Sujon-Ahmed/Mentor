<?php
$page = "about";
$sub_page = "view_about";
include "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $details_about = $obj->get_about_details($id);
    if($details_about->num_rows > 0){
        while($row = $details_about->fetch_object()){
            $title = $row->about_title;
            $desc = $row->about_desc;
            $img = "uploads/about/".$row->about_image;
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">About Details</h1>
    <p class="mb-4">Dashboard / About / Details</p>
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">About Details</h6>
                <a href="view_about.php" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                   <img src="<?php echo $img; ?>" class="img-fluid" alt="">
                </div>
                <div class="col-md-8">
                    <h5 class="text-primary"><?php echo $title; ?></h5>
                    <p><?php echo $desc; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>