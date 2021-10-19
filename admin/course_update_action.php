<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(!isset($_POST['submit'])){
    header("location:edit_course.php");
}else{
    $id = $_POST['id'];
    $title = $_POST['course_title'];
    $category = $_POST['course_category'];
    $fee = $_POST['course_price'];
    $trainer = $_POST['trainer_name'];
    $oldphoto = $_POST['oldfile'];
    $details = $_POST['description'];
    // image uploads 
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
                $fileDestination = "uploads/courses/".$fileNewName;
                // move uploads file
                if(move_uploaded_file($fileTmp,$fileDestination)){
                    unlink("uploads/courses/".$oldphoto);
                    // update with photo
                    $status = $obj->update_course($id,$title,$category,$fee,$trainer,$details,$fileNewName);
                    // check status
                    if($status == true){
                        Flash_data::success("Course Update Success");
                        header("location:edit_course.php?id=".$id);
                    }else{
                        Flash_data::error("Something Went Wrong!");
                        header("location:edit_course.php?id=".$id);
                    }
                }
            }else{
                Flash_data::error("File Uploads Error!");
                header("location:edit_course.php?id=".$id);
            }
        }else{
            Flash_data::error("File Type Error!");
            header("location:edit_course.php?id=".$id);
        }
    }else{
        // update without  photo
        $status = $obj->update_course_out_photo($id,$title,$category,$fee,$trainer,$details,$oldphoto);
        // check status
        if($status == true){
            Flash_data::success("Course Update Success");
            header("location:edit_course.php?id=".$id);
        }else{
            Flash_data::error("Something Went Wrong!");
            header("location:edit_course.php?id=".$id);
        }
    }
}
?>