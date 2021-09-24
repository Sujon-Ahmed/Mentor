<?php
$page = "banner";
$sub_page = "view_banner";
include "header.php";
$result = $obj->banner_details();
?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">View Banner</h1>
<p class="mb-4">Dashboard / Banner / View</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">View Banner</h6>
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
                                        <td><?php echo $row->banner_title; ?></td>
                                        <td>
                                            <a target="_blank" href="<?php echo "uploads/banner/".$row->banner_img; ?>">
                                                <img src="<?php echo "uploads/banner/".$row->banner_img; ?>" class="img-fluid" width="150px" alt="">
                                            </a>
                                        </td>
                                        <td><?php echo date('M-d-Y h:i A',strtotime($row->banner_created_at)); ?></td>
                                        <td class="text-center"><a title="Edit" href="#" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a></td>
                                        <td class="text-center"><a title="Details" href="#" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a></td>
                                        <td class="text-center"><a title="Delete" href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                <?php
                                $si++;
                            }
                        }
                    ?>
                    <!-- <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
<?php include "footer.php"; ?>