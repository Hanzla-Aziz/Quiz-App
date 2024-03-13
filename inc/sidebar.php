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
            <li class=" nav-item"><a href="#"><i class="feather icon-grid"></i><span class="menu-title" data-i18n="Dashboard">Category</span></a>
                    <ul class="menu-content">
                        <li class="<?php if($currentPage =='add-category'){echo 'active';}?>"><a href="add-category.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Add Category</span></a>
                        </li>
                        <li class="<?php if($currentPage =='manage-category'){echo 'active';}?>"><a href="manage-category.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Manage Category</span></a>
                        </li>
                    </ul>
                </li>  

                      <!-- Questions -->
                       <li class=" nav-item"><a href="#"><i class="feather icon-grid"></i><span class="menu-title" data-i18n="Dashboard">Questions</span></a>
                    <ul class="menu-content">
                        <li class="<?php if($currentPage =='add-question'){echo 'active';}?>"><a href="add-question.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Add Question</span></a>
                        </li>
                        <li class="<?php if($currentPage =='manage-question'){echo 'active';}?>"><a href="manage-question.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Manage Question</span></a>
                        </li>
                    </ul>
                </li> 
                      <!-- Questions -->

                      <!-- QUIZ -->
                       <li class=" nav-item"><a href="#"><i class="feather icon-grid"></i><span class="menu-title" data-i18n="Dashboard">Quiz</span></a>
                    <ul class="menu-content">
                        <li class="<?php if($currentPage =='add-quiz'){echo 'active';}?>"><a href="add-quiz.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Add Quiz</span></a>
                        </li>
                        <li class="<?php if($currentPage =='manage-quiz'){echo 'active';}?>"><a href="manage-quiz.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Manage Quiz</span></a>
                        </li>
                    </ul>
                </li> 
                      <!-- QUIZ -->
        </ul>
        </div>
    </div>
    <!-- END: Main Menu-->