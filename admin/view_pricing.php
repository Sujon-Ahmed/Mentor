<?php
$page = "pricing";
$sub_page = "view_pricing";
include "header.php";
$result = $obj->get_total_pricing();
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
    <h1 class="h3 mb-2 text-gray-800">View Pricing</h1>
    <p class="mb-4">Dashboard / View Pricing</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Pricing</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Edit</th>
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
                                            <td><?php echo $row->pricing_title; ?></td>
                                            <td><?php echo $row->pricing_price; ?></td>
                                            <td><?php echo $row->pricing_desc; ?></td>
                                            <!-- edit button -->
                                            <td>
                                                <a href="edit_pricing.php?id=<?php echo $row->pricing_id; ?>" class="btn btn-success btn-sm" title="Edit">Edit</a>
                                            </td>
                                            <!-- delete button -->
                                            <td>
                                                <a href="delete_pricing.php?id=<?php echo $row->pricing_id; ?>" class="btn btn-danger btn-sm" title="Edit">Delete</a>
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