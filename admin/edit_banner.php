<?php
$page = "banner";
$sub_page = "create_banner";
include "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $get_single_banner = $obj->get_single_banner($id);
    if($get_single_banner->num_rows > 0){
        while($row = $get_single_banner->fetch_object()){
            $id = $row->banner_id;
            $title = $row->banner_title;
            $image = $row->banner_img;
            $description = $row->banner_desc;
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
        <h1 class="h3 mb-0 text-gray-800">Edit Banner</h1>
        <p class="mb-4">Dashboard / Banner / Edit</p>
    </div>
    <form action="update_banner_action.php" method="POST" id="banner" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Banner</h6>
                            <a href="view_banner.php" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="title">Banner Title</label>
                        <input type="text" name="title" value="<?php echo $title; ?>" id="title" class="form-control" placeholder="Enter banner title...">
                        <div class="form-row mt-2">
                            <div class="form-group col-md-12">
                                <label for="banner-img" class="btn btn-primary mt-2"><i class="fas fa-upload"></i> Uploads Image</label>
                                <input type="file" name="file"  id="banner-img" class="file-control form-control" style="display: none;">
                                <input type="hidden" name="oldfile" value="<?php echo $image; ?>">
                            </div>
                            <div class="col-md-6 mt-1 mb-2" id="banner-img-prev">
                                <img src="<?php echo "uploads/banner/".$image; ?>" class="img-fluid" alt="">
                            </div>
                        </div>
                        <label for="description">Description</label>
                        <textarea name="description" id="desc" class="form-control" cols="30" rows="10"><?php echo $description; ?></textarea>
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Save Changes">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>