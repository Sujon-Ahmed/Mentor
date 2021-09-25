<?php
session_start();
include "flash_data.php";
include "database.php";
$obj = new Database();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_single_banner($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
           unlink("uploads/banner/".$row->banner_img);
           $status = $obj->banner_delete($id);
            //check status
            if($status == true){
                Flash_data::success("Banner Delete Successfully");
                header("location:view_banner.php");
            }else{
                Flash_data::error("Something Went Wrong!");
                header("location:view_banner.php");
            }
        }
    }
}
?>