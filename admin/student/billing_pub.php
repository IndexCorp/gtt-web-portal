<?php

   
   // Pie Chat
   $year = date('Y');
   $payment_sum = $getFromGeneric->get_sum_payments($year);
  /* $part = $getFromGeneric->get_sum_part_payments($year);
   $band_1 = $getFromGeneric->get_sum_payment_band_1($year);
   $band_2 = $getFromGeneric->get_sum_payment_band_2($year);
*/
 //  $payment_sum = $full + $band_1 + $band_2 + $part;
 

   $pays = $getFromGeneric->get_payment_multi($year);
   $total_expected = 0;

   foreach($pays as $pay){
       $get = $getFromGeneric->get_sum_where('courses', 'disc_price', 'id', $pay->course_id);
       $total_expected += $get;
   }
   
   $outstanding = $total_expected - $payment_sum;

     //January
    // $part_s_jan = $getFromGeneric->get_payment_part_month($year, '01');
     $jan = $getFromGeneric->get_payment_full_month($year, '01');
   //  $band_1_s_jan = $getFromGeneric->get_payment_band_1_month($year, '01');
     //$band_2_s_jan = $getFromGeneric->get_payment_band_2_month($year, '01');


    // $jan = $full_s_jan + $part_s_jan + $band_1_s_jan + $band_2_s_jan;
    //$jan = $full_s_jan ;


       //February
     //  $part_s_feb = $getFromGeneric->get_payment_part_month($year, '02');
    
       $feb = $getFromGeneric->get_payment_full_month($year, '02');
       //$band_1_s_feb = $getFromGeneric->get_payment_band_1_month($year, '02');
       //$band_2_s_feb = $getFromGeneric->get_payment_band_2_month($year, '02');
 
 
       //$feb = $full_s_feb + $part_s_feb + $band_1_s_feb + $band_2_s_feb;
      
   
  /* $pas_feb = $getFromGeneric->get_payment_multi_month($year, '02');
   $feb = 0;

   foreach($pas_feb as $pa_feb){
       $getfeb = $getFromGeneric->get_sum_where('courses', 'disc_price', 'id', $pa_feb->course_id);
       $feb += $getfeb;
   }*/

 

   //March
   
  /* $pas_mar = $getFromGeneric->get_payment_multi_month($year, '03');
   $mar = 0;

   foreach($pas_mar as $pa_mar){
       $getmar = $getFromGeneric->get_sum_where('courses', 'disc_price', 'id', $pa_mar->course_id);
       $mar += $getmar;
   }*/

   //$part_s_mar = $getFromGeneric->get_payment_part_month($year, '03');
    
   $mar = $getFromGeneric->get_payment_full_month($year, '03');
     //  $band_1_s_mar = $getFromGeneric->get_payment_band_1_month($year, '03');
      // $band_2_s_mar = $getFromGeneric->get_payment_band_2_month($year, '03');
 
 
      // $mar = $full_s_mar + $part_s_mar + $band_1_s_mar + $band_2_s_mar;
  


     //April
   /*
     $pas_april = $getFromGeneric->get_payment_multi_month($year, '04');
     $april = 0;
 
     foreach($pas_april as $pa_april){
         $getapril = $getFromGeneric->get_sum_where('courses', 'disc_price', 'id', $pa_april->course_id);
         $april += $getapril;
     }
*/

//$part_s_april = $getFromGeneric->get_payment_part_month($year, '04');
    
$april = $getFromGeneric->get_payment_full_month($year, '04');
//$band_1_s_april = $getFromGeneric->get_payment_band_1_month($year, '04');
//$band_2_s_april = $getFromGeneric->get_payment_band_2_month($year, '04');


//$april = $full_s_april + $part_s_april + $band_1_s_april + $band_2_s_april;


       //May
   
 /*  $pas_may = $getFromGeneric->get_payment_multi_month($year, '05');
   $may = 0;

   foreach($pas_may as $pa_may){
       $getmay = $getFromGeneric->get_sum_where('courses', 'disc_price', 'id', $pa_may->course_id);
       $may += $getmay;
   }
*/

