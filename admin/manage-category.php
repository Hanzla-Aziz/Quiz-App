<?php include '../inc/session.php'; ?>
<?php include 'inc/admin_session.php'; ?>
<?php include '../inc/db.php'; ?>
<!-- Header Area Start -->
<?php include '../inc/header.php' ?>
<!-- Header Area End -->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
   <?php include '../inc/topbar.php'; ?>
    <!-- END: Header-->
<?php $currentPage = 'manage-category'; ?>
<?php include '../inc/sidebar.php'; ?>
    <!-- BEGIN: Main Menu-->
   
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">  

                 <!-- Zero configuration table -->
                 <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Manage Category</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                        <?php
                                            $query = "SELECT * from category";
                                            $runQuery = mysqli_query($conn, $query);
                                                
                                            if(mysqli_num_rows($runQuery) > 0){
                                            ?>
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.No</th>
                                                        <th>Name</th>
                                                        <th>Created_at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sr = 1;
                                                    while($row = mysqli_fetch_array($runQuery)){
                                                    $categoryId = $row['category_id'];
                                                    $categoryName = $row['category_name'];
                                                    $createdAt = $row['created_at'];
                                                    $createdAt = strtotime($createdAt);
                                                    $createdAt =  date("Y-m-d ", $createdAt);
                                                ?>
                                                    <tr>
                                                        <td><?php if(isset($sr)){echo $sr; } ?></td>
                                                        <td><?php if(isset($categoryName)){echo $categoryName; } ?></td>
                                                        <td><?php if(isset($createdAt)){echo $createdAt; } ?></td>
                                                        
                                                        <td><a href="edit-category.php?edit_c=<?php echo $categoryId; ?>"><i class="fa fa-pencil fa-lg"></i></a> &emsp;
                                                            <a href="manage-category.php?del_c=<?php echo $categoryId; ?>"><i class="fa fa-trash-o fa-lg"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        $sr = $sr + 1;
                                                        }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Sr.No</th>
                                                        <th>Name</th>
                                                        <th>Created_at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <?php
                }
                else {
                    echo "<center><h4>No Data Found!</h4></center>";    
                }
            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <!--/ Zero configuration table -->

            </div>  

            </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- Footer Area Start -->
    <?php include '../inc/footer.php' ?>
    <!-- Footer Area End -->
</body>
<!-- END: Body-->

</html>


<?php 

    /* Delete category Code Starting */
    if(isset($_GET['del_c'])) {
        $c_id = $_GET['del_c'];
        $query3 = "DELETE FROM `category` WHERE category_id = '$c_id'";
        $runQuery3 = mysqli_query($conn, $query3);
            
            if($runQuery3){
              echo'
                    <script type="text/javascript">
                    $(document).ready(function(){
                      swal.fire({
                        title: "Good job!",
                        text: "category has been Deleted successfully.",
                        type: "success",
                        confirmButtonClass: "btn btn-primary",
                        buttonsStyling: false,
                      }).then(function(){ 
                           window.location = "manage-category.php";
                        });
                    });
                    </script>
                  ';
            }
            
            else{
                //echo $error = mysqli_connect_error();
                $error = mysqli_error($conn);
                // echo '<script>alert("'.$error.'");</script>';

                echo'
                    <script type="text/javascript">
                    $(document).ready(function(){
                      swal.fire({
                        title: "Oops.!",
                        text: "'.$error.'",
                        icon: "error",
                        confirmButtonClass: "btn btn-primary",
                        buttonsStyling: false,
                      })
                    });
                    </script>
                  ';
            }
        
    }
    /* Delete category Code Ending */
?>