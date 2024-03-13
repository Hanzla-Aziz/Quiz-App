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
<?php $currentPage = 'manage-quiz'; ?>
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
                                    <h4 class="card-title">Manage Quiz</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                        <?php
                                            $query = "SELECT * FROM quiz INNER JOIN category ON `quiz`.`category_id` = `category`.`category_id`";
                                            $runQuery = mysqli_query($conn, $query);
                                                
                                            if(mysqli_num_rows($runQuery) > 0){
                                            ?>
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.No</th>
                                                        <th>Category Name</th>
                                                        <th>No of Questions</th>
                                                        <th>Timer</th>
                                                        <th>Created_at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sr = 1;
                                                    while($row = mysqli_fetch_array($runQuery)){
                                                    $quiz_id = $row['quiz_id'];
                                                    $categoryName = $row['category_name'];
                                                    $no_of_question = $row['no_of_question'];
                                                    $timing = $row['timing'];
                                                    $createdAt = $row['created_at'];
                                                    $createdAt = strtotime($createdAt);
                                                    $createdAt =  date("Y-m-d ", $createdAt);
                                                ?>
                                                    <tr>
                                                        <td><?php if(isset($sr)){echo $sr; } ?></td>
                                                        <td><?php if(isset($categoryName)){echo $categoryName; } ?></td>
                                                        <td><?php if(isset($no_of_question)){echo $no_of_question; } ?></td>
                                                        <td><?php if(isset($timing)){echo $timing; } ?></td>
                                                        <td><?php if(isset($createdAt)){echo $createdAt; } ?></td>
                                                        
                                                        <td> &emsp;
                                                            <a href="manage-quiz.php?del_quiz=<?php echo $quiz_id; ?>"><i class="fa fa-trash-o fa-lg"></i></a>
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
    if(isset($_GET['del_quiz'])) {
        $quiz_id = $_GET['del_quiz'];
        $query3 = "DELETE FROM `quiz` WHERE quiz_id = '$quiz_id'";
        $runQuery3 = mysqli_query($conn, $query3);
            
            if($runQuery3){
              echo'
                    <script type="text/javascript">
                    $(document).ready(function(){
                      swal.fire({
                        title: "Good job!",
                        text: "Quiz Has Been Deleted successfully.",
                        type: "success",
                        confirmButtonClass: "btn btn-primary",
                        buttonsStyling: false,
                      }).then(function(){ 
                           window.location = "manage-quiz.php";
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