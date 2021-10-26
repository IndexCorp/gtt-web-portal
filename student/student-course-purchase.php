<?php
    $subscribe = 'active';

?>
<?php 
        if(isset($_GET['subscribe'])){
            $course_id = $_GET['subscribe'];

            $course = $getFromCourse->get_single('courses', $course_id);
        }
    
    ?>
                <!-- Header Layout Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


                    <div class="page__heading border-bottom">
                        <div class="container-fluid page__container d-flex align-items-center">
                            <h1 class="mb-0"><?=$course->course_name;?></h1>
                        </div>
                    </div>

                    <div class="container-fluid page__container">
                        <div class="row">
                            <div class="col-lg-8">
                                <a href="#" class="dp-preview card">
                                    <img src="<?=BASE_URL?>/admin/<?=$course->img_preview;?>" alt="digital product" class="img-fluid">
                                    <!--  <span class="dp-preview__overlay">
                                      <span class="btn btn-light">Preview</span>
                                    </span>-->
                                </a>
                                <div class="mb-3"><strong class="text-dark-gray">DESCRIPTION</strong></div>
                                <p class="mb-3">
                                <?=$course->descs;?>
                                </p>


                                <div class="">
                                    <ul class="list-group list-lessons">
                                    <?php
                                         $course_contents =  $getFromCourse->get_single_g('course_content','course_id', $course_id);
                                                $sn = 0;
                                         foreach($course_contents as $content):
                                            $sn +=1;
                                      
                                    ?>
                                        <li class="list-group-item d-flex">
                                            <a href="#"><?=$sn?>. <?=$content->title?></a>
                                            <div class="ml-auto d-flex align-items-center">
                                               <!-- <span class="badge badge-success mr-2">FREE</span>-->
                                                <span class="text-muted"><i class="material-icons icon-16pt icon-light">watch_later</i> 1:42</span>
                                            </div>
                                        </li>
                                        <?php endforeach;?>
                                      
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle text-body" data-toggle="dropdown">Price List</a>
                                            <div class="dropdown-menu py-0">
                                            <div class="dropdown-item py-3 d-flex  border-bottom  flex-column">
                                            <a class="btn btn-flat"  id="make_payment_full" href="" style="text-decoration: none; color: black;">
                                              
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span>Full</span>
                                                       <?php /*<span class="ml-auto h4 m-0">&#36; <?=number_format($course->disc_price, 2);?></span>
                                                    */?></div>
                                                    </a>
                                                </div>
                                                <div class="dropdown-item py-3 border-bottom d-flex flex-column">
                                                <a class="btn btn-flat"   id="make_payment_band_1" href="" style="text-decoration: none; color: black;">
                                              
                                                    <div class="d-flex align-items-center mb-2">
                                                    <a class="btn btn-warning  btn-block btn-lg ml-auto text-white" id="part_payment" data-toggle="modal" data-target="#modal-part_payment" ><i class="material-icons" >star</i>Part Payment</a>
                                 
                                                     
                                                    </div>
                                                   <a>
                                                  </div>
                                              <?php /*  <div class="dropdown-item py-3 d-flex  flex-column">
                                                <a class="btn btn-flat" id="make_payment__band_2" href="" style="text-decoration: none; color: black;">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span>Band Two</span>
                                                        <span class="ml-auto h4 m-0"> &#36;<?=number_format(($course->disc_price)/2, 2);?></span>
                                                    </div>
                                                    </a>
                                                </div> */?>
                                            </div>
                                        </div>
                                        <div class="ml-auto h2 mb-0"><strong> &#36;<?=number_format($course->disc_price, 2);?></strong></div>
                                    </div>

                                    <div class="mb-4">
                                    <input type="hidden" value="<?=$course_id;?>" name="course_id" id="course_id">
                                   
                                    <input type="hidden" value="<?=$course->disc_price;?>" name="amount" id="amount">
                                        <buttton href="student/billing/<?=$course->id;?>" id="make_payment_full_btn" class="btn btn-success btn-block btn-lg">Purchase</buttton>
                                     
                                    </div>

                                    <div class="mb-4 text-center">
                                        <div class="d-flex flex-column align-items-center justify-content-center">

                                            <span class="mb-1">
                                            <?php 
                                                $get_rating_count = $getFromCourse->get_count_where('rating', 'course_id', $course->id);
                                                $get_sum_rating = $getFromCourse->get_sum_where('rating', 'rating', 'course_id', $course->id);
                                                @$total_rating = $get_sum_rating /  $get_rating_count;
                                               // $total_rating = 4.5;

                                                $go = 1;

                                                while($go <= @round($total_rating)){

                                             
                                            ?>
                                                <a  class="rating-link active"><i class="material-icons ">star </i></a>
                                                    <?php  $go +=1;  }?>
                                            </span>
                                            <div class="d-flex align-items-center">
                                                <strong> <?php if(round($total_rating)>=0){
                                                    echo round($total_rating);
                                                }else{
                                                    echo 0;
                                                } ;?>/5</strong>
                                                <span class="text-muted ml-1">— <?=@$get_rating_count;?> reviews</span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="list-group list-group-flush mb-4">
                                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                            <strong>Level</strong>
                                            <div class="ml-auto"><?=$course->level;?></div>
                                        </div>
                                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                            <strong>Released</strong>
                                            <div class="ml-auto"><?=$course->date_created;?></div>
                                        </div>
                                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                            <strong>Students</strong>
                                            <div class="ml-auto"><?=$getFromCourse->count_courses($course->id);?></div>
                                        </div>
                                    </div>

                                    <div class="card card-body mb-0 bg-dark">
                                        <ul class="list-unstyled text-white ml-1 mb-0">
                                            <li class="d-flex align-items-center pb-1"><i class="material-icons icon-16pt text-white mr-2">check_circle</i> Created by Global Trade Team</li>
                                            <!--<li class="d-flex align-items-center pb-1"><i class="material-icons icon-16pt text-white mr-2">check_circle</i> 6 Months Support</li>-->
                                            <li class="d-flex align-items-center"><i class="material-icons icon-16pt text-white mr-2">check_circle</i> 100% Money Back Guarantee</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- // END header-layout__content -->

         