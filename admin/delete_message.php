<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $obj->delete_message($id);
    if ($status == true) {
        Flash_data::success('Message Delete Success');
        header('location:view_contact_message.php');
    } else {
        Flash_data::error('Something Went Wrong!');
        header('location:view_contact_message.php');
    }
}
?>