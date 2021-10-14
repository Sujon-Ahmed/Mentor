<?php
session_start();
include "flash_data.php";
include "database.php";
$obj = new Database();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_trainers_details($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
           unlink("uploads/trainers/".$row->trainer_image);
           $status = $obj->delete_trainer_info($id);
            //check status
            if($status == true){
                Flash_data::success("Trainer Info Delete Success");
                header("location:view_trainers.php");
            }else{
                Flash_data::error("Something Went Wrong!");
                header("location:view_trainers.php");
            }
        }
    }
}
?>