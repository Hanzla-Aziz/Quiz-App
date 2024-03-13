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

<?php $currentPage = 'add-quiz'; ?>
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
                                    <h4 class="card-title">Add Quiz</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" method="post" action="">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <select class="custom-select" required="" name="category_id_val">
                                                                <option hidden="" value="">Choose Category</option>
                                                                <?php
                                                                $query = "SELECT t1.category_id,t1.category_name FROM category t1 LEFT JOIN quiz t2 ON t2.category_id = t1.category_id WHERE t2.category_id IS NULL;";
                                                                $runQuery = mysqli_query($conn, $query);
                                                                    
                                                                if(mysqli_num_rows($runQuery) > 0){
                                                                    while($row = mysqli_fetch_array($runQuery)){
                                                                ?>
                                                                <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                                                                <?php
                                                        }
                                                        }
                                                    ?>
                                                            </select>

                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <input type="text"  class="form-control" placeholder="Number of Questions" name="no_of_question" id="" required>
                                                            <label for="category-name-column">Number of Questions</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-label-group">
                                                            <input type="number" min="0"  class="form-control" placeholder="Minutes" name="minutes"  required>
                                                            <label for="category-name-column">Minutes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-label-group">
                                                            <input type="number" min="0"  class="form-control" placeholder="Seconds" name="seconds"  required>
                                                            <label for="category-name-column">Seconds</label>
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
        $c_id = $_POST['category_id_val'];
        $no_of_question = $_POST['no_of_question'];
        $min = $_POST['minutes'];
        $sec = $_POST['seconds'];
        $timer = $min.':'.$sec;
        
            
            $query2 = "INSERT INTO `quiz`(`category_id`, `no_of_question`, `timing`, `created_at`) VALUES ('$c_id', '$no_of_question','$timer', CURRENT_TIMESTAMP)";


            $runQuery2 = mysqli_query($conn, $query2);
            
            if($runQuery2){
              echo'
                    <script type="text/javascript">
                    $(document).ready(function(){
                      swal.fire({
                        title: "Good job!",
                        text: "New Quiz Has Been Added Successfully.",
                        type: "success",
                        confirmButtonClass: "btn btn-primary",
                        buttonsStyling: false,
                      }).then(function(){ 
                           window.location = "add-quiz.php";
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
    /* Add category Code Ending */

?>