<?php
class Database{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "mentor";
    private $conn;
    private $sql;
    private $result;
    // create connection
    public function __construct()
    {
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        // check connection
        if($this->conn->connect_error){
            echo "Connection Failed : {$this->conn->connect_error}";
            die();
        }
    }
    // insert register data
    public function register($name, $email, $password){
        $this->sql = "INSERT INTO `admin`(`admin_name`, `admin_email`, `admin_password`) VALUES ('$name','$email','$password')";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // check email
    public function check_email($email){
        $this->sql = "SELECT * FROM `admin` WHERE admin_email = '$email'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // profile retrive
    public function profile_retrive($id){
        $this->sql = "SELECT * FROM `admin` WHERE admin_id = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // profile update with photo
    public function update_profile($id,$name,$email,$phone,$about,$fileNewName){
        $this->sql = "UPDATE `admin` SET `admin_name`='$name',`admin_email`='$email',`admin_about`='$about',`admin_phone`='$phone',`admin_photo`='$fileNewName' WHERE `admin_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // profile update without photo
    public function update_profile_out_photo($id,$name,$email,$phone,$about,$oldphoto){
        $this->sql = "UPDATE `admin` SET `admin_name`='$name',`admin_email`='$email',`admin_about`='$about',`admin_phone`='$phone',`admin_photo`='$oldphoto' WHERE `admin_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // profile photo retrive
    public function profile_retrive_photo(){
        $this->sql = "SELECT * FROM `admin`";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // change password
    public function change_password($id,$new_pass){
        $this->sql = "UPDATE `admin` SET `admin_password`='$new_pass' WHERE `admin_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // =============== banner section ===================
    // insert banner data
    public function create_banner($title,$desc,$fileNewName){
        $this->sql = "INSERT INTO `banner`(`banner_title`, `banner_img`, `banner_desc`) VALUES ('$title','$fileNewName','$desc')";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // fetch all banner dataTables
    public function banner_details(){
        $this->sql = "SELECT * FROM `banner`";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
     // get single banner details
     public function get_single_banner($id){
        $this->sql = "SELECT * FROM `banner` WHERE banner_id = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
}


?>