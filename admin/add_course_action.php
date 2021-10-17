<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
// check submit data
if(isset($_POST['submit'])){
    $title = $_POST['course_title'];
    $course_category = $_POST['course_category'];
    $fee = $_POST['course_price'];
    $trainer = $_POST['trainer_name'];
    $desc = $_POST['description'];
    // image upload
    if(!empty($_FILES['file']['name'])){
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','png','jpeg');
        // check in_array 
        if(in_array($fileActualExt,$allowed)){
            $fileError = $_FILES['file']['error'];
            // check file error
            if($fileError == 0){
                $fileNewName = uniqid('',true).'.'.$fileActualExt;
                $fileDestination = "uploads/courses/".$fileNewName;
                // move upload file
                if(move_uploaded_file($fileTmp,$fileDestination)){
                    $status = $obj->add_course($title,$course_category,$fee,$desc,$trainer,$fileNewName);
                    // check status
                    if($status == true){
                        Flash_data::success("New Course Publish Success");
                        header("location:add_course.php");
                    }else{
                        Flash_data::error("Something Went Wrong!");
                        header("location:add_course.php");
                    }
                }
            }else{
                Flash_data::error("File Upload Error!");
                header("location:add_course.php");
            }
        }else{
            Flash_data::error("File Type Error!");
            header("location:add_course.php");
        }
    }else{
        Flash_data::error("Select an Image!");
        header("location:add_course.php");
    }
}
?>