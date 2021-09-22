<?php
session_start();
include "flash_data.php";
include "database.php";
$obj = new Database();
// check isset submit
if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    // status check
    $status = $obj->check_email($email);
    if($status->num_rows > 0){
        while($row = $status->fetch_object()){
            $id = $row->admin_id;
            $name = $row->admin_name;
            $db_pass = $row->admin_password;
        }
        if($password === $db_pass){
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            header("location:index.php");
        }else{
            Flash_data::error("Invalid Password!");
            header("location:login.php");
        }
    }else{
        Flash_data::error("Invalid Email!");
        header("location:login.php");
    }
}else{
    header("location:register.php");
}
?>