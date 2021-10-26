</div>
            <!-- // END header-layout -->

        </div>
        <!-- // END drawer-layout__content -->

        
        <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
            <div class="mdk-drawer__content">
                <div class="sidebar sidebar-dark sidebar-left bg-dark-gray" data-perfect-scrollbar>

                    <div class="d-flex align-items-center sidebar-p-a sidebar-account flex-shrink-0">
                        <a href="admin/dashboard/" class="flex d-flex align-items-center text-underline-0">
                            <span class="mr-3">
                                <!-- LOGO -->
                                <img src="assets/images/logos/icon_logoo.png" alt="">
                            </span>
                            <span class="flex d-flex flex-column">
                                <span class="sidebar-brand">3T IMPEX</span>
                                <small>Global Trade Tutors</small>
                            </span>
                        </a>
                    </div>


                    <div class="sidebar-block p-0">
                        <ul class="sidebar-menu mt-0">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="admin/dashboard/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">star_half</i>
                                    <span class="sidebar-menu-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item ">
                                <a class="sidebar-menu-button" href="admin/student/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">people_outline</i>
                                    <span class="sidebar-menu-text">Students</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item ">
                                <a class="sidebar-menu-button" href="admin/courses/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">layers</i>
                                    <span class="sidebar-menu-text">Courses</span>
                                </a>
                            </li>
                           <?php /* <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="admin/register-course/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">people</i>
                                    <span class="sidebar-menu-text">Course Registration</span>
                                </a>
                            </li>*/?>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="admin/category/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person</i>
                                    <span class="sidebar-menu-text">Category Mgt</span>
                                </a>
                            </li>
                          
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="admin/exam">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">message</i>
                                    <span class="sidebar-menu-text">Exam Mgt</span>
                                </a>
                            </li>
                            <?php 
                    if(isset($_SESSION['super_admin'])){
                
                ?>
                            <li class="sidebar-menu-item ">
                                <a class="sidebar-menu-button" href="admin/schedule_exam">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i>
                                    <span class="sidebar-menu-text">Assign Exams </span>
                                </a>
                            </li>

                <?php }?>
                            <li class="sidebar-menu-item ">
                                <a class="sidebar-menu-button" href="admin/assignment-menu">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i>
                                    <span class="sidebar-menu-text">Assignment</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item ">
                                <a class="sidebar-menu-button" href="admin/schedule_list">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i>
                                    <span class="sidebar-menu-text">Exam Schedules </span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item ">
                                <a class="sidebar-menu-button" href="admin/message/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">forum</i>
                                    <span class="sidebar-menu-text">Discussions</span>
                                </a>
                            </li>
                          
                            <li class="sidebar-menu-item ">
                                <a class="sidebar-menu-button" href="admin/billing/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">monetization_on</i>
                                    <span class="sidebar-menu-text">Payments</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item ">
                                <a class="sidebar-menu-button" href="admin/news/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dns</i>
                                    <span class="sidebar-menu-text">News & Articles</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item ">
                                <a class="sidebar-menu-button" href="admin/products/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">shopping_cart</i>
                                    <span class="sidebar-menu-text">Product Store</span>
                                </a>
                            </li>

                            <?php 
                    if(isset($_SESSION['super_admin'])){
                
                ?>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="admin/admin/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">people</i>
                                    <span class="sidebar-menu-text">Admin Mgt</span>
                                </a>
                            </li>
                        <?php } ?>
                         


                           



                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="admin/logout">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">exit_to_app</i>
                                    <span class="sidebar-menu-text">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        