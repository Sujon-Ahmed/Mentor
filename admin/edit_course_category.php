<?php
$page = "course_category";
$sub_page = "view_course_category";
include "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $details = $obj->get_course_id($id); 
    if($details->num_rows > 0){
        while($row = $details->fetch_object()){
            $id = $row->course_category_id;
            $icon = $row->course_category_icon;
            $name = $row->course_category_name;
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
        <h1 class="h3 mb-0 text-gray-800">Edit Course Features</h1>
        <p class="mb-4">Dashboard / Features / Edit</p>
    </div>
    <form action="edit_course_category_action.php" method="POST">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Why About</h6>
                            <a href="view_course_category.php" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="icon">Category Icon <small><a target="_blank" href="https://boxicons.com/"> Visit Site</a></small></label>
                        <input type="text" name="icon" value="<?php echo $icon; ?>" id="icon" class="form-control" placeholder="bx bx-icon_name">
                        <label for="name" class="mt-2">Category Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" id="name" class="form-control" placeholder="Enter category name">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Save Changes">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>