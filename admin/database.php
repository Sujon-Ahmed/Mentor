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
}


?>