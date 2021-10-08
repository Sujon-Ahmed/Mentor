<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(!isset($_POST['submit'])){
    header("location:edit_about.php");
}else{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $oldphoto = $_POST['oldfile'];
    if(!empty($_FILES['file']['name'])){
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        // check in_array function
        if(in_array($fileActualExt,$allowed)){
            $fileError = $_FILES['file']['error'];
            if($fileError == 0){
                $fileNewName = uniqid('',true).'.'.$fileActualExt;
                $fileDestination = "uploads/about/".$fileNewName;
                if(move_uploaded_file($fileTmp,$fileDestination)){
                    unlink("uploads/about/".$oldphoto);
                    $status = $obj->update_about_with_photo($id,$title,$desc,$fileNewName);
                    if($status == true){
                        Flash_data::success("About Section Update Success");
                        header("location:edit_about.php?id=".$id);
                    }else{
                        Flash_data::error("Something Went Wrong!");
                        header("location:edit_about.php?id=".$id);
                    }
                }
            }else{
                Flash_data::error("File Upload Error!");
                header("location:edit_about.php?id=".$id);
            }
        }else{
            Flash_data::error("Please Select an Image!");
            header("location:edit_about.php?id=".$id);
        }
    }else{
        $status = $obj->update_about_without_photo($id,$title,$desc,$oldphoto);
        if($status == true){
            Flash_data::success("About Section Update Success");
            header("location:edit_about.php?id=".$id);
        }else{
            Flash_data::error("Something Went Wrong!");
            header("location:edit_about.php?id=".$id);
        }
    }
}
?>