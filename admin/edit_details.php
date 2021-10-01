<?php
$page = "about";
$sub_page = "create_about";
include "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $details_about = $obj->get_about_details($id);
    if($details_about->num_rows > 0){
        while($row = $details_about->fetch_object()){
            $title = $row->about_title;
            $desc = $row->about_desc;
            $img = $row->about_image;
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
        <h1 class="h3 mb-0 text-gray-800">Edit About</h1>
        <p class="mb-4">Dashboard / About / Edit</p>
    </div>
    <form action="update_about_action.php" method="POST" id="about" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Edit About</h6>
                            <a href="view_about.php" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="title">About Title</label>
                        <input type="text" name="title" value="<?php echo $title; ?>" id="title" class="form-control" placeholder="Enter about title...">
                        <div class="form-row mt-2">
                            <div class="form-group col-md-12">
                                <label for="about-img" class="btn btn-primary mt-2"><i class="fas fa-upload"></i> Uploads Image</label>
                                <input type="file" name="file" id="about-img" class="file-control form-control" style="display: none;">
                                <input type="hidden" name="oldfile" value="<?php echo $img; ?>">
                            </div>
                            <div class="col-md-6 mt-3" id="about-img-prev">
                                <img src="<?php echo 'uploads/about/'.$img; ?>" class="img-fluid" alt="">
                            </div>
                        </div>
                        <label for="description">Description</label>
                        <textarea name="description" id="desc" class="form-control" cols="30" rows="10"><?php echo $desc; ?></textarea>
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Save Changes">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>