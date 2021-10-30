<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $feedback = $_POST['description'];
    $status = $obj->feedback_add($id,$feedback);
    // check status
    if($status == true){
        Flash_data::success("Feedback add success");
        header("location:view_students.php");
    }else{
        Flash_data::error("Something Went Wrong!");
        header("location:view_students.php");
    }
}
?>