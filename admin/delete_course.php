<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->get_course_info_id($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            unlink("uploads/courses/".$row->course_thumbnail);
            // status
            $status = $obj->delete_course($id);
            // check status
            if($status == true){
                Flash_data::success("Course Delete Success");
                header("location:view_courses.php");
            }else{
                Flash_data::error("Something Went Wrong!");
                header("location:view_corses.php");
            }
        }
    }
}

?>