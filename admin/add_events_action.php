<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
// check submit data
if(isset($_POST['submit'])){
    $title = $_POST['events_title'];
    $description = $_POST['description'];
    // image upload code
    if(!empty($_FILES['file']['name'])){
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        // check in_array method
        if(in_array($fileActualExt,$allowed)){
            $fileError = $_FILES['file']['error'];
            if($fileError == 0){
                $fileNewName = uniqid('',true).'.'.$fileActualExt;
                $fileDestination = "uploads/events/".$fileNewName;
                // move upload file
                if(move_uploaded_file($fileTmp,$fileDestination)){
                    $status = $obj->insert_events($title,$description,$fileNewName);
                    // check status
                    if($status == true){
                        Flash_data::success("New Events Add Success");
                        header("location:add_events.php");
                    }else{
                        Flash_data::error("Something Went Wrong!");
                        header("location:add_events.php");
                    }
                }
            }else{
                Flash_data::error("File Uploads Error!");
                header("location:add_events.php");
            }
        }else{
            Flash_data::error("File Type Error!");
            header("location:add_events.php");
        }
    }else{
        Flash_data::error("Please Select an Image!");
        header("location:add_events.php");
    }
}

?>