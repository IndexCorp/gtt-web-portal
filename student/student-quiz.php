<?php
session_start();
include('../config/init.php'); 
  include('../config/configuration.php');
$exam_id = $_GET['exam_id'];

$get_titl_exam = $getFromExam->get_single('exam', $exam_id);

$round  = $_GET['round'];
$student_id = $_SESSION['login_id'];



$get_exam_time = $getFromExam->check_timer($exam_id, $round, $student_id);
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

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">
  <!-- Theme style
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css"> -->
  
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
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

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    
   <!-- TimeCircles style -->
   <link rel="stylesheet" href="dist/css/TimeCircles.css">
   

<style>
.card_over_flow {
  width: 100%;
  height: 500px;
  overflow-y: auto;
}

</style>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115115077-4"></script>

  

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-115115077-4');
    </script>



    <!-- Facebook Pixel Code -->
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
    <!-- End Facebook Pixel Code -->




    <!-- Flatpickr -->
    <link type="text/css" href="assets/css/vendor-flatpickr.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">


</head>

<body class="layout-default bg-white " style="overflow-x: hidden">











    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>
        <div class="mdk-drawer-layout__content">

            <!-- Header Layout -->
            <div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>

                <!-- Header -->

                
                <div id="header" class="mdk-header js-mdk-header m-0" data-fixed data-effects="waterfall" data-retarget-mouse-scroll="false">
                    <div class="mdk-header__content">

                        <div class="navbar navbar-expand-sm navbar-main navbar-dark pl-md-0 pr-0" id="navbar" data-primary>
                            <div class="container-fluid page__container pr-0">
                            <div class="row col-md-2  " id="final_submit">
                                 

                                 <button class="btn btn-outline-danger btn-lg">
                                   Final Submission
                                 </button>
                             </div>


                            <h2 class="mb-0 text-warning text-center"><?=$get_titl_exam->exam_name;?> </h2>
                          

                                <!-- Navbar toggler -->
                              




                              

                                <ul class="nav navbar-nav d-none d-md-flex menu-right">
                                <div class="  col-md-8 col-sm-8 col-xs-8 offset-4" id="exam_timer" data-timer="<?php

                                $minute = $get_exam_time->duration;
                                 echo $minute * 60;
                                ?>" style="width: 350px;"></div>
                       
                                   
                                   
                                </ul>

                                

                            </div>
                        </div>

                    </div>
                </div>

                <!-- // END Header -->




           <!-- Header Layout Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


                   

                    <div class="container-fluid page__container">

                               


                       <div class="row">

                       <div id="cbt_side" class="col-md-4 ">


                        <div  class="card card_over_flow">
                        <div  class="card-header">
                        <h4>Navigation Bar</h4>

                        </div> 

                        <div  class="card-body">
                          <div class="" id ="nav_bar">                                 

                          </div>



                          
                        </div>




                        
                            
                          
                        </div>
                            
                        </div>

                            <div id="cbt_menu" class="col-md-8">
                            <div  class="card">
                            <div id="cbt_header" class="card-header">

                            </div> 
                            
                            <div id="cbt_body" class="card-body">
      
     

                               
                            </div>


                                    <div class="card-footer">
                                        <a  id="previous" class="btn btn-outline-warning float-left text-warning">Previous</a>
                                        <a  id="next" class="btn btn-outline-success float-right text-success">Next <i class="material-icons btn__icon--right">arrow_forward</i></a>
                                    </div>
                                </div>     
                              

                                  
                            </div>

                          
                          
                    </div>


                </div>
                <!-- // END header-layout__content -->



                
    <!-- App Settings FAB
    <div id="app-settings">
        <app-settings layout-active="default" :layout-location="{
      'default': 'student-dashboard.html',
      'fixed': 'fixed-student-dashboard.html',
      'fluid': 'fluid-student-dashboard.html',
      'mini': 'mini-student-dashboard.html'
    }"></app-settings>
    </div> -->
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>



<!-- jQuery
<script src="plugins/jquery/jquery.min.js"></script> -->

<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>


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


    <!-- jQuery 2.1.4
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script> -->
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>


  <!-- jQuery-->
  <script src="assets/vendor/jquery.min.js"></script> 


<!-- TimeCircles -->
<script src="dist/js/TimeCircles.js"></script>

</body>


<!-- Mirrored from educate.frontted.com/student-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Jan 2021 14:34:24 GMT -->
</html>






<script>

document.addEventListener('contextmenu', event => event.preventDefault());
//code to disabled refresh key and button...
var ctrlKeyDown = false;

