<?php
session_start();
include 'admin/flash_data.php';
include 'admin/database.php';
$obj = new Database();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $status = $obj->insert_message($name, $email, $subject, $message);
    if ($status == true) {
        Flash_data::success('Your Message Sent Success');
        header('location:contact.php');
    } else {
        Flash_data::error('Something Went Wrong!');
        header('location:contact.php');
    }
}
?>