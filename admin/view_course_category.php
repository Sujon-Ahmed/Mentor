<?php
$page = "course_category";
$sub_page = "view_course_category";
include "header.php";
$result = $obj->get_course_category();
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
    <h1 class="h3 mb-2 text-gray-800">View Course Category</h1>
    <p class="mb-4">Dashboard / Course Category / View</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Course Category</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Icon</th>
                            <th>Category Name</th>
                            <th>Slag</th>
                            <th>Created_at</th>
                            <th>Edit</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result->num_rows > 0){
                                $si = 1;;
                                while($row = $result->fetch_object()){
                                    ?>
                                        <tr>
                                            <td><?php echo $si; ?></td>
                                            <td><i class="<?php echo $row->course_category_icon; ?>"></i></td>
                                            <td><?php echo $row->course_category_name; ?></td>
                                            <td><?php echo $row->slag; ?></td>
                                            <td><?php echo date('M-d-Y h:i A',strtotime($row->course_category_created)); ?></td>
                                            <!-- edit -->
                                            <td><a title="Edit" class="btn btn-primary btn-sm" href="edit_course_category.php?id=<?php echo $row->course_category_id; ?>"><i class="fas fa-edit"></i></a></td>
                                            <!-- view -->
                                            <td><a title="View" class="btn btn-success btn-sm" href="details_course_category.php?id=<?php echo $row->course_category_id; ?>"><i class="fas fa-eye"></i></a></td>
                                            <!-- delete -->
                                            <td><a onclick="javascript:return confirm('Are You Sure?')" title="Delete" class="btn btn-danger btn-sm" href="delete_course_category.php?id=<?php echo $row->course_category_id; ?>"><i class="fas fa-trash"></i></a></td>
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