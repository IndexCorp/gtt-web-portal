
 <?php
  include_once('../../config/init.php');
  include_once('../../config/configuration.php');
 $id = $_GET['id'];
 $back = $_GET['back'];

   
            $edit_content = $getFromCourse->get_single('course_content', $id);

?>  








<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
<base href="<?=BASE_URL?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">



    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

    <!-- ion Range Slider -->
    <link type="text/css" href="assets/css/vendor-ion-rangeslider.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-ion-rangeslider.rtl.css" rel="stylesheet">


    <!-- Global site tag (gtag.js) - Google Analytics
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115115077-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-115115077-4');
    </script>



     Facebook Pixel Code 
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '340571383230227');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=340571383230227&amp;ev=PageView&amp;noscript=1" /></noscript>
    End Facebook Pixel Code -->




    <!-- Flatpickr -->
    <link type="text/css" href="assets/css/vendor-flatpickr.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">

    <!-- Vector Maps -->
    <link type="text/css" href="assets/vendor/jqvmap/jqvmap.min.css" rel="stylesheet">



</head>

<body class="layout-default">











    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>
        <div class="mdk-drawer-layout__content">

            <!-- Header Layout -->
            <div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>

                <!-- Header -->

                <div id="header" class="mdk-header js-mdk-header m-0" data-fixed data-effects="waterfall" data-retarget-mouse-scroll="false">
                    <div class="mdk-header__content">

                        <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-primary pl-md-0 pr-0" id="navbar" data-primary>
                            <div class="container-fluid page__container pr-0">

                                <!-- Navbar toggler -->
                                <button class="navbar-toggler navbar-toggler-custom  d-lg-none d-flex mr-navbar" type="button" data-toggle="sidebar">
                                    <span class="material-icons icon-14pt">menu</span>
                                </button>


                                <form class="ml-auto search-form search-form--light d-none d-sm-flex flex" action="https://educate.frontted.com/index.html">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button class="btn" type="submit"><i class="material-icons">search</i></button>
                                </form>


                                <ul class="nav navbar-nav d-none d-md-flex">
                                    <li class="nav-item dropdown">
                                        <a href="#notifications_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                            <i class="material-icons nav-icon navbar-notifications-indicator">notifications</i>
                                        </a>
                                        <div id="notifications_menu" class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
                                            <div class="dropdown-item d-flex align-items-center py-2">
                                                <span class="flex navbar-notifications-menu__title m-0">Notifications</span>
                                                <a href="javascript:void(0)" class="text-muted"><small>Clear all</small></a>
                                            </div>
                                            <div class="navbar-notifications-menu__content" data-perfect-scrollbar>
                                                <div class="py-2">

                                                    <div class="dropdown-item d-flex">
                                                        <div class="mr-3">
                                                            <div class="avatar avatar-xs">
                                                                <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                            </div>
                                                        </div>
                                                        <div class="flex">
                                                            <a href="#"></a> responded to the open <a href="#">ticket</a><br>
                                                            <small class="text-muted">1 minute ago</small>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="dropdown-item d-flex">
                                                        <div class="mr-3">
                                                            <a href="#">
                                                                <div class="avatar avatar-xs">
                                                                    <span class="avatar-title bg-primary rounded-circle"><i class="material-icons icon-16pt">assessment</i></span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="flex">
                                                            2 New CITP <a href="#">enrolees</a> have been added<br>
                                                            <small class="text-muted">1 hour ago</small>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="dropdown-item text-center navbar-notifications-menu__footer">View All</a>
                                        </div>
                                    </li>
                                    
                                </ul>

                                <div class="dropdown">
                                    <a href="#" data-toggle="dropdown" data-caret="false" class="dropdown-toggle navbar-toggler navbar-toggler-dashboard border-left d-flex align-items-center ml-navbar">
                                        <span class="material-icons">laptop</span> Admin
                                    </a>
                                    <div id="company_menu" class="dropdown-menu dropdown-menu-right navbar-company-menu">
                                        <div class="dropdown-item d-flex align-items-center py-2 navbar-company-info py-3">

                                            <span class="mr-3">
                                                <img src="assets/images/frontted-logo-blue.svg" width="43" height="43" alt="avatar">
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                <strong class="h5 m-0"><?=$_SESSION['fname'].' '.$_SESSION['sname'];?>.</strong>
                                                <small class="text-muted text-uppercase"><?=$_SESSION['fname'];?></small>
                                            </span>

                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item d-flex align-items-center py-2" href="admin/dashboard/">
                                            <span class="material-icons mr-2">account_circle</span> Edit Account
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center py-2" href="admin/dashboard/">
                                            <span class="material-icons mr-2">settings</span> Settings
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center py-2" href="admin/logout/">
                                            <span class="material-icons mr-2">exit_to_app</span> Logout
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- // END Header -->


















































   <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Edit Course Content</h1>
      
    </div>
    <div class="mb-1 ml-5">
        <a href="admin/new_course/<?=@$back;?>" class="badge badge-dark-gray text-white" onclick="goBack()">Go Back</a>
    </div>
</div>


