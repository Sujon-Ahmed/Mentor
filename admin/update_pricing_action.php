<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if (!isset($_POST['submit'])) {
    header('location:edit_pricing.php');
} else {
    $id = $_POST['id'];
    $title = $_POST['pricing_title'];
    $price = $_POST['pricing_amount'];
    $desc = $_POST['description'];
    // status
    $status = $obj->update_pricing_with_id($id,$title,$price,$desc);
    // check status
    if ($status == true) {
        Flash_data::success('Pricing plan update Success');
        header('location:edit_pricing.php?id='.$id);
    } else {
        Flash_data::error('Something Went Wrong!');
        header('location:edit_pricing.php?id='.$id);
    }
}

?>