<?php
$page = "about";
$sub_page = "view_about";
include "header.php";
$result = $obj->about_details();
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
    <h1 class="h3 mb-2 text-gray-800">View About</h1>
    <p class="mb-4">Dashboard / About / View</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View About</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Title</th>
                            <th>Image</th>
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
                                        <td><?php echo $row->about_title; ?></td>
                                        <td>
                                            <img src="<?php echo "uploads/about/".$row->about_image; ?>" class="img-fluid" width="100px" height="auto" alt="">
                                        </td>
                                        <td><?php echo date('M-d-Y h:i A',strtotime($row->about_created_at)); ?></td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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