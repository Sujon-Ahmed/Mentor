<?php
$page = "courses";
$sub_page = "add_courses";
include "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_course_info_id($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            $id = $row->course_id;
            $course_img = $row->course_thumbnail;
            $course_title = $row->course_title;
            $course_description = $row->course_desc;
            $trainer = $row->trainer_name;
            $trainer_id = $row->trainer;
            $category = $row->course_category_name;
            $course_category = $row->course_category;
            $fee = $row->course_fee;
        }
    }
}
$result = $obj->get_course_category();
$trainer = $obj->get_trainers();

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
        <h1 class="h3 mb-0 text-gray-800">Edit New Course</h1>
        <p class="mb-4">Dashboard / Course / Edit</p>
    </div>
    <form action="course_update_action.php" method="POST" id="course" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Course</h6>
                    </div>
                    <div class="card-body">
                        <!-- course_title -->
                        <label for="course_title">Course Title</label>
                        <input type="text" name="course_title" value="<?php echo $course_title; ?>" id="course_title" class="form-control" placeholder="Enter course title here..." required>
                        <!-- course category -->
                        <label class="mt-2" for="course_category">Course Category</label>
                        <select name="course_category" id="course_category" class="form-control" required>
                            <option value="">Select Course Category</option>
                            <?php
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_object()){
                                        ?>
                                            <option <?php if($course_category == $row->course_category_id){echo 'selected';} ?> value="<?php echo $row->course_category_id; ?>"><?php echo $row->course_category_name; ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <div class="input-group mb-3 mt-3">
                            <label class="input-group-text" for="inputGroupSelect01">$</label>
                            <input type="text" name="course_price" value="<?php echo $fee; ?>" class="form-control" placeholder="Price" aria-label="Price">
                            
                            <label class="input-group-text" for="inputGroupSelect01">Trainer of Course</label>
                            <select class="form-select" name="trainer_name" id="inputGroupSelect01">
                                <option selected>Select Trainer...</option>
                                <?php
                                    if($trainer->num_rows > 0){
                                        while($row = $trainer->fetch_object()){
                                            ?>
                                                <option <?php if($trainer_id == $row->trainer_id){ echo 'selected';} ?> value="<?php echo $row->trainer_id; ?>"><?php echo $row->trainer_name; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <!-- course image -->
                        <div class="form-row mt-3">
                            <div class="form-group col-md-12">
                                <label for="course-img" class="btn btn-primary mt-2"><i class="fas fa-upload"></i> Uploads Image</label>
                                <input type="file" name="file" id="course-img" class="file-control form-control" style="display: none;">
                                <input type="hidden" name="oldfile" value="<?php echo $course_img; ?>" >
                            </div>
                            <div class="col-md-6 mt-3" id="course-img-prev">
                                <img src="<?php echo "uploads/courses/".$course_img; ?>" class="img-fluid" alt="">
                            </div>
                        </div>
                        <!-- course desc -->
                        <label for="description">Description</label>
                        <textarea name="description" id="desc" class="form-control" cols="30" rows="10"><?php echo $course_description; ?></textarea>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Save Changes">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>