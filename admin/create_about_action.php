<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
// check submit data
if(!isset($_POST['submit'])){
    header("location:create_about.php");
}else{
    $title = $_POST['title'];
    $desc = $_POST['description'];
    // check image 
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
                $fileDestination = "uploads/about/".$fileNewName;
                if(move_uploaded_file($fileTmp,$fileDestination)){
                    $status = $obj->insert_about($title, $desc, $fileNewName);
                    // check status
                    if($status == true){
                        Flash_data::success("About Section Create Success");
                        header("location:create_about.php");
                    }else{
                        Flash_data::error("Something Went Wrong!");
                        header("location:create_about.php");
                    }
                }else{
                    Flash_data::error("File UPload Error!");
                    header("location:create_about.php");
                }
            }
        }else{
            Flash_data::error("This type file ext not allowed!");
            header("location:create_about.php");
        }
    }else{
        Flash_data::error("Please Select an Image!");
        header("location:create_about.php");
    }
}
?>