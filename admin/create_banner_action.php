<?php
session_start();
include 'flash_data.php';
include 'database.php';
$obj = new Database();
// check submit data
if(!isset($_POST['submit'])){
    header("location:create_banner.php");
}else{
    $title = $_POST['title'];
    $desc = $_POST['description'];

    if(!empty($_FILES['file']['name'])){
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allow = array('jpg','jpeg','png');
        if(in_array($fileActualExt,$allow)){
            $fileError = $_FILES['file']['error'];
            if($fileError == 0){
                $fileNewName = uniqid('',true).'.'.$fileActualExt;
                $fileDestination = "uploads/banner/".$fileNewName;
                if(move_uploaded_file($fileTmp,$fileDestination)){
                    $status = $obj->create_banner($title,$desc,$fileNewName);
                    if($status == true){
                        Flash_data::success("Banner Create Success");
                        header('location:create_banner.php');
                    }else{
                        Flash_data::error("Something Went Wrong!");
                        header('location:create_banner.php');
                    }
                }else{
                    Flash_data::success("File Upload Error!");
                    header('location:create_banner.php');
                }
            }else{
                Flash_data::error("This type of file Ext not allowed!");
                header('location:create_banner.php');
            }
        }
    }else{
        Flash_data::error("Please Select an image!");
        header('location:create_banner.php');
    }
}

?>