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

<?php $currentPage = 'add-question'; ?>
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
                                    <h4 class="card-title">Add Question</h4>
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
                                                                $query = "SELECT * from category";
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
                                                            <input type="text"  class="form-control" placeholder="Question" name="question" required>
                                                            <label for="category-name-column">Question</label>
                                                        </div>
                                                    </div>

                                                    <!-- OPTIONS -->
                                                    <div class="col-1">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="correct_op1" name="correct_op" value="" required="">
                                                            <label class="custom-control-label" for="correct_op1">A</label>
                                                      </div>
                                                    </div>
                                                    <div class="col-11">
                                                        <div class="form-label-group">
                                                            <input type="text"  class="form-control" placeholder="Option A" name="op_a" id="option_1" required>
                                                            <label for="category-name-column">Option A</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="correct_op2" name="correct_op" value="" >
                                                            <label class="custom-control-label" for="correct_op2">B</label>
                                                      </div>
                                                    </div>
                                                    <div class="col-11">
                                                        <div class="form-label-group">
                                                            <input type="text"  class="form-control" placeholder="Option B" id="option_2" name="op_b" required>
                                                            <label for="category-name-column">Option B</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="correct_op3" name="correct_op" value="" >
                                                            <label class="custom-control-label" for="correct_op3">C</label>
                                                      </div>
                                                    </div>
                                                    <div class="col-11">
                                                        <div class="form-label-group">
                                                            <input type="text"  class="form-control" placeholder="Option C" id="option_3" name="op_c" required>
                                                            <label for="category-name-column">Option C</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="correct_op4" name="correct_op" value="" >
                                                            <label class="custom-control-label" for="correct_op4">D</label>
                                                      </div>
                                                    </div>

                                                    <div class="col-11">
                                                        <div class="form-label-group">
                                                            <input type="text"  class="form-control" placeholder="Option D" id="option_4" name="op_d" required>
                                                            <label for="category-name-column">Option D</label>
                                                        </div>
                                                    </div>
                                                    <!-- /OPTIONS -->
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light" id="add_question_btn" name="add_question_btn">Add</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                                    </div>
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
   
   <!-- Custom Jquery -->
   <script type="text/javascript">
    $(document).ready(function() {
          $("#add_question_btn").click(function() {
            var op1 = $('#option_1').val();
            var op2 = $('#option_2').val();
            var op3 = $('#option_3').val();
            var op4 = $('#option_4').val();
            $('#correct_op1').val(op1);
            $('#correct_op2').val(op2);
            $('#correct_op3').val(op3);
            $('#correct_op4').val(op4);

        })
    });
   </script>
   <!-- Custom Jquery -->
</body>
<!-- END: Body-->

</html>

<?php
  /* Add category Code Starting */
    if(isset($_POST['add_question_btn'])){
        $c_id = $_POST['category_id_val'];
        $question = $_POST['question'];
        $option_1 = $_POST['op_a'];
        $option_2 = $_POST['op_b'];
        $option_3 = $_POST['op_c'];
        $option_4 = $_POST['op_d'];
        $correct_ans = $_POST['correct_op'];

        $query2 = "INSERT INTO `questions`(`category_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_ans`, `created_at`) VALUES ('$c_id','$question','$option_1','$option_2','$option_3','$option_4','$correct_ans',CURRENT_TIMESTAMP)";


            $runQuery2 = mysqli_query($conn, $query2);
            
            if($runQuery2){
              echo'
                    <script type="text/javascript">
                    $(document).ready(function(){
                      swal.fire({
                        title: "Good job!",
                        text: "New Question Has Been Added Successfully.",
                        type: "success",
                        confirmButtonClass: "btn btn-primary",
                        buttonsStyling: false,
                      }).then(function(){ 
                           window.location = "add-question.php";
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