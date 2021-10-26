  <!-- Header Layout Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Outstanding Payments<?php // var_dump($pas)?></h1>
    </div>
</div>

<div class="container-fluid page__container">
   
    <div class="card">
        
        <div class="card-header">
        <h3>Payment Outstanding List</h3><br>

        
      
            
          <?php /*  <form class="form-inline">
                <label class="mr-sm-2" for="inlineFormFilterBy">Filter by:</label>
                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormFilterBy" placeholder="Type a name">

                <label class="sr-only" for="inlineFormRole">Role</label>
                <select id="inlineFormRole" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                    <option value="All Roles">All courses</option>
                    <option value="1">CITP</option>
                    <option value="2">CTCS</option>
                </select>

                <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                    <input type="checkbox" class="custom-control-input" id="inlineFormPurchase">
                    <label class="custom-control-label" for="inlineFormPurchase">Made a Purchase?</label>
                </div>

                <button type="button" class="btn btn-primary ml-auto">
                    <i class="material-icons mr-1">launch</i> Export
                </button>
            </form>
            */?>
        </div>
        


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>

                        <th>
                           S/N
                        </th>

                        <th>Student Name</th>
                        <th >Courses</th>
                        <th>Tranche One</th>
                        <th>Tranche Two</th>
                        <th>Tranche Three</th>
                        <th>Total</th>
                        <th>Outstanding</th>
                        <?php 
                    if(isset($_SESSION['super_admin'])){
                
                ?>
                       <th style="width: 150px;">Action</th>
                       <?php }?>
                       
                    </tr>
                </thead>
                <tbody class="list" id="staff">
                <?php 



                    if(isset($_GET['outstanding'])){

                            $limit = 20;
                        if($_GET['outstanding'] == 0){
                                $page = 1;
                            $offset = (($page - 1)* $limit );
                        }else{
                            $page = $_GET['outstanding'];
                            $offset = (($page - 1)* $limit );
                        }

                        $cur =  $paginations =$getFromStudent->pagination_lower_payment_outstanding($offset, $limit);

                        $lower = ($page - 1) * $limit + $cur;
                        $uper = $getFromStudent->pagination_count_payment_outstanding();


                        
                        
                        $paginations =$getFromStudent->pagination_payment_outstanding($offset, $limit);
                        $sn = $offset;
                      
                        foreach($paginations as $payment):
                            $sn +=1;



                            $amounts = $getFromStudent->get_single('courses', $payment->course_id);
                           
                            $price = $amounts->disc_price;
                          
                                $total = $payment->tranche_1 +  $payment->tranche_2+  $payment->tranche_3;

                           
                            $outstand = $price - $total;
                           // if($outstand <= 0){
                             //   continue;
                            //}



                    ?>



                    <tr class="selected">

                         <td>
                           <?=$sn;?>
                         </td>
                         <td>

                            <div class="media align-items-center">
                            
                                <div class="media-body">

                                    <span class="js-lists-values-em"><?php
                                    $ame = $getFromStudent->get_single('user', $payment->user_id);
                                   echo  $ame->firstname .' '. $ame->surname;
                                    
                                    
                                    ?></span>

                                </div>
                            </div>

                         </td>
                         <td>
                         <?php 
                          $courses = $getFromGeneric->get_single_g('student_courses','student_id', $payment->user_id);
                          ?>
                             <span class="badge badge-soft-info"><?=$getFromGeneric->get_single('courses', $payment->course_id)->course_abrev;?></span>
                         
                        </td>
                        <td>
                       $<?=number_format($payment->tranche_1, 2);?>
                        
                       </td>
                       <td>
                       $<?=number_format($payment->tranche_2, 2);?>
                        
                       </td>
                       <td>
                       $<?=number_format($payment->tranche_3, 2);?>
                        
                       </td>

                       <td>
                       $<?=number_format($total, 2);?>
                        
                       </td>
                       
                      <?php /*  <td>
                        <?php
                            $amount = $getFromStudent->get_sum_payment($payment->user_id, 'paid');
                            echo  '$'.number_format($amount,2);
                        ?>
                        
                       </td>

                       */?>
                        <td > 
                            <?php 
                           
                            if($outstand > 0){
                                echo  '<b style="color: red">-$'.number_format($outstand,2).'</b>';
                            }else{
                                echo  '<b style="color: green">$'.number_format($outstand,2).'</b>';
                            }
                           
                            ?>
                        </td>
                        <?php 
                    if(isset($_SESSION['super_admin'])){
                
                ?>
                        <td>
                            <div class="media align-items-center">
                                <a href="admin/payment-mgt/<?=$payment->id;?>" class="btn btn-outline-warning">Manage</a>
                            </div>
                        </td>
                        <?php }?>
                      
                    </tr>
                    
                 


                    <?php endforeach; }?>
             

                </tbody>
            </table>
        </div>

        <div class="card-body text-right">
            
        <div class="ml-auto">
                                <?php 
                                    if($page == 1){

                                 
                                ?>
                                 <?php }else{
                                        ?> 

                            <a href="admin/outstanding/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
                            <?php }?>
                              <?=$lower;?> <span class=" text-center text-black">of  <?=$uper;?></span>
                                
                              
                                 <?php 
                                    if($lower == $uper){

                                 
                                ?>
                                    <?php }else{
                                        ?> 
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="admin/outstanding/<?=$page + 1?>" class=""><i class="material-icons float-right">arrow_forward</i></a>
                                        <?php }?>
 
                                </div>
        


        </div>


    </div>
</div>




</div>
<!-- // END header-layout__content -->