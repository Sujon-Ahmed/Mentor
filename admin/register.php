<?php
session_start();
if(isset($_SESSION['id'])){
    header("location:index.php");
}
include "flash_data.php";
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
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block register-img"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="create_account.php" method="POST" class="user" id="register" data-parsley-validate>
                                <div class="form-group">
                                    <input type="text" name="admin_name" class="form-control form-control-user" id="user_name"placeholder="Enter your name" data-parsley-error-message="Enter Your Valid Name" data-parsley-trigger="keyup" data-parsley-pattern="[a-zA-Z ]+$" required>                                   
                                </div>
                                <div class="form-group">
                                    <input type="email" name="admin_email" class="form-control form-control-user" id="user_email" placeholder="email@gmail.com" data-parsley-error-message="Enter Your Valid Email" data-parsley-trigger="keyup" data-parsley-type="email" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="admin_password" data-parsley-trigger="keyup" data-parsley-minlength="6" class="form-control form-control-user"
                                            id="inputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="admin_confirm_password" class="form-control form-control-user" data-parsley-trigger="keyup" data-parsley-equalto="#inputPassword" data-parsley-minlength="6"
                                            id="exampleRepeatPassword" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Register Account">
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- script for parsley -->
    <script>
        $('#register').parsley();
    </script>
</body>
</html>