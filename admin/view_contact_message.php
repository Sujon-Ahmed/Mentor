<?php
$page = "message";
$sub_page = "view_message";
include "header.php";
$result = $obj->get_all_message();
?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- toastr success message -->
    <?php
        if(isset($_SESSION['msg']['success'])){
            ?>
                <script>
                    toastr.success("<?php echo Flash_data::show_error(); ?>");
                </script>
            <?php
        }
    ?>
    <!-- toastr error message -->
    <?php
        if(isset($_SESSION['msg']['error'])){
            ?>
                <script>
                    toastr.error("<?php echo Flash_data::show_error(); ?>");
                </script>
            <?php
        }
    ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Message</h1>
    <p class="mb-4">Dashboard / View Message</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Message</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Subject</th>
                            <th>Time</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                        if ($result->num_rows > 0) {
                            $si = 1;
                            while ($row = $result->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $si; ?></td>
                                        <td><?php echo $row->contact_name; ?></td>
                                        <td><?php echo $row->contact_email; ?></td>
                                        <td><?php echo $row->contact_subject; ?></td>
                                        <td><?php echo date('M-d-Y h:i A',strtotime($row->contact_msg_time)); ?></td>
                                        <td>
                                            <a title="View" href="view_message.php?id=<?php echo $row->contact_id; ?>" class="btn btn-success btn-sm">View</a>
                                        </td>
                                        <td>
                                            <a title="Delete" onclick="javascript:return confirm('Are You Sure?')" href="delete_message.php?id=<?php echo $row->contact_id; ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                $si++;
                            }
                        }
                       ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include "footer.php"; ?>