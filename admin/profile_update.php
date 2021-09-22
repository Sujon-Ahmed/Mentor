<?php
session_start();
include "flash_data.php";
include "database.php";
$obj = new Database();
if(!isset($_POST['submit'])){
    header("location:edit_profile.php");
}else{
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $about = $_POST['about'];
    $oldphoto = $_POST['oldfile'];
    if(!empty($_FILES['file']['name'])){
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        if(in_array($fileActualExt,$allowed)){
            $fileError = $_FILES['file']['error'];
            if($fileError == 0){
                $fileNewName = uniqid('',true).'.'.$fileActualExt;
                $fileDestination = "uploads/admin/".$fileNewName;
                if(move_uploaded_file($fileTmp,$fileDestination)){
                    unlink('uploads/admin/'.$oldphoto);
                    $status = $obj->update_profile($id,$name,$email,$phone,$about,$fileNewName);
                    if($status == true){
                        Flash_data::success("Profile Update Successfully");
                        header("location:edit_profile.php");
                    }else{
                        Flash_data::error("Something Went Wrong!");
                        header("location:edit_profile.php");
                    }
                }
            }else{
                Flash_data::error("Uploads Error! Please try again!");
                header("location:edit_profile.php");
            }
        }else{
            Flash_data::error("Please uploads valid photo!");
            header("location:edit_profile.php");
        }
    }else{
        $status = $obj->update_profile_out_photo($id,$name,$email,$phone,$about,$oldphoto);
        if($status == true){
            Flash_data::success("Profile Update Successfully");
            header("location:edit_profile.php");
        }else{
            Flash_data::error("Something Went Wrong!");
            header("location:edit_profile.php");
        }
    }
}
?>