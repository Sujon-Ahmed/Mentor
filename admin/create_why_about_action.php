<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(!isset($_POST['submit'])){
    header('location:create_why_about.php');
}else{
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $status = $obj->insert_why_about($title,$desc);
    if($status == true){
        Flash_data::success("Why About Create Success");
        header("location:create_why_about.php");
    }else{
        Flash_data::error("Something Went Wrong!");
        header("location:create_why_about.php");
    }
}

?>