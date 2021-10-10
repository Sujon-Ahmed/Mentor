<?php
$page = "trainers";
$sub_page = "add_trainer";
include "header.php";
$result = $obj->get_course_category();
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
        <h1 class="h3 mb-0 text-gray-800">Add New Trainer</h1>
        <p class="mb-4">Dashboard / Trainers / Add</p>
    </div>
    <form action="add_trainer_action.php" method="POST" id="trainer" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Trainer</h6>
                    </div>
                    <div class="card-body">
                        <label for="name">Trainer Name</label>
                        <input type="text" name="trainer_name" id="name" class="form-control" placeholder="Enter trainer name" required>
                        <label class="mt-2" for="course_category">Trainer Designation</label>
                        <select name="course_category" id="course_category" class="form-control" required>
                            <option value="">Select Designation</option>
                            <?php
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_object()){
                                        ?>
                                            <option value="<?php echo $row->course_category_id; ?>"><?php echo $row->course_category_name; ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>

                        <div class="form-row mt-3">
                            <div class="form-group col-md-12">
                                <label for="trainer-img" class="btn btn-primary mt-2"><i class="fas fa-upload"></i> Uploads Image</label>
                                <input type="file" name="file" id="trainer-img" class="file-control form-control" style="display: none;">
                            </div>
                            <div class="col-md-6 mt-3" id="trainer-img-prev"></div>
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