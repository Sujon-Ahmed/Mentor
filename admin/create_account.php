<?php
session_start();
include "flash_data.php";
include "database.php";
$obj = new Database();
// isset submit data
if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST"){
    // testing input data
    function input_test($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = input_test($_POST['admin_name']);
    $email = input_test($_POST['admin_email']);
    $password = md5($_POST['admin_password']);
    // second level testing input data
    if($name != '' && $email != '' && $password != ''){
        $status = $obj->register($name, $email, $password);
        // check status
        if($status == true){
            Flash_data::success("Account Create Success! Please Login!");
            header("location:login.php");
        }else{
            Flash_data::error("Provide a Valid or Unique Email!");
            header("location:register.php");
        }
    }else{
        Flash_data::error("All Felid Are Required!");
        header("location:register.php");
    }
}else{
    Flash_data::error("Something Went Wrong!");
    header("location:register.php");
}

?>