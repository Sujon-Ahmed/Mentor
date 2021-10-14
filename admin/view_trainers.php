<?php
$page = "trainers";
$sub_page = "view_trainers";
include "header.php";
$result = $obj->get_trainers_join();
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
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Employed Time</th>
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
                                                <a href="#">
                                                    <img src="<?php echo "uploads/trainers/".$row->trainer_image; ?>" class="img-fluid" width="100px" alt="">
                                                </a>
                                            </td>
                                            <td><?php echo $row->trainer_name; ?></td>
                                            <td><?php echo $row->course_category_name; ?></td>
                                            <td><?php echo date("M-d-Y h:i A",strtotime($row->employed_time)); ?></td>
                                            <!-- edit -->
                                            <td>
                                                <a href="trainer_info_edit.php?id=<?php echo $row->trainer_id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <!-- view -->
                                            <td>
                                                <a href="trainer_info_view.php?id=<?php echo $row->trainer_id; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                            </td>
                                            <!-- delete -->
                                            <td>
                                                <a onclick="javascript:return confirm('Are You Sure?')" href="trainer_info_delete.php?id=<?php echo $row->trainer_id; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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