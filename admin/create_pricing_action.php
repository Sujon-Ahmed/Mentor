<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
// check submit data
if (isset($_POST['submit'])) {
    $pricing_title = $_POST['pricing_title'];
    $pricing_amount = $_POST['pricing_amount'];
    $description = $_POST['description'];
    $status = $obj->insert_pricing_plan($pricing_title,$pricing_amount,$description);
    // check status
    if ($status == true) {
        Flash_data::success('Pricing Plan Create Success');
        header('location:create_pricing.php');
    } else {
        Flash_data::error('Something Went Wrong!');
        header('location:create_pricing.php');
    }
}

?>