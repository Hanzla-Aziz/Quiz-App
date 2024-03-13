<?php
    include_once 'inc/session.php';
    include_once 'inc/db.php';   
    if (!isset($_SESSION['username'])) {
        header('Location: user-logout.php');
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
                                   <h3>Change Password</h3>
                                    
                                </div>
                               <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" method="post" action="">
                                            <input type="hidden" name="user-id" class="form-control" value="<?php echo  $_SESSION['user_id']?>" id="" readonly>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <input type="text"  class="form-control" placeholder="Current Password" name="curr-password" required>
                                                            <label for="category-name-column">Current Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <input type="password"  class="form-control" placeholder="New Password" name="new-password" required>
                                                            <label for="category-name-column">New Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light" name="pass_update">Update</button>
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

<!-- PASSWORD UPDATE -->
<?php
if (isset($_POST['pass_update']) ) {
$update_password = md5($_POST['curr-password']);
if($update_password == $_SESSION['password']){
$user_id = $_SESSION['user_id'];
$newpassword = $_POST['new-password'];
$newpassword = md5($newpassword);
$sql = "UPDATE `users` SET `password` ='$newpassword' WHERE `id` = '$user_id'";

if (mysqli_query($conn, $sql)) {
$_SESSION['password'] = $newpassword;
echo'
                    <script type="text/javascript">
                    $(document).ready(function(){
                      swal.fire({
                        title: "Good job!",
                        text: "Password Updated successfully.",
                        type: "success",
                        confirmButtonClass: "btn btn-primary",
                        buttonsStyling: false,
                      }).then(function(){ 
                           window.location = "index.php";
                        });
                    });
                    </script>
                  ';
} else {
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
else{
   echo'
                    <script type="text/javascript">
                    $(document).ready(function(){
                      swal.fire({
                        title: "Oops.!",
                        text: "Current Password Is Incorrect",
                        icon: "error",
                        confirmButtonClass: "btn btn-primary",
                        buttonsStyling: false,
                      })
                    });
                    </script>
                  ';
}
}

?>
