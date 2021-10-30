<?php
session_start();
include 'admin/database.php';
$obj = new Database();
if(isset($_POST['submit'])){
    $student_name = $_POST['student_name'];
    $student_phone = $_POST['student_phone'];
    $student_email = $_POST['student_email'];
    $course_category = $_POST['course_category'];
    // img upload
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
                $fileDestination = "admin/uploads/students/".$fileNewName;
                if(move_uploaded_file($fileTmp,$fileDestination)){
                    $status = $obj->student_admission($student_name,$student_phone,$student_email,$course_category,$fileNewName);
                    if($status == true){
                        header("location:register.php");
                    }else{
                        header("location:register.php");
                    }
                }
            }
        }
    }
}

?>