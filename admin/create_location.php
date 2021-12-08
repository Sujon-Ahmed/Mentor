<?php
$page = "location";
$sub_page = "create_location";
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
        <h1 class="h3 mb-0 text-gray-800">Location</h1>
        <p class="mb-4">Dashboard / Location / Create</p>
    </div>
    <form action="create_location_action.php" method="POST" id="location">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Location</h6>
                        <a href="view_location.php" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- location_title -->
                        <label for="location_title">Location Title</label>
                        <input type="text" name="location_title" id="location_title" class="form-control" placeholder="Enter location title here..." required>
                        <!-- location map link -->
                        <label for="location_link" class='mt-2'>Location Link</label>
                        <input type="text" name="location_link" id="location_link" class="form-control" placeholder="Enter location map link here..." required>
                        <!-- submit button -->
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Save Changes">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>