$(document).ready(function(){    
  $(document).on("keydown", keydown);
  $(document).on("keyup", keyup);
});

function keydown(e) { 

  if ((e.which || e.keyCode) == 116 || ((e.which || e.keyCode) == 82 && ctrlKeyDown)) {
    // Pressing F5 or Ctrl+R
    e.preventDefault();
  } else if ((e.which || e.keyCode) == 17) {
    // Pressing  only Ctrl
    ctrlKeyDown = true;
  }
};

function keyup(e){
  // Key up Ctrl
  if ((e.which || e.keyCode) == 17) 
    ctrlKeyDown = false;
};


// Exam Timer


$('#exam_timer').TimeCircles({
  time: {
    Days:{
      show:false
    }
   
  }
});

setInterval(function(){
var remaining_second = $('#exam_timer').TimeCircles().getTime();
  
   if(remaining_second < 1){
   window.open('student/quiz_menu/','_self');

  }
}, 1000); 


//Submit Options 

$(document).ready(function(){

$(document).on('click', '.answer_opt', function(){
  //event.preventDefault();

    var option_id =  $(this).attr('my_id');
    var question_id =  $(this).attr('my_question');
    var exam_id = <?=$exam_id;?>;
    var round = <?=$round;?>;
    var student_id = <?=$student_id;?>;
   
   // alert(question_id);

        $.ajax({

        url:"<?=BASE_URL?>student/includes/processing.php",
        method:"POST",
        data:{ exam_id : exam_id, round : round, student_id : student_id,  option_id : option_id, question_id : question_id },
        dataType:"json",

        })
        .done(function(data) {
       // $('#cbt_header').html(data.htmlh);
       

                
        })
        .fail(function(errorData) {
            console.log(errorData+'Failed Contact Administrator' );
        })


            
  }); 
  
  });



window.addEventListener('onbeforeunload', ()=>{
  event.preventDefault();
  closingCode();
});


$(document).ready(function(){

//window.onbeforeunload = closingCode();
});

function closingCode(){
  
  var conf = confirm('Are Sure you want to Submit Your Exam Finally  !!!');
                if(conf == true){
                    window.location = '<?=BASE_URL?>student/quiz_menu/';
                  //  window.open('student/quiz_menu/','_self');
                   


                }else{
                return false;
                }
}




// Final Submision

        $(document).ready(function(){
            $('#final_submit').click(function(event){
                event.preventDefault();

                var conf = confirm('Are Sure you want to Submit Your Exam Finally  !!!');
                if(conf == true){
                    window.location = '<?=BASE_URL?>student/quiz_menu/';
                  //  window.open('student/quiz_menu/','_self');
                   


                }else{
                return false;
                }

            }); 
        });




$(document).ready(function(){
   $('#previous').hide();
  // $('#final_submit').hide();




   var exam_id = <?=$exam_id;?>;
    var round = <?=$round;?>;
    var student_id = <?=$student_id;?>;
    var types = 'first';
    
            $.ajax({

        url:"<?=BASE_URL?>student/includes/processing.php",
        method:"POST",
        data:{ exam_id : exam_id, round : round, student_id : student_id,  types : types },
        dataType:"json",

        })
        .done(function(data) {
        //  alert( "second success" );
          console.log(data);
          $('#cbt_header').html(data.htmlh);
          $('#cbt_body').html(data.htmlb);
          $('#nav_bar').html(data.nav_html);
          $('#next').val(data.current);
          $('#previous').val(data.current);



                
        })
        .fail(function(errorData) {
            console.log(errorData+'Failed Contact Administrator' );
        })

  
    
});




//NAvigation Plane


$(document).ready(function(){
  
  $(document).on('click', '.nav_plane', function(event){
    event.preventDefault();
    var exam_id = <?=$exam_id;?>;
    var round = <?=$round;?>;
    var student_id = <?=$student_id;?>;
    var question_id =  $(this).attr('my_question');
  //  alert(question_id);
    var types = 'nav';
    
            $.ajax({

        url:"<?=BASE_URL?>student/includes/processing.php",
        method:"POST",
        data:{ question_id : question_id, exam_id : exam_id, round : round, student_id : student_id,  types : types },
        dataType:"json",

        })
        .done(function(data) {
        //  alert( "second success" );
        // console.log(data);
        $('#cbt_header').html(data.htmlh);
        $('#cbt_body').html(data.htmlb);
        
        $('#nav_bar').html(data.nav_html);
        $('#next').val(data.current);
        $('#previous').val(data.current);

                
        })
        .fail(function(errorData) {
            console.log(errorData+'Failed Contact Administrator' );
        })






    }); 
});





