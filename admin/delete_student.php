<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_student_info_id($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            unlink("uploads/students/".$row->student_img);
            $status = $obj->delete_student_info($id);
            // check status
            if($status == true){
                Flash_data::success("One Student Record Delete Success");
                header("location:view_students.php");
            }else{
                Flash_data::error("Something Went Wrong!");
                header("location:view_students.php");
            }
        }
    }
}

?>