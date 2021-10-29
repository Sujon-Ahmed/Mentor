<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
// isset submit data
if(!isset($_POST['submit'])){
    header("location:edit_events.php");
}else{
    $id = $_POST['id'];
    $title = $_POST['events_title'];
    $desc = $_POST['description'];
    $oldphoto = $_POST['oldfile'];
    // check image uploads
    if(!empty($_FILES['file']['name'])){
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        // check in_array function
        if(in_array($fileActualExt,$allowed)){
            $fileError = $_FILES['file']['error'];
            if($fileError == 0){
                $fileNewName = uniqid('',true).'.'.$fileActualExt;
                $fileDestination = "uploads/events/".$fileNewName;
                // move uploads file
                if(move_uploaded_file($fileTmp,$fileDestination)){
                    unlink("uploads/events/".$oldphoto);
                    // status
                    $status = $obj->update_events_photo($id,$title,$desc,$fileNewName);
                    // check status
                    if($status == true){
                        Flash_data::success("Events Update Success");
                        header("location:edit_events.php?id=".$id);
                    }else{
                        Flash_data::error("Something Went Wrong!");
                        header("location:edit_events.php?id=".$id);
                    }
                }
            }else{
                Flash_data::error("File Uploads Error!");
                header("location:edit_events.php?id=".$id);
            }
        }else{
            Flash_data::error("File Type Error!");
            header("location:edit_events.php?id=".$id);
        }
    }else{
         // status
         $status = $obj->update_events__without_photo($id,$title,$desc,$oldphoto);
         // check status
         if($status == true){
             Flash_data::success("Events Update Success");
             header("location:edit_events.php?id=".$id);
         }else{
             Flash_data::error("Something Went Wrong!");
             header("location:edit_events.php?id=".$id);
         }
    }
}
?>