<?php
$page = "events";
$sub_page = "add_events";
include "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_events_id($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            $id = $row->event_id;
            $img = $row->event_img;
            $title = $row->event_title;
            $desc = $row->event_desc;
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid mb-5">
    <!-- toastr success message -->
    <?php
        if(isset($_SESSION['msg']['success'])){
            ?>
                <script>
                    toastr.success("<?php echo Flash_data::show_error(); ?>");
                </script>
            <?php
        }
    ?>
    <!-- toastr error message -->
    <?php
        if(isset($_SESSION['msg']['error'])){
            ?>
                <script>
                    toastr.error("<?php echo Flash_data::show_error(); ?>");
                </script>
            <?php
        }
    ?>
    <!-- Page Heading -->
    <div class=" mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Events</h1>
        <p class="mb-4">Dashboard / Course / Events</p>
    </div>
    <form action="edit_events_action.php" method="POST" id="events" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Events</h6>
                    </div>
                    <div class="card-body">
                        <!-- course_title -->
                        <label for="events_title">Events Title</label>
                        <input type="text" name="events_title" value="<?php echo $title; ?>" id="events_title" class="form-control" placeholder="Enter events title here..." required>
                        <!-- course image -->
                        <div class="form-row mt-3">
                            <div class="form-group col-md-12">
                                <label for="events-img" class="btn btn-primary mt-2"><i class="fas fa-upload"></i> Uploads Image</label>
                                <input type="file" name="file" id="events-img" class="file-control form-control" style="display: none;">
                                <input type="hidden" name="oldfile" value="<?php echo $img; ?>">
                            </div>
                            <div class="col-md-6 mt-3" id="events-img-prev">
                                <img src="<?php echo "uploads/events/".$img; ?>" class="img-fluid" alt="">
                            </div>
                        </div>
                        <!-- course desc -->
                        <label for="description">Description</label>
                        <textarea name="description" id="desc" class="form-control" cols="30" rows="10"><?php echo $desc; ?></textarea>
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Save Changes">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>