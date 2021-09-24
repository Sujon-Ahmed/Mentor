<?php
$page = "banner";
$sub_page = "view_banner";
include "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $get_single_banner = $obj->get_single_banner($id);
    if($get_single_banner->num_rows > 0){
        while($row = $get_single_banner->fetch_object()){
            $title = $row->banner_title;
            $image = $row->banner_img;
            $description = $row->banner_desc;
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
                <a href="view_banner.php" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo "uploads/banner/".$image; ?>" class="img-fluid" alt="">
                </div>
                <div class="col-md-8">
                    <h5 class="text-primary"><?php echo $title; ?></h5>
                    <p><?php echo $description; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>