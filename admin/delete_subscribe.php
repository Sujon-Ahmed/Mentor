<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $obj->delete_subscriber($id);
    if ($status == true) {
        Flash_data::success('Subscriber Email Delete Success');
        header('location:view_all_subscriber.php');
    } else {
        Flash_data::error('Something Went Wrong!');
        header('location:view_all_subscriber.php');
    }
}
?>