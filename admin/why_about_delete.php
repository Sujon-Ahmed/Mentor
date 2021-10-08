<?php 
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $obj->why_about_section_delete($id);
    // check status
    if($status == true){
        Flash_data::success("Why About Section Delete Success");
        header("location:view_why_about.php");
    }else{
        Flash_data::error("Something Went Wrong!");
        header("location:view_why_about.php");
    }
}

?>