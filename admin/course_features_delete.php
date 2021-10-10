<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $obj->delete_course_features($id);
    // check status
    if($status == true){
        Flash_data::success("Course Features Delete Success");
        header("location:view_course_features.php?id=".$id);
    }else{
        Flash_data::error("Something Went Wrong!");
        header("location:view_course_features.php?id=".$id);
    }    
}