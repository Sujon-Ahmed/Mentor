<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(!isset($_POST['submit'])){
    header("location:create_course_category.php");
}else{
    $icon = $_POST['icon'];
    $name = $_POST['name'];
    $slag = strtolower(str_replace(' ','-',$_POST['name']));
    $status = $obj->course_category_insert($icon,$name,$slag);
    // check status
    if($status == true){
        Flash_data::success("Course Category Add Success");
        header("location:create_course_category.php");
    }else{
        Flash_data::error("Something Went Wrong!");
        header("location:create_course_category.php");
    }
}
?>