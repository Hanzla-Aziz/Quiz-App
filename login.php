<?php
    include_once 'inc/session.php';
    include_once 'inc/db.php';   
//cehcking Isset
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
                if($db_user_role == 'admin'){
                    header("Location: admin/index.php");
                    $_SESSION['user_id'] = $db_user_id;
                    $_SESSION['username'] = $db_name;
                    $_SESSION['email'] = $db_email;
                    $_SESSION['password'] = $db_password;
                    $_SESSION['phone'] = $db_phone;
                    $_SESSION['user_role'] = $db_user_role;
                    $_SESSION['is_active'] = $db_is_active;
                    $_SESSION['is_login'] = 1;
                }
                elseif($db_user_role == 'user'){
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

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="app-assets/images/pages/login.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0 py-5">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Welcome back, please login to your account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form action="" method="POST">
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
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Remember me</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <!-- <div class="text-right"><a href="auth-forgot-password.html" class="card-link">Forgot Password?</a></div> -->
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-2" name="login_in_btn">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    
    <!-- Footer Area Start -->
   

    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <script src="app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
    <!-- Footer Area End -->
</body>
<!-- END: Body-->

</html>