<div class="container page__container">
    <div class="tab-content">
       
        <div class="tab-pane active show fade" id="c-pricing">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text"  class="form-control" name="title" id="exampleInputEmail1" value="<?=@$edit_content->title;?>" placeholder="Enter course Title ..">
                    <input type="hidden" class="form-control" name="id" id="exampleInputEmail1" value="<?=@$edit_content->id;?>" >
                     <input type="hidden" class="form-control" name="back" id="exampleInputEmail1" value="<?=@$back;?>" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Content Link</label>
                    <textarea class="form-control"  name="link"  id="exampleInputPassword1"><?=@$edit_content->link;?></textarea>
                </div>
                <div class="form-group" data-select2-id="17">
                    <label for="select01">Content Type</label>
                    <select id="select01" name="content_type" required data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                       
                         <option value="<?=@$edit_content->type;?>"><?=@$edit_content->type;?></option>
                        
                        <option value="Video">Video</option>
                        <option value="Audio">Audio</option>
                    </select>
                </div>
               
                <div class="form-group">
                    <label for="exampleInputPassword1">Content Duration</label>
                    <input class="form-control" type="text"  name="duration"  id="exampleInputPassword1" placeholder="Enter Duration" value="<?=@$edit_content->duration;?>">
                </div>
                
                <input name="update_course_content_page" value="Update"  type="submit" class="btn btn-warning">
            </form>
        </div>
        
    </div>
</div>

</div>
<!-- // END content -->






































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
                            <li class="sidebar-menu-item  <?=@dashboard;?>">
                                <a class="sidebar-menu-button" href="admin/dashboard/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">star_half</i>
                                    <span class="sidebar-menu-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?=@student;?>">
                                <a class="sidebar-menu-button" href="admin/student/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">people_outline</i>
                                    <span class="sidebar-menu-text">Students</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?=@courses;?>">
                                <a class="sidebar-menu-button" href="admin/courses/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">layers</i>
                                    <span class="sidebar-menu-text">Courses</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="admin/register-course/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">people</i>
                                    <span class="sidebar-menu-text">Course Registration</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="admin/category/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person</i>
                                    <span class="sidebar-menu-text">Category Mgt</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?=@result;?>">
                                <a class="sidebar-menu-button" href="admin/result">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">insert_chart</i>
                                    <span class="sidebar-menu-text">Results</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?=@assignment;?>">
                                <a class="sidebar-menu-button" href="admin/assignment">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i>
                                    <span class="sidebar-menu-text">Assignment & Exams</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?=@chat;?>">
                                <a class="sidebar-menu-button" href="admin/chat/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">forum</i>
                                    <span class="sidebar-menu-text">Discussions</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?=@account;?>">
                                <a class="sidebar-menu-button" href="admin/account/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">message</i>
                                    <span class="sidebar-menu-text">Inbox</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?=@billing;?>">
                                <a class="sidebar-menu-button" href="admin/billing/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">monetization_on</i>
                                    <span class="sidebar-menu-text">Payments</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?=@news;?>">
                                <a class="sidebar-menu-button" href="admin/news/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dns</i>
                                    <span class="sidebar-menu-text">News & Articles</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?=@store;?>">
                                <a class="sidebar-menu-button" href="admin/store/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">shopping_cart</i>
                                    <span class="sidebar-menu-text">Product Store</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="admin/admin/">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">people</i>
                                    <span class="sidebar-menu-text">Admin Mgt</span>
                                </a>
                            </li>


                           



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
        




    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings layout-active="default" :layout-location="{
      'default': 'index.html',
      'fixed': 'fixed-index.html',
      'fluid': 'fluid-index.html',
      'mini': 'mini-index.html'
    }"></app-settings>
    </div>

    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/material-design-kit.js"></script>

    <!-- Range Slider -->
    <script src="assets/vendor/ion.rangeSlider.min.js"></script>
    <script src="assets/js/ion-rangeslider.js"></script>

    <!-- App -->
    <script src="assets/js/toggle-check-all.js"></script>
    <script src="assets/js/check-selected-row.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/sidebar-mini.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>


    <!-- Flatpickr -->
    <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="assets/js/flatpickr.js"></script>

    <!-- Global Settings -->
    <script src="assets/js/settings.js"></script>

    <!-- Moment.js -->
    <script src="assets/vendor/moment.min.js"></script>
    <script src="assets/vendor/moment-range.js"></script>


    <!-- Chart.js -->
    <script src="assets/vendor/Chart.min.js"></script>

    <!-- App Charts JS -->
    <script src="assets/js/chartjs-rounded-bar.js"></script>
    <script src="assets/js/charts.js"></script>

    <!-- Chart Samples -->
    <script src="assets/js/page.analytics.js"></script>





    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
   
 <!-- SweetAlert2 -->
 <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    

    


</body>


<!-- Mirrored from educate.frontted.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Jan 2021 14:32:02 GMT -->
</html>


































<?php 

    if(isset($_POST['update_course_content_page'])){
        $link = $_POST['link'];
        $back = $_POST['back'];
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content_type = $_POST['content_type'];
        $duration = $_POST['duration'];


        
  $update_content = $getFromCourse->update('course_content', $id, array('link'=>$link, 'duration'=>$duration, 'title'=>$title, 'type'=>$content_type));
  
  if($update_content){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Content has been Updated.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('".BASE_URL."admin/new_course/".$back."','_self');
      }, 2000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Update Content.')
      
      
      
      });
      setInterval(() => {
        window.open('".BASE_URL."admin/new_course/".$back."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }

    }
?>