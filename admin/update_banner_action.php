<?php
session_start();
include "flash_data.php";
include "database.php";
$obj = new Database();
// check condition
if(!isset($_POST['submit'])){
    header("location:edit_banner.php");
}else{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $oldphoto = $_POST['oldfile'];
    // check image
    if(!empty($_FILES['file']['name'])){
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        // check in_array
        if(in_array($fileActualExt,$allowed)){
            $fileError = $_FILES['file']['error'];
            if($fileError == 0){
                $fileNewName = uniqid('',true).'.'.$fileActualExt;
                $fileDestination = "uploads/banner/".$fileNewName;
                if(move_uploaded_file($fileTmp, $fileDestination)){
                    unlink("uploads/banner/".$oldphoto);
                    $status = $obj->banner_update_withPhoto($id,$title,$desc,$fileNewName);
                    // check status
                    if($status == true){
                        Flash_data::success("Banner Update Successfully");
                        header("location:edit_banner.php?id=".$id);
                    }else{
                        Flash_data::success("Something Went Wrong!");
                        header("location:edit_banner.php?id=".$id);
                    }
                }
            }else{
                Flash_data::success("File Upload Error!");
                header("location:edit_banner.php?id=".$id);
            }
        }else{
            Flash_data::success("Please select an image!");
            header("location:edit_banner.php?id=".$id);
        }
    }else{
        $status = $obj->banner_update_withOutPhoto($id,$title,$desc,$oldphoto);
        // check status
        if($status == true){
            Flash_data::success("Banner Update Successfully");
            header("location:edit_banner.php?id=".$id);
        }else{
            Flash_data::success("Something Went Wrong!");
            header("location:edit_banner.php?id=".$id);
        }
    }
}
?>