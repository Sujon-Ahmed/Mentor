<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
// check submit data
if (!isset($_POST['submit'])) {
    header('location:edit_location.php');
} else {
    $id = $_POST['id'];
    $title = $_POST['location_title'];
    $link = $_POST['location_link'];
    // status
    $status = $obj->update_location_with_id($id,$title,$link);
    // check status
    if ($status == true) {
        Flash_data::success('Location Update Success');
        header('location:edit_location.php?id='.$id);
    } else {
        Flash_data::error('Something Went Wrong!');
        header('location:edit_location.php?id='.$id);
    }
}
?>