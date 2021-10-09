<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $obj->delete_course_category($id);
    // check status
    if($status == true){
        Flash_data::success("Course Category Delete Success");
        header("location:view_course_category.php?id=".$id);
    }else{
        Flash_data::error("Something Went Wrong!");
        header("location:view_course_category.php?id=".$id);
    }
}
?>