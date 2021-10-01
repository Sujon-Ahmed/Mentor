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
    // update banner with photo
    public function banner_update_withPhoto($id,$title,$desc,$fileNewName){
        $this->sql = "UPDATE `banner` SET `banner_title`='$title',`banner_img`='$fileNewName',`banner_desc`='$desc' WHERE `banner_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // update banner without photo
    public function banner_update_withOutPhoto($id,$title,$desc,$oldphoto){
        $this->sql = "UPDATE `banner` SET `banner_title`='$title',`banner_img`='$oldphoto',`banner_desc`='$desc' WHERE `banner_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // Banner delete with id
    public function banner_delete($id){
        $this->sql = "DELETE FROM `banner` WHERE `banner_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // get banner with limit in home page
    public function get_limit_banner(){
        $this->sql = "SELECT * FROM `banner` LIMIT 1";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // ================= about section ======================
    // insert about
    public function insert_about($title, $desc, $fileNewName){
        $this->sql = "INSERT INTO `about`(`about_title`, `about_desc`, `about_image`) VALUES ('$title','$desc','$fileNewName')";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // get all data form about
    public function about_details(){
        $this->sql = "SELECT * FROM `about`";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get all data form about section with limit
    public function get_limit_about(){
        $this->sql = "SELECT * FROM `about` LIMIT 1";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get all data form about section with limit
    public function get_about_details($id){
        $this->sql = "SELECT * FROM `about` WHERE about_id = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }


    
}


?>