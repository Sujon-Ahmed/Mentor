<?php
$page = "trainers";
$sub_page = "view_trainers";
include "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $details_about = $obj->get_trainers_details($id);
    if($details_about->num_rows > 0){
        while($row = $details_about->fetch_object()){
            $name = $row->trainer_name;
            $designation = $row->course_category_name;
            $about = $row->trainer_about;
            $img = $row->trainer_image;
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Trainer Details</h1>
    <p class="mb-4">Dashboard / Trainer / Details</p>
    
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Trainer Details</h6>
                <a href="view_trainers.php" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img src="<?php echo "uploads/trainers/".$img; ?>" class="img-fluid" alt="">
                                </div>
                                <div class="col mr-2">
                                <hr class="w-50">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $name; ?></div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 mt-2"><?php echo $designation; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                <p><?php echo $about; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>