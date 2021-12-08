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
    // ? =============== banner section ===================
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
    // ? ================= about section ======================
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
    // get all data form about details page
    public function get_about_details($id){
        $this->sql = "SELECT * FROM `about` WHERE about_id = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // about update with photo
    public function update_about_with_photo($id,$title,$desc,$fileNewName){
        $this->sql = "UPDATE `about` SET `about_title`='$title',`about_desc`='$desc',`about_image`='$fileNewName' WHERE `about_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // about update without photo
    public function update_about_without_photo($id,$title,$desc,$oldphoto){
        $this->sql = "UPDATE `about` SET `about_title`='$title',`about_desc`='$desc',`about_image`='$oldphoto' WHERE `about_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // about delete
    public function delete_about($id){
        $this->sql = "DELETE FROM `about` WHERE `about_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // ? ================ why about-us section ==============
    // insert about
    public function insert_why_about($title,$desc){
        $this->sql = "INSERT INTO `why_about`( `why_about_title`, `why_about_desc`) VALUES ('$title','$desc')";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // get all data form why_about table
    public function why_about_details(){
        $this->sql = "SELECT * FROM `why_about`";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get why_about data with id
    public function get_why_about($id){
        $this->sql = "SELECT * FROM `why_about` WHERE why_about_id = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get why_about data in home page with limit
    public function get_limit_why_about(){
        $this->sql = "SELECT * FROM `why_about` LIMIT 1";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get why_about data in home page with limit
    public function why_about_update($id,$title,$desc){
        $this->sql = "UPDATE `why_about` SET `why_about_title`='$title',`why_about_desc`='$desc' WHERE `why_about_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // delete why_about section
    public function why_about_section_delete($id){
        $this->sql = "DELETE FROM `why_about` WHERE `why_about_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // ? ======================= course features ====================
    // insert course features data
    public function insert_course_features($icon,$title,$desc){
        $this->sql = "INSERT INTO `course_features` (`course_features_icon`, `course_features_title`, `course_features_desc`) VALUES ('$icon','$title','$desc')";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // get course features data
    public function get_course_features(){
        $this->sql = "SELECT * FROM `course_features`";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get course features data with id
    public function get_course_features_withID($id){
        $this->sql = "SELECT * FROM `course_features` WHERE course_features_id = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get course features data in index page with limit
    public function features_limit(){
        $this->sql = "SELECT * FROM `course_features` LIMIT 3";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // course features update with id
    public function course_features_update($id,$icon,$title,$desc){
        $this->sql = "UPDATE `course_features` SET `course_features_icon`='$icon',`course_features_title`='$title',`course_features_desc`='$desc' WHERE `course_features_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // course features delete with id
    public function delete_course_features($id){
        $this->sql = "DELETE FROM `course_features` WHERE `course_features_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // ? ================ course category section ==============
    // insert course category
    public function course_category_insert($icon,$name,$slag)
    {
        $this->sql = "INSERT INTO `course_category`( `course_category_icon`, `course_category_name`, `slag`) VALUES ('$icon','$name','$slag')";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // get course category
    public function get_course_category()
    {
        $this->sql = "SELECT * FROM `course_category`";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get course category with id
    public function get_course_id($id)
    {
        $this->sql = "SELECT * FROM `course_category` WHERE `course_category_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get course category update with id
    public function update_course_category($id,$icon,$name,$slag)
    {
        $this->sql = "UPDATE `course_category` SET `course_category_icon`='$icon',`course_category_name`='$name',`slag`='$slag' WHERE `course_category_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // delete course category with id
    public function delete_course_category($id)
    {
        $this->sql = "DELETE FROM `course_category` WHERE `course_category_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // ? ===================== trainer section ==============
    // insert trainer
    public function add_trainer($name,$designation,$about,$fileNewName)
    {
        $this->sql = "INSERT INTO `trainers`(`trainer_name`, `trainer_designation`, `trainer_about`, `trainer_image`) VALUES ('$name','$designation','$about','$fileNewName')";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // get trainer joining table in view page
    public function get_trainers_join()
    {
        $this->sql = "SELECT * FROM trainers INNER JOIN course_category ON trainers.trainer_designation = course_category.course_category_id;";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get trainer home page with limit
    public function get_trainers_limit()
    {
        $this->sql = "SELECT * FROM trainers INNER JOIN course_category ON trainers.trainer_designation = course_category.course_category_id LIMIT 3";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get total trainers
    public function get_all_trainers()
    {
        $this->sql = "SELECT * FROM trainers INNER JOIN course_category ON trainers.trainer_designation = course_category.course_category_id";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get trainer details in details page
    public function get_trainers_details($id)
    {
        $this->sql = "SELECT * FROM trainers INNER JOIN course_category ON trainers.trainer_designation = course_category.course_category_id WHERE `trainer_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get trainers
    public function get_trainers()
    {
        $this->sql = "SELECT * FROM trainers";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get trainer number
    public function get_trainers_number()
    {
        $this->sql = "SELECT * FROM trainers";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result->num_rows;
        }else{
            return false;
        }
    }
    // update trainer information with photo
    public function update_trainer_with_photo($id,$name,$designation,$about,$fileNewName)
    {
        $this->sql = "UPDATE `trainers` SET `trainer_name`='$name',`trainer_designation`='$designation',`trainer_about`='$about',`trainer_image`='$fileNewName' WHERE `trainer_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // update trainer information without photo
    public function update_trainer_without_photo($id,$name,$designation,$about,$oldphoto)
    {
        $this->sql = "UPDATE `trainers` SET `trainer_name`='$name',`trainer_designation`='$designation',`trainer_about`='$about',`trainer_image`='$oldphoto' WHERE `trainer_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // delete trainer info with id
    public function delete_trainer_info($id)
    {
        $this->sql = "DELETE FROM `trainers` WHERE `trainer_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // ? =============== student admission ================
    // student registration data insert
    public function student_admission($student_name,$student_phone,$student_email,$course_category,$fileNewName)
    {
        $this->sql = "INSERT INTO `students`(`student_name`, `student_phone`, `student_gmail`, `student_img`, `student_course`) VALUES ('$student_name','$student_phone','$student_email','$fileNewName','$course_category')";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // get all students information
    public function get_students_join()
    {
        $this->sql = "SELECT * FROM students INNER JOIN course_category ON students.student_course = course_category.course_category_id ORDER BY student_id DESC";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get all students information
    public function get_students_join_limit_feedback()
    {
        $this->sql = "SELECT * FROM students INNER JOIN course_category ON students.student_course = course_category.course_category_id LIMIT 3";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get all students information with id
    public function get_students_join_id($id)
    {
        $this->sql = "SELECT * FROM students INNER JOIN course_category ON students.student_course = course_category.course_category_id WHERE student_id = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get all students information with id
    public function get_student_info_id($id)
    {
        $this->sql = "SELECT * FROM `students` WHERE student_id = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // delete students information with id
    public function delete_student_info($id)
    {
        $this->sql = "DELETE FROM `students` WHERE student_id = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // feedback insert
    public function feedback_add($id,$feedback)
    {
        $this->sql = "UPDATE `students` SET `feedback`='$feedback' WHERE `student_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // ? ===================== course section ======================
    // insert course 
    public function add_course($title,$course_category,$fee,$desc,$trainer,$fileNewName)
    {
        $this->sql = "INSERT INTO `courses`(`course_title`, `course_category`, `course_fee`, `trainer`, `course_thumbnail`, `course_desc`) VALUES ('$title','$course_category','$fee','$trainer','$fileNewName','$desc')";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // get course info with trainer and course category
    public function get_course_info()
    {
        $this->sql = "SELECT * FROM courses AS c INNER JOIN course_category AS cc ON c.course_category = cc.course_category_id INNER JOIN trainers AS t ON c.trainer = t.trainer_id ORDER BY c.course_id DESC";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get course info with id
    public function get_course_info_id($id)
    {
        $this->sql = "SELECT * FROM courses AS c INNER JOIN course_category AS cc ON c.course_category = cc.course_category_id INNER JOIN trainers AS t ON c.trainer = t.trainer_id WHERE course_id = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get course info with limit 3
    public function get_course_limit()
    {
        $this->sql = "SELECT * FROM courses AS c INNER JOIN course_category AS cc ON c.course_category = cc.course_category_id INNER JOIN trainers AS t ON c.trainer = t.trainer_id ORDER BY c.course_id DESC LIMIT 3";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // single courses details
    public function get_single_course_details($id)
    {
        $this->sql = "SELECT * FROM courses AS c INNER JOIN course_category AS cc ON c.course_category = cc.course_category_id INNER JOIN trainers AS t ON c.trainer = t.trainer_id WHERE c.course_id = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // total courses
    public function pagination_with_course($start_from,$num_per_page)
    {
        $this->sql = "SELECT * FROM courses AS c INNER JOIN course_category AS cc ON c.course_category = cc.course_category_id INNER JOIN trainers AS t ON c.trainer = t.trainer_id ORDER BY c.course_id DESC LIMIT $start_from,$num_per_page";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // update course with photo
    public function update_course($id,$title,$category,$fee,$trainer,$details,$fileNewName)
    {
        $this->sql = "UPDATE `courses` SET `course_title`='$title',`course_category`='$category',`course_fee`='$fee',`trainer`='$trainer',`course_thumbnail`='$fileNewName',`course_desc`='$details' WHERE `course_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // update course without photo
    public function update_course_out_photo($id,$title,$category,$fee,$trainer,$details,$oldphoto)
    {
        $this->sql = "UPDATE `courses` SET `course_title`='$title',`course_category`='$category',`course_fee`='$fee',`trainer`='$trainer',`course_thumbnail`='$oldphoto',`course_desc`='$details' WHERE `course_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // total course
    public function total_course()
    {
        $this->sql = "SELECT * FROM `courses`";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result->num_rows;
        }else{
            return false;
        }
    }
    // delete course
    public function delete_course($id)
    {
        $this->sql = "DELETE FROM `courses` WHERE course_id = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // get category wise course
    public function get_category_wise_course($course_id)
    {
        $this->sql = "SELECT * FROM courses AS c INNER JOIN course_category AS cc ON c.course_category = cc.course_category_id INNER JOIN trainers AS t ON c.trainer = t.trainer_id WHERE cc.course_category_id = '$course_id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }

    // ? ========== student count =============
    // total student
    public function total_student()
    {
        $this->sql = "SELECT * FROM `students`";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result->num_rows;
        }else{
            return false;
        }
    }
    // ? ================ Events Section ===============
    // insert events
    public function insert_events($title,$description,$fileNewName)
    {
        $this->sql = "INSERT INTO `events`(`event_title`, `event_img`, `event_desc`) VALUES ('$title','$fileNewName','$description')";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // total events desc
    public function get_total_events()
    {
        $this->sql = "SELECT * FROM `events` ORDER BY event_id DESC";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // get events with id
    public function get_events_id($id)
    {
        $this->sql = "SELECT * FROM `events` WHERE event_id ='$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result;
        }else{
            return false;
        }
    }
    // delete events with id
    public function delete_event($id)
    {
        $this->sql = "DELETE FROM `events` WHERE event_id ='$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // get total events number
    public function get_total_events_number()
    {
        $this->sql = "SELECT * FROM `events`";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return $this->result->num_rows;
        }else{
            return false;
        }
    }
    // update events with photo
    public function update_events_photo($id,$title,$desc,$fileNewName)
    {
        $this->sql = "UPDATE `events` SET `event_title`='$title',`event_img`='$fileNewName',`event_desc`='$desc' WHERE `event_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // update events with out photo
    public function update_events__without_photo($id,$title,$desc,$oldphoto)
    {
        $this->sql = "UPDATE `events` SET `event_title`='$title',`event_img`='$oldphoto',`event_desc`='$desc' WHERE `event_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if($this->result == true){
            return true;
        }else{
            return false;
        }
    }
    // ? ==================== Pricing Section ====================
    // insert pricing plan data
    public function insert_pricing_plan($pricing_title,$pricing_amount,$description) {
        $this->sql = "INSERT INTO `pricing`(`pricing_title`, `pricing_price`, `pricing_desc`) VALUES ('$pricing_title','$pricing_amount','$description')";
        $this->result = $this->conn->query($this->sql);
        if ($this->result == true) {
            return true;
        } else {
            return false;
        }
    }
    // get total pricing
    public function get_total_pricing() {
        $this->sql = "SELECT * FROM `pricing`";
        $this->result = $this->conn->query($this->sql);
        if ($this->result == true) {
            return $this->result;
        } else {
            return false;
        }
    }
    // free pricing
    public function free_pricing() {
        $this->sql = "SELECT * FROM `pricing` WHERE `pricing_id` = 1";
        $this->result = $this->conn->query($this->sql);
        if ($this->result == true) {
            return $this->result;
        } else {
            return false;
        }
    }
    // business pricing
    public function business_pricing() {
        $this->sql = "SELECT * FROM `pricing` WHERE `pricing_id` = 2";
        $this->result = $this->conn->query($this->sql);
        if ($this->result == true) {
            return $this->result;
        } else {
            return false;
        }
    }
    // developer pricing
    public function developer_pricing() {
        $this->sql = "SELECT * FROM `pricing` WHERE `pricing_id` = 3";
        $this->result = $this->conn->query($this->sql);
        if ($this->result == true) {
            return $this->result;
        } else {
            return false;
        }
    }
     // ultimate pricing
     public function ultimate_pricing() {
        $this->sql = "SELECT * FROM `pricing` WHERE `pricing_id` = 4";
        $this->result = $this->conn->query($this->sql);
        if ($this->result == true) {
            return $this->result;
        } else {
            return false;
        }
    }
    // edit pricing plan with id
    public function get_pricing_with_id($id) {
        $this->sql = "SELECT * FROM `pricing` WHERE `pricing_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if ($this->result == true) {
            return $this->result;
        } else {
            return false;
        }
    }
    // update pricing plan with id
    public function update_pricing_with_id($id,$title,$price,$desc) {
        $this->sql = "UPDATE `pricing` SET `pricing_title`='$title',`pricing_price`='$price',`pricing_desc`='$desc' WHERE `pricing_id` = '$id'";
        $this->result = $this->conn->query($this->sql);
        if ($this->result == true) {
            return true;
        } else {
            return false;
        }
    }
    // ?============ Location Section ================
    // insert location
    public function insert_location($title,$link) {
        $this->sql = "INSERT INTO `location`(`location_title`, `location_link`) VALUES ('$title','$link')";
        $this->result = $this->conn->query($this->sql);
        if ($this->result == true) {
            return true;
        } else {
            return false;
        }
    }
    // get location
    public function get_location() {
        $this->sql = "SELECT * FROM `location` LIMIT 1";
        $this->result = $this->conn->query($this->sql);
        if ($this->result == true) {
            return $this->result;
        } else {
            return false;
        }
    }


    // close connection
    public function __destruct()
    {
        $this->conn->close();
    }
}
?>