//$part_s_may = $getFromGeneric->get_payment_part_month($year, '05');
    $may = $getFromGeneric->get_payment_full_month($year, '05');
//$band_1_s_may = $getFromGeneric->get_payment_band_1_month($year, '05');
//$band_2_s_may = $getFromGeneric->get_payment_band_2_month($year, '05');


//$may = $full_s_may + $part_s_may + $band_1_s_may + $band_2_s_may;


     //June
   
    /* $pas_june = $getFromGeneric->get_payment_multi_month($year, '06');
     $june = 0;
 
     foreach($pas_june as $pa_june){
         $getjune = $getFromGeneric->get_sum_where('courses', 'disc_price', 'id', $pa_june->course_id);
         $june += $getjune;
     }*/

     //$part_s_june = $getFromGeneric->get_payment_part_month($year, '06');
    
     $june = $getFromGeneric->get_payment_full_month($year, '06');
     //$band_1_s_june = $getFromGeneric->get_payment_band_1_month($year, '06');
     //$band_2_s_june = $getFromGeneric->get_payment_band_2_month($year, '06');


     //$june = $full_s_june + $part_s_june + $band_1_s_june + $band_2_s_june;

 

       //Jully
   /*
   $pas_jully = $getFromGeneric->get_payment_multi_month($year, '07');
   $jully = 0;

   foreach($pas_jully as $pa_jully){
       $getjully = $getFromGeneric->get_sum_where('courses', 'disc_price', 'id', $pa_jully->course_id);
       $jully += $getjully;
   }
   */
   //$part_s_jully = $getFromGeneric->get_payment_part_month($year, '07');
    
   $jully = $getFromGeneric->get_payment_full_month($year, '07');
   //$band_1_s_jully = $getFromGeneric->get_payment_band_1_month($year, '07');
   //$band_2_s_jully = $getFromGeneric->get_payment_band_2_month($year, '07');


   //$jully = $full_s_jully + $part_s_jully + $band_1_s_jully + $band_2_s_jully;



     //August
   
    /* $pas_august = $getFromGeneric->get_payment_multi_month($year, '08');
     $august = 0;
 
     foreach($pas_august as $pa_august){
         $getaugust = $getFromGeneric->get_sum_where('courses', 'disc_price', 'id', $pa_august->course_id);
         $august += $getaugust;
     }
     */
    /// $part_s_august = $getFromGeneric->get_payment_part_month($year, '08');
    
     $august = $getFromGeneric->get_payment_full_month($year, '08');
     //$band_1_s_august = $getFromGeneric->get_payment_band_1_month($year, '08');
     //$band_2_s_august = $getFromGeneric->get_payment_band_2_month($year, '08');


     //$august = $full_s_august + $part_s_august + $band_1_s_august + $band_2_s_august;


       //September
   
   /*$pas_sept = $getFromGeneric->get_payment_multi_month($year, '09');
   $sept = 0;

   foreach($pas_sept as $pa_sept){
       $getsept = $getFromGeneric->get_sum_where('courses', 'disc_price', 'id', $pa_sept->course_id);
       $sept += $getsept;
   }
*/

//$part_s_sept = $getFromGeneric->get_payment_part_month($year, '09');
    
$sept = $getFromGeneric->get_payment_full_month($year, '09');
//$band_1_s_sept = $getFromGeneric->get_payment_band_1_month($year, '09');
//$band_2_s_sept = $getFromGeneric->get_payment_band_2_month($year, '09');


//$sept = $full_s_sept + $part_s_sept + $band_1_s_sept + $band_2_s_sept;


     //October
   
     /*$pas_oct = $getFromGeneric->get_payment_multi_month($year, '10');
     $oct = 0;
 
     foreach($pas_oct as $pa_oct){
         $getoct = $getFromGeneric->get_sum_where('courses', 'disc_price', 'id', $pa_oct->course_id);
         $oct += $getoct;
     }
     */
     //$part_s_oct = $getFromGeneric->get_payment_part_month($year, '10');
    
     $oct = $getFromGeneric->get_payment_full_month($year, '10');
     //$band_1_s_oct = $getFromGeneric->get_payment_band_1_month($year, '10');
     //$band_2_s_oct = $getFromGeneric->get_payment_band_2_month($year, '10');


     //$oct = $full_s_oct + $part_s_oct + $band_1_s_oct + $band_2_s_oct;



       //November
   
   /*$pas_nov = $getFromGeneric->get_payment_multi_month($year, '11');
   $nov = 0;

   foreach($pas_nov as $pa_nov){
       $getnov = $getFromGeneric->get_sum_where('courses', 'disc_price', 'id', $pa_nov->course_id);
       $nov += $getnov;
   }
*/

