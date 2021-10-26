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
        <h3 class="mb-0"> Admin Dashboard <span style="color: red; font-size: 40px;">( <?=$_SESSION['fname'] .' '. $_SESSION['sname'];?>)</span></h3>
    </div>

    <?php 

        $year1 = date("Y");
        $month = date("m");
        $day = date("d");
        $get_birthday = $getFromStudent->get_birthday($year1, $month, $day);
        $get_latest_payments = $getFromStudent->latest_payment($month);
        $count_out = 0;
        foreach($get_latest_payments as $get_ousta){
       
            $amounts = $getFromStudent->get_single('courses', $get_ousta->course_id);
           
            $price = $amounts->disc_price;
          
                $total = $get_ousta->tranche_1 +  $get_ousta->tranche_2+  $get_ousta->tranche_3;

           
            $outstand = $price - $total;

            if($outstand <= 0){
                $count_out +=1;
            }
           

        }
      //  var_dump($get_birthday);
        foreach($get_birthday as $birth):
    
    ?>

                    <div class="alert alert-soft-primary d-flex align-items-center card-margin" role="alert">
                                            <i class="material-icons mr-3 icon-xl">cake-layered</i>
                                            <div class="text-body">Dear Admin <strong style="color: green;"><?=$birth->firstname.' '. $birth->surname;?></strong> is having Birthday Today</div>
                                           <form action="admin/dashboard/" method="post">
                                           <input type="hidden" name="student_name" value="<?=$birth->firstname.' '. $birth->surname;?>" >
                                           <input type="hidden" name="email" value="<?=$birth->email;?>">

                                            <button type="submit" name="send_birth_day_greetings" class="btn btn-warning ml-auto">Send Greetings</button>
                                            </form>
                                        </div>
                                        <?php endforeach; ?>
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
                       <div class=" ml-auto">
                        <a href="admin/billing/" class="btn btn-outline-primary"><i class="material-icons">arrow_forward</i>Payment and Outstanding Details</a>
                       
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


    <div class="row">
        <div class="col-lg">
        <div class="row card-group-row">
                <div class="col-lg-6  card-group-row__col">
                    <div class="card card-group-row__card card-body card-body-x-lg" style="position: relative; padding-bottom: calc(80px - 1.25rem); overflow: hidden; z-index: 0;">
                        <div class="card-header__title text-muted mb-2">Number Students</div>
                        <div class="text-amount"><?=$getFromCourse->get_count_course_where();?></div>
                      
                    </div>
                </div>
                <div class="col-lg-6 card-group-row__col">
                    <div class="card card-group-row__card card-body card-body-x-lg" style="position: relative; padding-bottom: calc(80px - 1.25rem); overflow: hidden; z-index: 0;">
                        <div class="card-header__title text-muted mb-2">Courses</div>
                        <div class="text-amount"><?=$getFromCourse->get_count('courses');?></div>
                       
                    </div>
                </div> 
               <div class="col-lg-6 card-group-row__col">
                    <div class="card card-group-row__card card-body card-body-x-lg" style="position: relative; padding-bottom: calc(80px - 1.25rem); overflow: hidden; z-index: 0;">
                        <div class="card-header__title text-muted mb-2">Outstandings</div>
                        <div class="text-amount"><?=$count_out;?></div>
                        <a class="btn btn-outline-angular text-muted mb-2" href="admin/outstanding/">View List</a>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg">
          
            <div class="card">
                <div class="card">
                    <div class="card-header card-header-large bg-white">
                        <h4 class="card-header__title">Overall Course Progress</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-skills">

                        <?php
                            $courses_list = $getFromCourse->get_in_progress_all();
                             foreach($courses_list as $asd):
                                                $list = $getFromCourse->get_single('courses', $asd->course_id);

                                        ?>

                            <li>
                                <div><?=$list->course_abrev?></div>
                                <div class="flex">
                                <?php 
                                                            
                                                            $get_progres = $getFromCourse->course_progress($list->id);
                                                            $get_bits = $getFromCourse->course_course_viewed_all_std($list->id);
                                                            $get_bit = $getFromCourse->course_course_viewed_all($list->id);
                                                            
                                                            $get_progress =  $get_progres * $get_bits;
                                                            $get_div =number_format(($get_bit / $get_progress) * 100, 2);
                                                            //$get_div = 89;
                                                        ?>          
                                <div class="progress" style="height: 6px;">
                               
  
                           <?php 
                                                              if($get_div <= 20){
                                                            ?>
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?=$get_div?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    <?php }elseif($get_div <= 40){?>
                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?=$get_div?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                

                                                                    <?php  }elseif($get_div <= 60){ ?>
                                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: <?=$get_div?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                

                                                                    <?php }elseif($get_div <= 80){?>
                                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$get_div?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                

                                                                    <?php  }elseif($get_div <= 100){ ?>
                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?=$get_div?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                


                                                                            <?php } ?>
                                                                        

                                 
                                </div>
                            </div>
                                <div class="text-dark-gray"><strong><?=$get_div?>%</strong></div>
                            </li>
                           
                         
                        <?php endforeach;?>


                        </ul>
                    </div>
                    <div class="card-footer text-center border-0">
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row card-group-row">

        <div class="col-lg-12 card-group-row__col">
            <div class="card card-group-row__card">
            
                <div class="card-header card-header-large bg-light d-flex align-items-center">
                    <div class="flex">
                        <h4 class="card-header__title">THis Month Payments</h4>
                      
                    </div>
                     
                </div>
                <div class="card-body d-flex align-items-center">
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
            <th>Date</th>
            <?php 
        if(isset($_SESSION['super_admin'])){
    
    ?>
           <th style="width: 150px;">Action</th>
           <?php }?>
           
        </tr>
    </thead>
    <tbody class="list" id="staff">
    <?php 



     
            $sn = 0;
          
            foreach($get_latest_payments as $payment):
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
            <td>
           <?=$payment->date_created?>
            
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
        
     


        <?php endforeach; ?>
 

    </tbody>
</table>
</div>
                </div>
            </div>
        </div>
    </div>

 

</div>


</div>
<!-- // END header-layout__content -->
