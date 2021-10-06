<?php
$page = "why_about";
$sub_page = "view_why_about";
include "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_why_about($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            $id = $row->why_about_id;
            $title = $row->why_about_title;
            $desc = $row->why_about_desc;
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
        <h1 class="h3 mb-0 text-gray-800">Edit Why About</h1>
        <p class="mb-4">Dashboard / Why_About / Edit</p>
    </div>
    <form action="edit_why_about_action.php" method="POST">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Why About</h6>
                            <a href="view_why_about.php" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="title">Why About Title</label>
                        <input type="text" name="title" value="<?php echo $title; ?>" id="title" class="form-control" placeholder="Enter why about us title...">
                        <label for="description">Description</label>
                        <textarea name="description" id="desc" class="form-control" cols="30" rows="10"><?php echo $desc; ?></textarea>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Save Changes">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>