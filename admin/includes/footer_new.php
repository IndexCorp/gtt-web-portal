
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
    <script src="assets/vendor/jquery.min.js">
  //   alert('hello');
 
 </script>

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
    

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


     <!-- Chart Samples -->

    <script>
/*
var c_id = 'payment';
      
      
      $.ajax({
      
      url:"http://localhost/gtt/student/includes/processing.php",
      method:"POST",
      data:{ calcu_payment : c_id },
      dataType:"json",
      
      
      
      })
      
      
      .done(function(data) {
      
        $('#outsanding').val(data.outstanding);
      
        $('#paid').val(data.paid);
      //  alert(data.outstanding);
      
      console.log(data);
      
      
      })
      .fail(function(errorData) {
      alert( 'Failed Contact Administrator' );
      })

    
        */   
     </script>
    
     <script src="assets/js/page.dashboard.js"></script>



</body>


<!-- Mirrored from educate.frontted.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Jan 2021 14:32:02 GMT -->
</html>
<script>     
     $(document).ready(function(){
      // alert('hello');
               $('#confirm_student_delete').click(function(event){
                     event.preventDefault();
     
                     var conf = confirm('Are Sure you want to Delete this Student  !!!');
                     if(conf == true){
                        return true;
     
     
                     }else{
                     return false;
                     }
     
                 });
             });
     </script>

