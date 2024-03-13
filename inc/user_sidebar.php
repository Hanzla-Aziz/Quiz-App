 <!-- BEGIN: Main Menu-->
 <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Quiz App</h2>
                    </a></li>
             </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="#"><i class="feather icon-grid"></i><span class="menu-title" data-i18n="Dashboard">Quizzes</span></a>
                    <ul class="menu-content">
                        <li class="<?php if($currentPage =='new-quiz'){echo 'active';}?>"><a href="new-quiz.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">New Quizzes</span></a>
                        </li>
                        <li class="<?php if($currentPage =='user-done-quiz'){echo 'active';}?>"><a href="user-done-quiz.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">My Quizzes</span></a>
                        </li>
                    </ul>
                </li>  


                     
        </ul>
        </div>
    </div>
    <!-- END: Main Menu-->