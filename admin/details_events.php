<?php
$page = 'events';
$sub_page = 'view_events';
include 'header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_events_id($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            $img = $row->event_img;
            $title = $row->event_title;
            $desc = $row->event_desc;
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Events Details</h1>
    <p class="mb-4">Dashboard / Events / Details</p>
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Events Details</h6>
                <a href="view_events.php" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                   <img src="<?php echo "uploads/events/".$img; ?>" class="img-fluid" width="350px" alt="">
                </div>
                <div class="col-md-7">
                   <h4 class="text-primary"><?php echo $title; ?></h4>
                   <p><?php echo $desc; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>