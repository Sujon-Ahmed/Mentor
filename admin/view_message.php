<?php
$page = 'message';
$sub_page = 'view_message';
include 'header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $obj->view_message_with_id($id);
    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            $id = $row->contact_id;
            $name = $row->contact_name;
            $email = $row->contact_email;
            $subject = $row->contact_subject;
            $message = $row->contact_message;
            $time = date('M-d-Y h:i A',strtotime($row->contact_msg_time));
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Message Details</h1>
    <p class="mb-4">Dashboard / Message / Details</p>
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">MessageID <span class="badge bg-primary text-light"># <?php echo $id; ?></span></h6>
                <a href="view_contact_message.php" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h5><span class="text-primary">Name :</span> <?php echo $name ?></h5>
                    <p><span class="text-primary">E-mail :</span> <?php echo $email; ?></p>
                    <p><span class="text-primary">Subject :</span> <?php echo $subject; ?></p>
                    <p><i><span class="text-primary">Message :</span> <?php echo $message; ?></i></p>
                    <p><span class="text-primary">Time :</span> <?php echo $time; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>