<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_events_id($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            unlink("uploads/events/".$row->event_img);
            // status
            $status = $obj->delete_event($id);
            // check status
            if($status == true){
                Flash_data::success("Events Delete Success");
                header("location:view_events.php");
            }else{
                Flash_data::error("Something Went Wrong!");
                header("location:view_events.php");
            }
        }
    }
}


?>