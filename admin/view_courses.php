<?php
$page = "courses";
$sub_page = "view_courses";
include "header.php";
$result = $obj->get_course_info();
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
                            <th>Category</th>
                            <th>Course Fee</th>
                            <th>Trainer</th>
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
                                                <img src="<?php echo "uploads/courses/".$row->course_thumbnail; ?>" alt="" class="img-fluid" width="100px">
                                            </td>
                                            <td><?php echo $row->course_title; ?></td>
                                            <td><?php echo $row->course_category_name; ?></td>
                                            <td><?php echo $row->course_fee; ?></td>
                                            <td><?php echo $row->trainer_name; ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="edit_course.php?id=<?php echo $row->course_id; ?>"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="details_course.php?id=<?php echo $row->course_id; ?>"><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a onclick="javascript:return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="delete_course.php?id=<?php echo $row->course_id; ?>"><i class="fa fa-trash"></i></a>
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