//$part_s_nov = $getFromGeneric->get_payment_part_month($year, '11');
  $nov = $getFromGeneric->get_payment_full_month($year, '11');
//$band_1_s_nov = $getFromGeneric->get_payment_band_1_month($year, '11');
//$band_2_s_nov = $getFromGeneric->get_payment_band_2_month($year, '11');


//$nov = $full_s_nov + $part_s_nov + $band_1_s_nov + $band_2_s_nov;


     //December
   
   /*  $pas_dec = $getFromGeneric->get_payment_multi_month($year, '12');
     $dec = 0;
 
     foreach($pas_dec as $pa_dec){
         $getdec = $getFromGeneric->get_sum_where('courses', 'disc_price', 'id', $pa_dec->course_id);
         $dec += $getdec;
     }
 
 
*/
//$part_s_dec = $getFromGeneric->get_payment_part_month($year, '12');
    
$dec = $getFromGeneric->get_payment_full_month($year, '12');
//$band_1_s_dec = $getFromGeneric->get_payment_band_1_month($year, '12');
//$band_2_s_dec = $getFromGeneric->get_payment_band_2_month($year, '12');


//$dec = $full_s_dec + $part_s_dec + $band_1_s_dec + $band_2_s_dec;




  

?>
  <!-- Header Layout Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Payments<?php // var_dump($pas)?></h1>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row card-group-row">
        <div class="col-lg-4 col-md-5 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-header card-header-large bg-light d-flex align-items-center">
                    <div class="flex">
                        <h4 class="card-header__title">$<?=number_format($total_expected, 2);?></h4>
                        <div class="card-subtitle text-muted">Total Expected Bill For The Year</div>
                    </div>
                    <!--<div class="dropdown ml-auto">
                        <a href="#" data-toggle="dropdown" data-caret="false" class="text-dark-gray"><i class="material-icons">more_horiz</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:void(0)" class="dropdown-item">Go to Report</a>
                            <a href="javascript:void(0)" class="dropdown-item">Next Cycle</a>
                        </div>
                    </div>-->
                </div>
                <div class="card-body d-flex align-items-center justify-content-center h-250">
                    <div class="chart z-0 dashboard-chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <div class="text-muted mb-1">Outstanding</div>







                            <input type="hidden" id="outstanding" value="<?=ceil($payment_sum);?>">
                            <input type="hidden" id="paid"  value="<?=ceil($outstanding);?>">





                            <div class="card-header__title">$<?=number_format($outstanding, 2);?></div>
                        </div>
                        <canvas class="position-relative chartjs-render-monitor" id="billingChart" width="420" height="420" style="display: block; height: 210px; width: 210px;"></canvas>
                    </div>
                </div>
                <div class="card-body pt-0 text-center">
                    <div class="text-amount mb-1">$<?=number_format($payment_sum, 2);?></div>
                    <div class="text-muted">Current balance</div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-7 card-group-row__col">
            <div class="card card-group-row__card">
            
                <div class="card-header card-header-large bg-light d-flex align-items-center">
                    <div class="flex">
                        <h4 class="card-header__title">Income</h4>
                        <div class="card-subtitle text-muted">Total income for the year</div>
                    </div>
                   
                </div>
                <div class="card-body d-flex align-items-center">
                    <div class="chart w-100" style="height: calc(328px - 1.25rem * 2);"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <input type="hidden" id="jan"  value="<?=$jan?>">
                        <input type="hidden" id="feb"  value="<?=$feb?>">
                        <input type="hidden" id="march"  value="<?=$mar?>">
                        <input type="hidden" id="april"  value="<?=$april?>">
                        <input type="hidden" id="may"  value="<?=$may?>">
                        <input type="hidden" id="june"  value="<?=$june?>">
                        <input type="hidden" id="jully"  value="<?=$jully?>">
                        <input type="hidden" id="august"  value="<?=$august?>">
                        <input type="hidden" id="sept"  value="<?=$sept?>">
                        <input type="hidden" id="oct"  value="<?=$oct?>">
                        <input type="hidden" id="nov"  value="<?=$nov?>">
                        <input type="hidden" id="dec"  value="<?=$dec?>">



                        <canvas id="transactionsChart" width="1154" height="576" class="chartjs-render-monitor" style="display: block; height: 288px; width: 577px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        
        <div class="card-header">
        <h3>Full Payment List</h3><br>

        
        <form class="mb-3 border-bottom pb-3" method="post" id="admin_billing_search_form">
            <div class="d-flex">
                <div class="search-form mr-3 search-form--light">
                    <input type="text" class="form-control"  name="search_item" placeholder="Search by  Student" id="search_billing">
                    <button class="btn" type="submit" name="search_billing_admin" id="search_billing_admin"><i class="material-icons">search</i></button>
                </div>




                <div class="form-inline ml-auto">
               
                <label class="sr-only" for="billing_search">Role</label>
                <select id="billing_search" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                <option value="" >Select Course</option>
                   
                            
                             
                        <?php

                            $courses =  $getFromCourse->get_multi('courses');
                            
                            foreach($courses as $cat):

                            ?>

                        <option value="<?=$cat->id?>"><?=$cat->course_abrev;?></option>
                        
                        <?php endforeach;?>
                </select>
                </div>



                <div class="form-inline ml-auto">
                 
                    <div class="form-group">
                        <label for="publish_search_billing" class="form-label mr-1">Filter</label>
                        <select id="publish_search_billing" class="form-control custom-select" style="width: 200px;">
                        <option selected="">Select Status</option>
                            <option value="out">Outstanding</option>
                            <option value="full">Fully Paid</option>
                            <option value="all">All</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>

            
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
                       <?php } ?>
                    </tr>
                </thead>
                <tbody class="list" id="staff">
                <?php 



                    if(isset($_GET['billing_full'])){

                            $limit = 20;
                        if($_GET['billing_full'] == 0){
                                $page = 1;
                            $offset = (($page - 1)* $limit );
                        }else{
                            $page = $_GET['billing_full'];
                            $offset = (($page - 1)* $limit );
                        }

                        $cur =  $paginations =$getFromStudent->pagination_lower_st_billing($offset, $limit);

                        $lower = ($page - 1) * $limit + $cur;
                        $uper = $getFromStudent->pagination_count_st_billing();


                        
                        
                        $paginations =$getFromStudent->pagination_st_billing($offset, $limit);
                        $sn = $offset;
                      
                        foreach($paginations as $payment):
                            $sn +=1;



                            $amounts = $getFromStudent->get_single('courses', $payment->course_id);
                           
                            $price = $amounts->disc_price;
                          
                                $total = $payment->tranche_1 +  $payment->tranche_2+  $payment->tranche_3;

                           
                            $outstand = $price - $total;
                            if($outstand > 0){
                                continue;
                            }



                    ?>



                    <tr class="selected">

                         <td>
                           <?=$sn;?>
                         </td>
                         <td>

                            <div class="media align-items-center">
                            
                                <div class="media-body">

                                    <span class="js-lists-values-em;?></ployee-name"><?php
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

                            <a href="admin/billing_full/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
                            <?php }?>
                            <?php /*=$lower;?> <span class=" text-center text-black">of  <?=$uper;?></span>*/?>
                                
                              
                                 <?php 
                                    if($lower == $uper){

                                 
                                ?>
                                    <?php }else{
                                        ?> 
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="admin/billing_full/<?=$page + 1?>" class=""><i class="material-icons float-right">arrow_forward</i></a>
                                        <?php }?>
 
                                </div>
        


        </div>


    </div>
</div>




</div>
<!-- // END header-layout__content -->