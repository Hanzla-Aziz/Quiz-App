<?php
    include_once 'inc/session.php';
    include_once 'inc/db.php';   

?>


<!-- Header Area Start -->
<?php include 'inc/user-header.php' ?>
<!-- Header Area End -->
<!-- BEGIN: Body-->


<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">




    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper" style="top: 0;">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include includes/mixins-->
				<a class="navbar-brand" href="select-quiz.php">
                        <div class="brand-logo"></div>
                        <h3 class="brand-text pt-1 text-primary font-weight-bold">Quiz App</h3>
                    </a>
				<?php
                    if (!isset($_SESSION['username'])) {
                    ?>
                <ul class="nav navbar-nav float-right">
                
                            <li class="nav-item d-none d-lg-block "><a class="nav-link" href="index.php" >Login</a></li>
                            <li class="nav-item d-none d-lg-block "><a class="nav-link" href="register.php" >Register</a></li>
                            <li class="nav-item d-none d-lg-block "><a class="nav-link" href="login.php" >Admin Login</a></li>
                        </ul>
                        <?php
                        }
                        else{
                    ?>

                        <ul class="nav navbar-nav float-right">
                            <li class="nav-item d-none d-lg-block "><a class="nav-link" href="user-done-quiz.php" >My Past Quizzes</a></li>
                            <li class="nav-item d-none d-lg-block "><a class="nav-link" href="change-password.php" >Change Password</a></li>
                            <li class="nav-item d-none d-lg-block "><a class="nav-link" href="user-logout.php" >Logout</a></li>
                        </ul>
                        <?php
                    }

                    ?>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                   
                    <div class="row match-height">
                        
						<div class="col-lg-8 col-12 m-auto">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                   
                                    
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <form action="" method="post">
                                                    <div class="form-label-group">
                                                        <input type="text" id="inputName" class="form-control" name="username" placeholder="Name" required>
                                                        <label for="inputName">Name</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required>
                                                        <label for="inputEmail">Email</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password" required>
                                                        <label for="inputConfPassword">Confirm Password</label>
                                                        <div  id="CheckPasswordMatch"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" checked>
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class=""> I accept the terms & conditions.</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <a href="index.php" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                                    <button type="submit" id="register" name="register" class="btn btn-primary float-right btn-inline mb-50">Register</button>
                                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>
						
                    </div>
                   
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <?php include 'inc/user-footer.php'; ?>
    <script type="text/javascript">
        function checkPasswordMatch() {

        var password = $("#inputPassword").val();
        var confirmPassword = $("#inputConfPassword").val();
        if (password != confirmPassword){
            $("#register").prop("type", "button");
            $("#CheckPasswordMatch").html("<p class='text-danger font-weight-bold mt-1'>Passwords does not match!</p>");
        }
        else{
            $("#register").prop("type", "submit");
            $("#CheckPasswordMatch").html("<p class='text-success font-weight-bold mt-1'>Passwords match.</p>");
        }
    }
    $(document).ready(function () {
        
       $("#inputConfPassword").keyup(checkPasswordMatch);
       $("#inputPassword").keyup(checkPasswordMatch);
    });
    </script>
</body>
<!-- END: Body-->

</html>

<?php
if(isset($_POST['register'])){
$username = strtolower($_POST['username']);
$email = $_POST['email'];
$pass = strtolower($_POST['password']);
$pass = md5($pass);
$query1 = "SELECT * FROM `users` WHERE email = '$email'";
                $runQuery1 = mysqli_query($conn, $query1);

                if(mysqli_num_rows($runQuery1) > 0){
                   echo'
                <script type="text/javascript">
                $(document).ready(function(){
                  swal.fire({
                    title: "Oops!",
                    text: "This Email already exist.!",
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

                    $query2 = "INSERT INTO `users`(`name`, `email`, `phone`, `password`, `role`, `is_active`, `created_at`) VALUES ('$username','$email',12345678,'$pass','user','1',CURRENT_TIMESTAMP)";
                    $result =  mysqli_query($conn, $query2);
                    if($result){
                        echo'
                    <script type="text/javascript">
                    $(document).ready(function(){
                      swal.fire({
                        title: "Good job!",
                        text: "Registered Successfully.",
                        type: "success",
                        confirmButtonClass: "btn btn-primary",
                        buttonsStyling: false,
                      }).then(function(){ 
                           window.location = "index.php";
                        });
                    });
                    </script>
                  ';
                    }

                    else{
                        $error = mysqli_error($conn);
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

?>
