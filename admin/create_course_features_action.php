<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(isset($_POST['submit'])){
    $icon = $_POST['icon'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $status = $obj->insert_course_features($icon,$title,$desc);
    // check status
    if($status == true){
        Flash_data::success("Features Add Successfully");
        header("location:create_course_features.php");
    }else{
        Flash_data::error("Something Went Wrong!");
        header("location:create_course_features.php");
    }
}

?>