//NAvigation Plane


$(document).ready(function(){
  
  $(document).on('click', '.nav_plane_btn', function(event){
    event.preventDefault();
    var exam_id = <?=$exam_id;?>;
    var round = <?=$round;?>;
    var student_id = <?=$student_id;?>;
    var question_id =  $(this).attr('my_question');
  //  alert(question_id);
    var types = 'nav';
    
            $.ajax({

        url:"<?=BASE_URL?>student/includes/processing.php",
        method:"POST",
        data:{ question_id : question_id, exam_id : exam_id, round : round, student_id : student_id,  types : types },
        dataType:"json",

        })
        .done(function(data) {
        //  alert( "second success" );
        // console.log(data);
        $('#cbt_header').html(data.htmlh);
        $('#cbt_body').html(data.htmlb);
        
        $('#nav_bar').html(data.nav_html);
        $('#next').val(data.current);
        $('#previous').val(data.current);

                
        })
        .fail(function(errorData) {
            console.log(errorData+'Failed Contact Administrator' );
        })






    }); 
});








//Next Button

$(document).ready(function(){
  $('#next').click(function(){
    $('#previous').show();
   


    var exam_id = <?=$exam_id;?>;
    var round = <?=$round;?>;
    var student_id = <?=$student_id;?>;
    var next =  $('#next').val();
    var number_of_q = '<?=$get_titl_exam->question_no;?>';
    var vali = number_of_q - 1;
    //alert(next);
  //  alert(vali);
   
    var types = 'next';
    //alert(next);
    //if(next != vali){
    $.ajax({

        url:"<?=BASE_URL?>student/includes/processing.php",
        method:"POST",
        data:{ exam_id : exam_id, round : round, student_id : student_id,  types : types, current : next },
        dataType:"json",

        })
        .done(function(data) {
     //  alert( next );
         // console.log(data);
         if(data.success == true){
              // alert(data.success);
          $('#cbt_header').html(data.htmlh);
          $('#cbt_body').html(data.htmlb);
          
          $('#nav_bar').html(data.nav_html);
          $('#next').val(data.current);
          $('#previous').val(data.current);
          $('#numbering_id').val(data.next);

         }
                
        })
        .fail(function(errorData) {
            $('#next').hide();
            $('#final_submit').show();
            console.log(errorData+'Failed Contact Administrator' );
        })

  
  
    }); 
});


<?php /*

//Timer Update Function 
document.ready(function(){
  
  setInterval(function(){
  
      var exam_id = <?=$exam_id;?>;
      var round = <?=$round;?>;
      var student_id = <?=$student_id;?>;
     var timer = 1;
     // alert(question_id);
  
          $.ajax({
  
          url:"<?=BASE_URL?>student/includes/processing.php",
          method:"POST",
          data:{ timer:timer, exam_id : exam_id, round : round, student_id : student_id },
          dataType:"json",
  
          })
          .done(function(data) {
         // $('#cbt_header').html(data.htmlh);
         
  
                  
          })
          .fail(function(errorData) {
              console.log(errorData+'Timer Update Failed Contact Administrator' );
          })
  
  
    
  }, 1000); 
  
  });
  
  
  

*/?>


//Previous Button


$(document).ready(function(){
  $('#previous').click(function(){
    $('#next').show();


    var exam_id = <?=$exam_id;?>;
    var round = <?=$round;?>;
    var student_id = <?=$student_id;?>;
    var previous =  $('#previous').val();
    var types = 'previous';
   // alert(previous);
    
            $.ajax({

        url:"<?=BASE_URL?>student/includes/processing.php",
        method:"POST",
        data:{ exam_id : exam_id, round : round, student_id : student_id,  types : types, current : previous },
        dataType:"json",

        })
        .done(function(data) {
        //  alert( "second success" );
         // console.log(data);
          $('#cbt_header').html(data.htmlh);
          $('#cbt_body').html(data.htmlb);
          $('#nav_bar').html(data.nav_html);
          $('#next').val(data.current);
          $('#previous').val(data.current);

                
        })
        .fail(function(errorData) {
            $('#previous').hide();
            console.log(errorData+'Failed Contact Administrator' );
        })

  



  
    }); 
});

mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

$(document).ready(function(){
  $('#nav_plane_btn').click(function(){
   
  }); 
});

function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}


</script>
           