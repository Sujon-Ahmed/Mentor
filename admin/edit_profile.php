<?php
include "header.php";
$id = $_SESSION['id'];
$profile_data = $obj->profile_retrive($id);
if($profile_data->num_rows > 0){
    while($row = $profile_data->fetch_object()){
        $id = $row->admin_id;
        $name = $row->admin_name;
        $email = $row->admin_email;
        $photo = $row->admin_photo;
        $phone = $row->admin_phone;
        $about = $row->admin_about;
    }
}
?>
<div class="container">
     <!-- Page Heading -->
     <h1 class="h3 mb-1 text-gray-800">Account Settings - Profile</h1>
    <hr>
    <form action="profile_update.php" method="POST" id="profile" enctype="multipart/form-data">
        <div class="row">
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
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Profile Picture</h6>
                    </div>
                    <div class="card-body">
                        <div id="test-img">
                            <?php
                                if(!empty($photo)){
                                    ?>
                                        <img src="<?php echo "uploads/admin/".$photo ?>" class="img-fluid img-rounded" alt="Avatar">
                                    <?php
                                }else{
                                    ?>
                                        <img src="img/undraw_profile.svg" class="img-fluid img-rounded" alt="Avatar">
                                    <?php
                                }
                            ?>
                        </div>
                        <h6 class="mb-0 mt-4">JPG or JPEG or PNG no larger than 5 MB</h6>
                        <label for="img-file" class="btn btn-primary mt-3 text-center">Upload New Image</label>
                        <input type="file" name="file" id="img-file" class="file-control form-control" style="display: none;">
                        <input type="hidden" name="oldfile" value="<?php echo $photo; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Account Details</h6>
                    </div>
                    <div class="card-body">
                        <label for="name">Username (how your name will appear to other users on the site)</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" id="name" class="form-control">
                        <label for="email" class="mt-3">E-mail Address</label>
                        <input type="text" name="email" value="<?php echo $email; ?>" id="email" class="form-control">
                        <label for="phone" class="mt-3">Phone</label>
                        <input type="text" name="phone" id="phone" value="<?php if(!empty($phone)){echo $phone;} ?>" class="form-control" placeholder="++8801">
                        <label for="about" class="mt-3">About</label>
                        <textarea name="about" id="about" cols="10" rows="5" class="form-control" placeholder="Write something yourself..."><?php if(!empty($about)){echo $about;} ?></textarea>
                        <input type="submit" name="submit" id="submit" class="btn btn-primary mt-3" value="Save Changes">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>