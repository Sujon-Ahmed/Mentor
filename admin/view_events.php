<?php
$page = "events";
$sub_page = "view_events";
include "header.php";
$result = $obj->get_total_events();
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
    <h1 class="h3 mb-2 text-gray-800">View Trainers</h1>
    <p class="mb-4">Dashboard / View Trainers</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Trainers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Time</th>
                            <th>Edit</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result->num_rows > 0){
                                $si = 1;
                                while($row = $result->fetch_object()){
                                    ?>
                                        <tr>
                                            <td><?php echo $si; ?></td>
                                            <td>
                                                <img src="<?php echo "uploads/events/".$row->event_img; ?>" class="img-fluid" width="100px" alt="">
                                            </td>
                                            <td><?php echo $row->event_title; ?></td>
                                            <td>
                                                <?php
                                                    $details = $row->event_desc;
                                                    if(strlen($details) > 200){
                                                        echo substr($details,0,200).'...';
                                                    }else{
                                                        echo $details;
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo date('D F j, Y, g:i a',strtotime($row->event_time)); ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="edit_events.php?id=<?php echo $row->event_id; ?>"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="details_events.php?id=<?php echo $row->event_id; ?>"><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a onclick="javascript:return confirm('Are You Sure?')" class="btn btn-danger btn-sm" href="delete_events.php?id=<?php echo $row->event_id; ?>"><i class="fa fa-trash"></i></a>
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