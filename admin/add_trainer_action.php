<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(isset($_POST['submit'])){
    $name = $_POST['trainer_name'];
    $designation = $_POST['course_category'];
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
                    $status = $obj->add_trainer($name,$designation,$about,$fileNewName);
                    if($status == true){
                        Flash_data::success("Trainer Add Success");
                        header("location:add_new_trainer.php");
                    }else{
                        Flash_data::error("Something Went Wrong!");
                        header("location:add_new_trainer.php");
                    }
                }
            }else{
                Flash_data::error("File Upload Error!");
                header("location:add_new_trainer.php");
            }
        }else{
            Flash_data::error("File Type Error!");
            header("location:add_new_trainer.php");
        }
    }else{
        Flash_data::error("Please Select an Image!");
        header("location:add_new_trainer.php");
    }
}

?>