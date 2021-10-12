<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(!isset($_POST['submit'])){
    header("location:trainer_info_edit.php");
}else{
    $id = $_POST['id'];
    $name = $_POST['trainer_name'];
    $designation = $_POST['course_category'];
    $oldphoto = $_POST['oldfile'];
    $about = $_POST['description'];
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
                $fileDestination = "uploads/trainers/".$fileNewName;
                if(move_uploaded_file($fileTmp,$fileDestination)){
                    unlink("uploads/trainers/".$oldphoto);
                    $status = $obj->update_trainer_with_photo($id,$name,$designation,$about,$fileNewName);
                    if($status == true){
                        Flash_data::success("Trainer Info Update Success");
                        header("location:trainer_info_edit.php?id=".$id);
                    }else{
                        Flash_data::error("Something Went Wrong!");
                        header("location:trainer_info_edit.php?id=".$id);
                    }
                }
            }else{
                Flash_data::error("File Uploads Error!");
                header("location:trainer_info_edit.php?id=".$id);
            }
        }else{
            Flash_data::error("This type file not allowed!");
            header("location:trainer_info_edit.php?id=".$id);
        }
    }else{
        $status = $obj->update_trainer_without_photo($id,$name,$designation,$about,$oldphoto);
        if($status == true){
            Flash_data::success("Trainer Info Update Success");
            header("location:trainer_info_edit.php?id=".$id);
        }else{
            Flash_data::error("Something Went Wrong!");
            header("location:trainer_info_edit.php?id=".$id);
        }
    }
}
?>