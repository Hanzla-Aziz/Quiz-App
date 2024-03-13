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

<?php $currentPage = 'add-category'; ?>
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

            <!-- Form Start -->
            <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Category</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" method="post" action="">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <input type="text"  class="form-control" placeholder="Category Name" name="category_name" required>
                                                            <label for="category-name-column">Category Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light" name="add_category_btn">Add</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form End -->


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
  /* Add category Code Starting */
    if(isset($_POST['add_category_btn'])){
        $categoryName = $_POST['category_name'];
        $query1 = "SELECT * FROM `category` WHERE category_name = '$categoryName'";
        $runQuery1 = mysqli_query($conn, $query1);

        if(mysqli_num_rows($runQuery1) > 0){
          echo'
                <script type="text/javascript">
                $(document).ready(function(){
                  swal.fire({
                    title: "Oops!",
                    text: "Category is already exist.!",
                    icon: "warning",
                    type: "info",
                    confirmButtonClass: "btn btn-primary",
                    buttonsStyling: false,
                  })
                });
                </script>
              ';
        }
        else{
            
            $query2 = "INSERT INTO `category` (`category_id`, `category_name`, `created_at`) VALUES (NULL, '$categoryName', CURRENT_TIMESTAMP)";


            $runQuery2 = mysqli_query($conn, $query2);
            
            if($runQuery2){
              echo'
                    <script type="text/javascript">
                    $(document).ready(function(){
                      swal.fire({
                        title: "Good job!",
                        text: "New category has been added successfully.",
                        type: "success",
                        confirmButtonClass: "btn btn-primary",
                        buttonsStyling: false,
                      })
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
    }
    /* Add category Code Ending */

?>