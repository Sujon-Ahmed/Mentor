<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(!isset($_POST['submit'])){
    header('location:why_about_edit.php');
}else{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    // status
    $status = $obj->why_about_update($id,$title,$desc);
    // check status
    if($status == true){
        Flash_data::success("Why About Data Update Success");
        header("location:why_about_edit.php?id=".$id);
    }else{
        Flash_data::error("Something Went Wring!");
        header("location:why_about_edit.php?id=".$id);
    }
}

?>