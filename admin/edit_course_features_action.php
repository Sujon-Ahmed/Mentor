<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(!isset($_POST['submit'])){
    header("location:course_features_edit.php");
}else{
    $id = $_POST['id'];
    $icon = $_POST['icon'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $status = $obj->course_features_update($id,$icon,$title,$desc);
    // check status
    if($status == true){
        Flash_data::success("Features Update Successfully");
        header("location:course_features_edit.php?id=".$id);
    }else{
        Flash_data::error("Something Went Wrong!");
        header("location:course_features_edit.php?id=".$id);
    }
}
?>