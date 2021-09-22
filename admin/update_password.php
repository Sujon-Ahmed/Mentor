<?php
session_start();
include "flash_data.php";
include "database.php";
$obj = new Database();
if(!isset($_POST['submit'])){
    header("location:change_password.php");
}else{
    $id = $_SESSION['id'];
    $cur_pass = md5($_POST['cur_password']);
    $new_pass = md5($_POST['new_password']);
    $password_retrive = $obj->profile_retrive($id);
    if($password_retrive->num_rows > 0){
        while($row = $password_retrive->fetch_object()){
            $db_pass = $row->admin_password;
        }
        if($db_pass === $cur_pass){
            $status = $obj->change_password($id,$new_pass);
            if($status == true){
                Flash_data::success("Password Change Successfully");
                header("location:edit_profile.php");
            }else{
                Flash_data::error("Something Went Wrong!");
                header("location:change_password.php");
            }
        }else{
            Flash_data::error("Current Password Error!");
            header("location:change_password.php");
        }
    }
}

?>