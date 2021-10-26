<?php
    $student = 'active';
 ?>
  <?php 

if(isset($_GET['payment-mgt'])){
   
    if(!empty($_GET['payment-mgt'])){
        $id = $_GET['payment-mgt'];

        $get_payment_details = $getFromCourse->get_single('payment', $id);
    }
   
}
  

  ?>
  <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h3 class="mb-0">Student Payment Management</h3>
        <div class="mb-1 ml-5">
        <a href="admin/billing" class="badge badge-dark-gray text-white" onclick="goBack()">Back to Payment</a>
    </div>
        
    </div>
</div>


<div class="container-fluid page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-bio">
        <form method="post" action="admin/payment-mgt">

<div class="row">


        <div class="col-3 offset-2">
            <div class="form-group">
                <label for="country"><strong> Student</strong></label><br>
                         <?php

                        $student =  @$getFromGeneric->get_single('user', $get_payment_details->user_id);
                        
                        
                  
                    
                ?>
                  <input type="text" readonly value="<?php 
                  echo @$student->firstname.' '.@$student->surname?>"  class="form-control" >
            
              

            </div>
        </div>


        
        <div class="col-3 offset-2">
            <div class="form-group">
                <label for="country"><strong>Course</strong></label><br>
                         <?php

                        $course =  @$getFromGeneric->get_single('courses', $get_payment_details->course_id);
                        
                        
                  
                    
                ?>
                  <input type="text" readonly value="<?php 
                  echo @$course->course_name?>"  class="form-control" >
            
              

            </div>
        </div>

        
        <div class="col-3 offset-2">
            <div class="form-group">
                <label for="country"><strong>Amount</strong></label><br>
                    
                  <input type="text" name="amount" placeholder="Enter Amount" class="form-control" >
                  <input type="hidden" name="id" value="<?=$_GET['payment-mgt']?>" placeholder="Enter Amount">
            
              

            </div>
        </div>


      
        <div class="col-3">
            <div class="form-group">
                <label for="country"><strong>Payment Status</strong></label><br>
                <select id="select01" name="status" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
            
            
            
                           
                <option value="" >Select Status</option>
                                                <option value="tranche_1" >Tranche One</option>
                                                <option value="tranche_2" >Tranche Two</option>
                                                <option value="tranche_3">Tranche Three</option>
                                              
                            
                        
            
                </select>

            </div>
        </div>

        <div class="col-6 offset-3">
            <div class="form-group">
                   <button type="submit" name="student_payment_update" class="btn btn-outline-warning btn-lg">Update Payment</button>
            
        
            </div>
        </div>
    </div>
    </form>
        </div>

        


     
      
    </div>
</div>


</div>
<!-- // END content -->