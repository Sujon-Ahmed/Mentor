<?php
$page = "pricing";
$sub_page = "create_pricing";
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
        <h1 class="h3 mb-0 text-gray-800">Add New Pricing</h1>
        <p class="mb-4">Dashboard / Pricing</p>
    </div>
    <form action="create_pricing_action.php" method="POST" id="pricing">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Price Plan</h6>
                    </div>
                    <div class="card-body">
                        <!-- course_title -->
                        <label for="pricing_title">Pricing Plan Title</label>
                        <input type="text" name="pricing_title" id="pricing_title" class="form-control" placeholder="Enter price plan title here..." required>
                        <!-- course price -->
                        <label for="pricing_amount" class='mt-2'>Pricing Plan Amount</label>
                        <input type="text" name="pricing_amount" id="pricing_amount" class="form-control" placeholder="$ price here..." required>
                        <!-- course desc -->
                        <label for="description" class='mt-2'>Description</label>
                        <textarea name="description" id="desc" class="form-control" cols="30" rows="10"></textarea>
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Save Changes">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>