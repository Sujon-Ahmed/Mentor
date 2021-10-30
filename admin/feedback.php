<?php
$page = "students";
$sub_page = "view_students";
include "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
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
        <h1 class="h3 mb-0 text-gray-800">Write Feedback</h1>
        <p class="mb-4">Dashboard / Student / Feedback</p>
    </div>
    <form action="feedback_action.php" method="POST">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Write Feedback</h6>
                            <a href="view_students.php" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- feedback -->
                        <label for="description">Feedback</label>
                        <textarea name="description" id="desc" class="form-control" cols="30" rows="10" required></textarea>
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Save Changes">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>