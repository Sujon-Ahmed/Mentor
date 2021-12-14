<?php
session_start();
include 'admin/flash_data.php';
include 'admin/database.php';
$obj = new Database();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $status = $obj->insert_subscriber_email($email);
    if ($status == true) {
        Flash_data::success('You will get Some Notifications');
        header('location:index.php');
    } else {
        Flash_data::error('Something Went Wrong!');
        header('location:index.php');
    }
}
?>