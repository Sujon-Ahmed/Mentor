<?php
$page = "features";
$sub_page = "view_course_features";
include "header.php";
$result = $obj->get_course_features();
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
    <h1 class="h3 mb-2 text-gray-800">View Features</h1>
    <p class="mb-4">Dashboard / Features / View</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Features</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created_at</th>
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
                                            <td><i class="<?php echo $row->course_features_icon; ?>"></i></td>
                                            <td><?php echo $row->course_features_title; ?></td>
                                            <td>
                                                <?php
                                                    $details = $row->course_features_desc;
                                                    if(strlen($details) > 50){
                                                        echo substr($details, 0, 50).'...';
                                                    }else{
                                                        echo $details;
                                                    }
                                                 ?>
                                            </td>
                                            <td><?php echo date("M-d-Y h:i A",strtotime($row->course_features_created)); ?></td>
                                            <!-- edit menu -->
                                            <td><a title="Edit" href="course_features_edit.php?id=<?php echo $row->course_features_id; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a></td>
                                            <!-- view menu -->
                                            <td><a title="View" href="course_features_details.php?id=<?php echo $row->course_features_id; ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a></td>
                                            <!-- delete menu -->
                                            <td><a title="Delete" href="course_features_delete.php?id=<?php echo $row->course_features_id; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
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