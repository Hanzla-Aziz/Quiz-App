<?php
    include_once 'inc/session.php';
    include_once 'inc/db.php';   

    if(isset($_POST['login_in_btn'])){

      

        $username = mysqli_real_escape_string($conn, strtolower($_POST['username']));
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        $query = "SELECT * FROM users WHERE email = '$username' AND is_active = 1";
        $runQuery = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($runQuery) > 0){
          
            
            $row = mysqli_fetch_array($runQuery);
            
            $db_user_id = $row['id'];
            $db_name = $row['name'];
            $db_email = $row['email'];
            $db_phone = $row['phone'];
            $db_password = $row['password'];
            $db_user_role = $row['role'];


            $db_is_active = $row['is_active'];
            
            $password = md5($password);  
            
            if($username == $db_email && $password == $db_password){
              echo '<script>alert("working")</script>';
                if($db_user_role == 'user'){
                    header("Location: select-quiz.php");
                    $_SESSION['user_id'] = $db_user_id;
                    $_SESSION['username'] = $db_name;
                    $_SESSION['email'] = $db_email;
                    $_SESSION['password'] = $db_password;
                    $_SESSION['phone'] = $db_phone;
                    $_SESSION['user_role'] = $db_user_role;
                    $_SESSION['is_active'] = $db_is_active;
                    $_SESSION['is_login'] = 1;
                }
                
            }
            else{
                $error = "User Credentials Invalid..!";
                echo '<script>alert("'.$error.'")</script>';

            }
            
        }
        else{
            $error = "User not found..!";
            echo '<script>alert("'.$error.'")</script>';
        }
                                              
    }
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
                                    <form action="" method="POST" class="mx-lg-5 px-lg-5">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" id="user-name" name="username" placeholder="Username" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Username</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="user-password" name="password" placeholder="Password" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                                  
                                                    <a href="register.php" class="btn btn-outline-primary float-left btn-inline mb-2">Register</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-2" name="login_in_btn">Login</button>
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

</body>
<!-- END: Body-->

</html>