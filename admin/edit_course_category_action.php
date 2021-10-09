<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(!isset($_POST['submit'])){
    header("location:edit_course_category.php");
}else{
    $id = $_POST['id'];
    $icon = $_POST['icon'];
    $name = $_POST['name'];
    $status = $obj->update_course_category($id,$icon,$name);
    // check status
    if($status == true){
        Flash_data::success("Course Category Update Success");
        header("location:edit_course_category.php?id=".$id);
    }else{
        Flash_data::error("Something Went Wrong!");
        header("location:edit_course_category.php?id=".$id);
    }
}

?>