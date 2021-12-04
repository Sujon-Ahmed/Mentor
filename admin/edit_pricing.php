<?php
$page = "pricing";
$sub_page = "view_pricing";
include "header.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $get_pricing_id = $obj->get_pricing_with_id($id);
    if ($get_pricing_id->num_rows > 0) {
        while ($row = $get_pricing_id->fetch_object()) {
            $id = $row->pricing_id;
            $title = $row->pricing_title;
            $price = $row->pricing_price;
            $desc = $row->pricing_desc;
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
        <h1 class="h3 mb-0 text-gray-800">Edit Pricing</h1>
        <p class="mb-4">Dashboard / View / Edit Pricing</p>
    </div>
    <form action="update_pricing_action.php" method="POST" id="pricing">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Price Plan</h6>
                            <a href="view_pricing.php" class="btn btn-success btn-sm">View</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- course_title -->
                        <label for="pricing_title">Pricing Plan Title</label>
                        <input type="text" name="pricing_title" value="<?php echo $title; ?>" id="pricing_title" class="form-control" placeholder="Enter price plan title here..." required>
                        <!-- course price -->
                        <label for="pricing_amount" class='mt-2'>Pricing Plan Amount</label>
                        <input type="text" name="pricing_amount" value="<?php echo $price; ?>" id="pricing_amount" class="form-control" placeholder="$ price here..." required>
                        <!-- course desc -->
                        <label for="description" class='mt-2'>Description</label>
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