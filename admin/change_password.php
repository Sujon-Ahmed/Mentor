<?php
session_start();
include "flash_data.php";
include "database.php";
$obj = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel</title> 
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/sb-admin-2.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- stylesheet toastr file -->
    <link rel="stylesheet" href="css/toastr.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <!-- parsley cdn link -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js" integrity="sha512-Fq/wHuMI7AraoOK+juE5oYILKvSPe6GC5ZWZnvpOO/ZPdtyA29n+a5kVLP4XaLyDy9D1IBPYzdFycO33Ijd0Pg==" crossorigin="anonymous"></script>
    <!-- style for parsley message -->
    <style>
        .parsley-errors-list li{
            color: red;
            display: block;
            width: 100%;
            padding-top: 5px;
        }
    </style>
</head>
<body class="bg-gradient-primary">
    <div class="container">
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
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Change Password!</h1>
                                    </div>
                                    <form  action="update_password.php" method="POST" id="change_password" class="user" data-parsley-validate>
                                        <div class="form-group">
                                            <input type="password" name="cur_password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Current Password" data-parsley-trigger="keyup" data-parsley-error-message="Enter Your Current Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="new_password" class="form-control form-control-user" id="inputPassword" placeholder="New Password" data-parsley-trigger="keyup" data-parsley-minlength="6" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="con_password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Confirm Password" data-parsley-trigger="keyup" data-parsley-equalto="#inputPassword" data-parsley-minlength="6" required>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-primary btn-user btn-block mb-3" value="Save Changes">
                                        <a href="index.php" title="Home Page" class="mt-5 text-center btn-block btn-user m-auto">Back to Home Page</a>
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- parsley js file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js" integrity="sha512-Fq/wHuMI7AraoOK+juE5oYILKvSPe6GC5ZWZnvpOO/ZPdtyA29n+a5kVLP4XaLyDy9D1IBPYzdFycO33Ijd0Pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- form validation js file -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
</body>
</html>