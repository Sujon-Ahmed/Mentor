<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
// check submit data
if (isset($_POST['submit'])) {
    $title = $_POST['location_title'];
    $link = $_POST['location_link'];
    // status
    $status = $obj->insert_location($title,$link);
    // check status
    if ($status == true) {
        Flash_data::success('Location Add Successfully');
        header('location:create_location.php');
    } else {
        Flash_data::error('Something Went Wrong!');
        header('location:create_location.php');
    }
}



?>