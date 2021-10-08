<?php
$page = "course_category";
$sub_page = "create_course_category";
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
        <h1 class="h3 mb-0 text-gray-800">Create Course Features</h1>
        <p class="mb-4">Dashboard / Features / Create</p>
    </div>
    <form action="create_course_category_action.php" method="POST">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Create Why About</h6>
                            <a href="view_course_category.php" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="icon">Category Icon <small><a target="_blank" href="https://boxicons.com/"> Visit Site</a></small></label>
                        <input type="text" name="icon" id="icon" class="form-control" placeholder="bx bx-icon_name">
                        <label for="name" class="mt-2">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name">
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Save Changes">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>