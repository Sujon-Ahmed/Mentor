<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $obj->delete_location($id);
    // check status
    if ($status == true) {
        Flash_data::success('location Delete Success');
        header('location:view_location.php');
    } else {
        Flash_data::error('Something Went Wrong!');
        header('location:view_location.php');
    }
}
?>