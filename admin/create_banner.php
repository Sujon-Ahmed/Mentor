<?php
$page = "banner";
$sub_page = "create_banner";
include "header.php";
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
        <h1 class="h3 mb-0 text-gray-800">Create Banner</h1>
        <p class="mb-4">Dashboard / Banner / Create</p>
    </div>
    <form action="create_banner_action.php" method="POST" id="banner" enctype="multipart/form-data" data-parsley-validate>
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Banner</h6>
                    </div>
                    <div class="card-body">
                        <label for="title">Banner Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter banner title..." required>
                        <div class="form-row mt-2">
                            <div class="form-group col-md-12">
                                <label for="banner-img" class="btn btn-primary mt-2"><i class="fas fa-upload"></i> Uploads Image</label>
                                <input type="file" name="file" id="banner-img" class="file-control form-control" style="display: none;">
                            </div>
                            <div class="col-md-6 mt-3" id="banner-img-prev"></div>
                        </div>
                        <label for="description">Description</label>
                        <textarea name="description" id="desc" class="form-control" cols="30" rows="10"></textarea>
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Save Changes">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>