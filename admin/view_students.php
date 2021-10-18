<?php
$page = "students";
$sub_page = "view_students";
include "header.php";
$result = $obj->get_students_join();
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
    <h1 class="h3 mb-2 text-gray-800">View Students</h1>
    <p class="mb-4">Dashboard / View Students</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Students</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Gmail</th>
                            <th>Course Name</th>
                            <th>Admission Date</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result->num_rows > 0){
                                $si =1 ;
                                while($row = $result->fetch_object()){
                                    ?>
                                        <tr>
                                            <td><?php echo $si; ?></td>
                                            <td>
                                                <img src="<?php echo "uploads/students/".$row->student_img; ?>" alt="" class="img-fluid" width="100px">
                                            </td>
                                            <td><?php echo $row->student_name; ?></td>
                                            <td><?php echo $row->student_gmail; ?></td>
                                            <td><?php echo $row->course_category_name; ?></td>
                                            <td><?php echo $row->admintion_time; ?></td>
                                            <!-- delete student info -->
                                            <td class="text-center"><a title="Delete" href="#?id=<?php echo $row->student_id; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
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