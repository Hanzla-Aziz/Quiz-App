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

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" onload="hidder();" style="background: #F4F4F4;">




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
                                   <h3>Select Quiz</h3>
                                    
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <center>
            <div class="time" id="navbar">Time left :<span id="timer"></span></div>
            <button class="btn btn-info m-2" id="mybut" onclick="myFunction()">START QUIZ</button>
        </center>
        <div id="myDIV" style="padding: 10px 30px;">
        <form action="" method="post" id="form"> 
        <table >
        <?php
        $cat_id = $_GET['cat_id'];
        $quiz_id = $_GET['quiz_id'];
        // QUERY 1
        $query1 = "SELECT * FROM quiz WHERE quiz_id = '$quiz_id'";
        $runQuery1 = mysqli_query($conn, $query1);
        $row1 = mysqli_fetch_array($runQuery1);
        $no_of_ques = $row1['no_of_question'];
        $settime = $row1['timing'];

        // QUERY 2
        $query = "SELECT * FROM questions WHERE `questions`.`category_id` = '$cat_id' ORDER BY RAND() LIMIT $no_of_ques";
        $runQuery = mysqli_query($conn, $query);
        $sr = 0;
        while($row = mysqli_fetch_array($runQuery)){
            ?>
            <tr ><td><h3><br><?php echo $sr +=1;?>&nbsp;-&nbsp;<?php echo $row['question'];?></h3></td></tr>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;a )&nbsp;&nbsp;&nbsp;<input  type="radio" name="<?php echo $sr;?>" value="<?php echo $row['option_a'];?>">&nbsp;<?php echo $row['option_a']; ?><br>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;b )&nbsp;&nbsp;&nbsp;<input  type="radio" name="<?php echo $sr;?>" value="<?php echo $row['option_b'];?>">&nbsp;<?php echo $row['option_b'];?></td></tr>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;c )&nbsp;&nbsp;&nbsp;<input  type="radio" name="<?php echo $sr;?>" value="<?php echo $row['option_c'];?>">&nbsp;<?php echo $row['option_c']; ?></td></tr>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;d )&nbsp;&nbsp;&nbsp;<input  type="radio" name="<?php echo $sr;?>" value="<?php echo $row['option_d'];?>">&nbsp;<?php echo $row['option_d']; ?><br><br><br></td></tr>
  <input type="hidden" name="correct_ans_<?php echo $sr;?>" value="<?php echo $row['correct_ans']; ?>">
            <?php
        }

        ?>
    </table>
    <input type="submit" name="submit_quiz" id="submit_quiz" value="Submit Quiz" class="btn btn-info">
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
        function myFunction() {
    var x = document.getElementById("myDIV");
    var b = document.getElementById("mybut");
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") { 
    b.style.visibility = 'hidden';
    x.style.display = "block";
    startTimer();
}
}
window.onload = function() {
  document.getElementById('myDIV').style.display = 'none';
};
document.getElementById('timer').innerHTML = '<?php echo $settime; ?>';
function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m==0 && s==0){$('#submit_quiz').trigger('click');;}
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
  if(sec == 0 && m == 0){ alert('stop it')};
}
window.onscroll = function() {myFun()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop -50;

function myFun() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
    </script>
</body>
<!-- END: Body-->

</html>

<?php 
if (isset($_POST['submit_quiz'])) {
    $correct_attemp = 0;
    $wrong_attemp = 0;
    $not_attempt = 0;
    $user_id = $_SESSION['user_id'];
    $cat_id = $_GET['cat_id'];
    $quiz_id = $_GET['quiz_id'];
    $no_of_ques = $row1['no_of_question'];

    for ($i=1; $i <= $sr ; $i++) { 

        if(!isset($_POST[$i])){
            $not_attempt += 1;
        }
        else if ($_POST[$i] == $_POST['correct_ans_'.$i]) {
        // echo 
        // '<script>
        // alert("Correct ANs ");
        // </script>';
            $correct_attemp += 1;
    }
        else{
            $wrong_attemp += 1;
            
        }
    }

    $query2 = "INSERT INTO `attempted_quiz`( `user_id`, `quiz_id`, `cat_id`, `no_of_question`, `correct_attempt`, `wrong_attemp`, `not_attempt`, `created_at`) VALUES ('$user_id','$quiz_id','$cat_id','$no_of_ques','$correct_attemp','$wrong_attemp','$not_attempt',CURRENT_TIMESTAMP)";


            $runQuery2 = mysqli_query($conn, $query2);
            
            if($runQuery2){
              echo'
                    <script type="text/javascript">
                    $(document).ready(function(){
                      swal.fire({
                        title: "Good job!",
                        text: "Quiz Submitted Successfully.",
                        html:"<h3>Quiz Submitted Successfully.</h3>"+"Correct Answers: <b>'.$correct_attemp.'</b>" + "<br>Wrong Answers: <b>'.$wrong_attemp.'</b>" + "<br>Not Attempt: <b>'.$not_attempt.'</b>",
                        type: "success",
                        confirmButtonClass: "btn btn-primary",
                        buttonsStyling: false,
                      }).then(function(){ 
                           window.location = "user-done-quiz.php";
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



?>