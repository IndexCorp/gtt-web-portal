<?php
    $student = 'active';
 ?>
  <?php 

if(isset($_GET['profile'])){
   
    if(!empty($_GET['profile'])){
        $id = $_GET['profile'];

        $get_student = $getFromCourse->get_single('user', $id);
      
    }
   
}
  

  ?>
  
     <!-- CONTENT -->
     <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0">Student Account</h1>
    </div>
</div>
<div class="bg-white border-bottom mb-3">
    <div class="container-fluid nav nav-tabs" role="tablist">
        <a href="#activity_all" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Profile</a>
        <a href="#activity_purchases" data-toggle="tab" role="tab" aria-selected="false" class="">Payments</a>
        <a href="#document" data-toggle="tab" role="tab" aria-selected="false" class="">Student Schools</a>
    
    </div>
</div>
<div class="container-fluid page__container">
    <div class="tab-content">
        <div class="tab-pane fade active show" id="activity_all">
            <!-- FIRST TAB CONTENT -->
            <div class="card card-form">
                <div class="row no-gutters">
                    <div class="col-lg-4 card-body">
                        <p><strong class="headings-color">Basic Information</strong></p>
                        <p class="text-muted mb-0">Student  account details and settings.</p>
                      
                    </div>
                    <div class="col-lg-8 card-form__body card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fname">First name</label>
                                    <input id="fname" type="text" readonly class="form-control" placeholder="First name" value="<?=$get_student->firstname;?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="lname">Last name</label>
                                    <input id="lname" type="text" readonly class="form-control" placeholder="Last name" value="<?=$get_student->surname;?>">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fname">Email</label>
                                    <input id="fname" type="text" readonly class="form-control" placeholder="First name" value="<?=$get_student->email;?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="lname">Phone Number</label>
                                    <input id="lname" type="text" readonly class="form-control" placeholder="Last name" value="<?=$get_student->tel;?>">
                                </div>
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc">Address</label>
                            <textarea id="desc" rows="2" readonly class="form-control" placeholder="Address ..."><?=$get_student->address;?></textarea>
                        </div>
                        
                    
                    </div>
                </div>
            </div>

    
     
         
        </div>
        <div class="tab-pane fade" id="activity_purchases">
            <!-- SECOND TAB CONTENT -->

         

            <div class="row card-group-row  pt-2">

                    <?php 
                        $get_payments = $getFromCourse->get_single_g('payment', 'user_id', $get_student->id);
                        foreach($get_payments as $payment):
                    ?>
                <div class="col-md-6 col-lg-4 card-group-row__col">
                    <div class="card card-group-row__card pricing__card">

                        <div class="card-body d-flex flex-column">
                            <div class="text-center">
                                <h4 class="pricing__title mb-0">
                                <?=$getFromCourse->get_single('courses', $payment->course_id)->course_name;?></h4>
                                <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                                    <span class="pricing__amount headings-color"><?=$getFromCourse->get_sum_payment($get_student->id,$payment->course_id);?></span>
                                    <span class="d-flex flex-column">
                                        <span class="pricing__currency text-dark-gray text-left">USD</span>
                                       
                                    </span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">

                                <ul class="list-unstyled pricing__features">

                                    <li><?=$payment->date_created; ?></li>

                                   
                                </ul>

                                <a href="admin/billing/" class="btn btn-secondary mt-auto">Edit Now</a>
                            </div>
                        </div>
                    </div>
                </div>

               <?php endforeach; ?>
            </div>

            <!-- END SECOND TAB -->
        </div>
        <div class="tab-pane fade" id="document">

            <div class="card">
                <div class="card-header card-header-large bg-white d-flex align-items-center">
                    <h4 class="card-header__title flex m-0">Registered Schools</h4>
                   
                </div>
                
                <div class="list-group tab-content list-group-flush">
                    <div class="tab-pane active show fade" id="activity_all">


                        <div class="list-group-item list-group-item-action d-flex align-items-center ">
                            
                            <?php 

                                $get_schools = $getFromCourse->get_single_g('student_schools', 'student_id', $get_student->id);
                                foreach($get_schools as $schools):
                            
                            
                            ?>

                            <div class="flex">
                                <div class="d-flex align-items-middle">
                                
                                    <strong class="text-15pt mr-1"><?=$getFromCourse->get_single('school', $schools->school_id)->school_name?></strong>
                                </div>
                            </div>
                           

                        <?php 
                            endforeach;
                        ?>
                        </div>
                       
                    </div>
                    <div class="tab-pane" id="activity_purchases">

                        <div class="list-group-item list-group-item-action d-flex align-items-center ">
                            <div class="avatar avatar-xs mr-3">
                                <span class="avatar-title rounded-circle bg-success">
                                    <i class="material-icons">monetization_on</i>
                                </span>
                            </div>

                            <div class="flex">
                                <div class="d-flex align-items-middle">
                                    <div class="avatar avatar-xxs mr-1">
                                        <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>
                                    <strong class="text-15pt mr-1">Sherri J. Cardenas</strong>

                                </div>
                                <small class="text-muted">4 days ago</small>
                            </div>
                            <div>$573</div>
                            <i class="material-icons icon-muted ml-3">arrow_forward</i>
                        </div>

                        <div class="list-group-item list-group-item-action d-flex align-items-center ">
                            <div class="avatar avatar-xs mr-3">
                                <span class="avatar-title rounded-circle bg-success">
                                    <i class="material-icons">monetization_on</i>
                                </span>
                            </div>

                            <div class="flex">
                                <div class="d-flex align-items-middle">
                                    <div class="avatar avatar-xxs mr-1">
                                        <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>
                                    <strong class="text-15pt mr-1">Joseph S. Ferland</strong>

                                </div>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <div>$612</div>
                            <i class="material-icons icon-muted ml-3">arrow_forward</i>
                        </div>

                        <div class="list-group-item list-group-item-action d-flex align-items-center ">
                            <div class="avatar avatar-xs mr-3">
                                <span class="avatar-title rounded-circle bg-success">
                                    <i class="material-icons">monetization_on</i>
                                </span>
                            </div>

                            <div class="flex">
                                <div class="d-flex align-items-middle">
                                    <div class="avatar avatar-xxs mr-1">
                                        <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>
                                    <strong class="text-15pt mr-1">Bryan K. Davis</strong>

                                </div>
                                <small class="text-muted">2 days ago</small>
                            </div>
                            <div>$244</div>
                            <i class="material-icons icon-muted ml-3">arrow_forward</i>
                        </div>

                        <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                            <div class="avatar avatar-xs mr-3">
                                <span class="avatar-title rounded-circle bg-success">
                                    <i class="material-icons">monetization_on</i>
                                </span>
                            </div>

                            <div class="flex">
                                <div class="d-flex align-items-middle">
                                    <div class="avatar avatar-xxs mr-1">
                                        <img src="assets/images/256_joao-silas-636453-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>
                                    <strong class="text-15pt mr-1">Kaci M. Langston</strong>

                                </div>
                                <small class="text-muted">1 day ago</small>
                            </div>
                            <div>$664</div>
                            <i class="material-icons icon-muted ml-3">arrow_forward</i>
                        </div>

                        <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                            <div class="avatar avatar-xs mr-3">
                                <span class="avatar-title rounded-circle bg-success">
                                    <i class="material-icons">monetization_on</i>
                                </span>
                            </div>

                            <div class="flex">
                                <div class="d-flex align-items-middle">
                                    <div class="avatar avatar-xxs mr-1">
                                        <img src="assets/images/256_michael-dam-258165-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>
                                    <strong class="text-15pt mr-1"></strong>

                                </div>
                                <small class="text-muted">just now</small>
                            </div>
                            <div>$631</div>
                            <i class="material-icons icon-muted ml-3">arrow_forward</i>
                        </div>

                    </div>
                    <div class="tab-pane" id="activity_emails">

                        <div class="list-group-item list-group-item-action d-flex align-items-center ">
                            <div class="avatar avatar-xs mr-3">
                                <span class="avatar-title rounded-circle bg-secondary">
                                    <i class="material-icons">email</i>
                                </span>
                            </div>

                            <div class="flex">
                                <div class="d-flex align-items-middle">
                                    <div class="avatar avatar-xxs mr-1">
                                        <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>
                                    <strong class="text-15pt mr-1">Jenell D. Matney</strong>

                                </div>
                                <small>Confirmation required for design</small>
                            </div>
                            <small class="text-muted">4 days ago</small>
                            <i class="material-icons icon-muted ml-3">arrow_forward</i>
                        </div>

                        <div class="list-group-item list-group-item-action d-flex align-items-center ">
                            <div class="avatar avatar-xs mr-3">
                                <span class="avatar-title rounded-circle bg-secondary">
                                    <i class="material-icons">email</i>
                                </span>
                            </div>

                            <div class="flex">
                                <div class="d-flex align-items-middle">
                                    <div class="avatar avatar-xxs mr-1">
                                        <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>
                                    <strong class="text-15pt mr-1">Sherri J. Cardenas</strong>

                                </div>
                                <small>Improve spacings on Projects page</small>
                            </div>
                            <small class="text-muted">3 days ago</small>
                            <i class="material-icons icon-muted ml-3">arrow_forward</i>
                        </div>

                        <div class="list-group-item list-group-item-action d-flex align-items-center ">
                            <div class="avatar avatar-xs mr-3">
                                <span class="avatar-title rounded-circle bg-secondary">
                                    <i class="material-icons">email</i>
                                </span>
                            </div>

                            <div class="flex">
                                <div class="d-flex align-items-middle">
                                    <div class="avatar avatar-xxs mr-1">
                                        <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>
                                    <strong class="text-15pt mr-1">Joseph S. Ferland</strong>

                                </div>
                                <small>You unlocked a new Badge</small>
                            </div>
                            <small class="text-muted">2 days ago</small>
                            <i class="material-icons icon-muted ml-3">arrow_forward</i>
                        </div>

                    </div>
                    <div class="tab-pane" id="activity_quotes"></div>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="inboxx">

            <div class="app-chat-container">
                <div class="row h-100 m-0">
                    <div class="col-lg-4 py-3 px-0 d-none d-lg-flex flex-column h-100">
                        <div class="search-form form-control-rounded search-form--light mx-3">
                            <input type="text" class="form-control" placeholder="What are you looking for?" id="searchSample02">
                            <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                        </div>

                        <div class="flex pt-3 ps ps--active-y" data-perfect-scrollbar="">

                            <div class="list-group list-group-flush" style="position: relative; z-index: 0;">

                                <div class="list-group-item d-flex align-items-start bg-transparent">
                                    <div class="mr-3 d-flex flex-column align-items-center">
                                        <a href="#" class="avatar avatar-xs mb-2">
                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </a>
                                        <a href="#" class="text-muted"><i class="material-icons icon-16pt">star_border</i></a>
                                    </div>
                                    <div class="flex">
                                        <p class="m-0">
                                            <span class="d-flex align-items-center mb-1">
                                                <a href="#" class="text-dark-gray"><strong>Sherri J. Cardenas</strong></a>
                                                <small class="ml-auto text-muted">Today</small>
                                            </span>
                                            <span class="d-flex align-items-end">
                                                <span class="flex mr-3">
                                                    <strong class="text-body mb-1">When will Windows 11 come out?</strong><br>
                                                    <small class="text-muted" style="max-height: 2.5rem; overflow: hidden; position: relative; display: inline-block;">Answer: Never. There is no Windows 11. Microsoft does not have a team of pro...</small>
                                                </span>
                                                <a href="#" class="d-flex align-items-center mb-1">
                                                    <small class="text-muted mr-1">2</small>
                                                    <i class="material-icons icon-16pt">attachment</i>
                                                </a>
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="list-group-item d-flex align-items-start border-right-3 border-right-primary">
                                    <div class="mr-3 d-flex flex-column align-items-center">
                                        <a href="#" class="avatar avatar-xs mb-2">
                                            <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </a>
                                        <a href="#"><i class="material-icons icon-16pt">star</i></a>
                                    </div>
                                    <div class="flex">
                                        <p class="m-0">
                                            <span class="d-flex align-items-center mb-1">
                                                <a href="#" class="text-dark-gray"><strong>Jenell D. Matney</strong></a>
                                                <small class="ml-auto text-muted">March 24</small>
                                            </span>
                                            <span class="d-flex align-items-end">
                                                <span class="flex mr-3">
                                                    <strong class="text-body mb-1">Thank you for contacting XBody</strong><br>
                                                    <small class="text-muted" style="max-height: 2.5rem; overflow: hidden; position: relative; display: inline-block;">Dear Sean, Thank you for showing and interest in our products, we are looking forward to talking to you and welcoming you in the XBody Family ..</small>
                                                </span>
                                                <a href="#" class="d-flex align-items-center mb-1">
                                                    <small class="text-muted mr-1">2</small>
                                                    <i class="material-icons icon-16pt">attachment</i>
                                                </a>
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="list-group-item d-flex align-items-start bg-transparent">
                                    <div class="mr-3 d-flex flex-column align-items-center">
                                        <a href="#" class="avatar avatar-xs mb-2">
                                            <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </a>
                                        <a href="#" class="text-muted"><i class="material-icons icon-16pt">star_border</i></a>
                                    </div>
                                    <div class="flex">
                                        <p class="m-0">
                                            <span class="d-flex align-items-center mb-1">
                                                <a href="#" class="text-dark-gray"><strong>Joseph S. Ferland</strong></a>
                                                <small class="ml-auto text-muted">March 23</small>
                                            </span>
                                            <span class="d-flex align-items-end">
                                                <span class="flex mr-3">
                                                    <strong class="text-body mb-1">Why Designing Your Own UI Style Guide System Matters</strong><br>
                                                    <small class="text-muted" style="max-height: 2.5rem; overflow: hidden; position: relative; display: inline-block;">Stories for Sean Todays highlights Why Designing Your Own Style Guide System Matters Before divind deep into desi...</small>
                                                </span>
                                                <a href="#" class="d-flex align-items-center mb-1">
                                                    <small class="text-muted mr-1">2</small>
                                                    <i class="material-icons icon-16pt">attachment</i>
                                                </a>
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="list-group-item d-flex align-items-start bg-transparent">
                                    <div class="mr-3 d-flex flex-column align-items-center">
                                        <a href="#" class="avatar avatar-xs mb-2">
                                            <img src="assets/images/256_joao-silas-636453-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </a>
                                        <a href="#" class="text-muted"><i class="material-icons icon-16pt">star_border</i></a>
                                    </div>
                                    <div class="flex">
                                        <p class="m-0">
                                            <span class="d-flex align-items-center mb-1">
                                                <a href="#" class="text-dark-gray"><strong>UX Collective</strong></a>
                                                <small class="ml-auto text-muted">Feb 28</small>
                                            </span>
                                            <span class="d-flex align-items-end">
                                                <span class="flex mr-3">
                                                    <strong class="text-body mb-1">How to hire UX Researchers</strong><br>
                                                    <small class="text-muted" style="max-height: 2.5rem; overflow: hidden; position: relative; display: inline-block;">How to hire UX Researchers — and more design links this week How to test the skills of a UX researcher...</small>
                                                </span>
                                                <a href="#" class="d-flex align-items-center mb-1">
                                                    <small class="text-muted mr-1">2</small>
                                                    <i class="material-icons icon-16pt">attachment</i>
                                                </a>
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="list-group-item d-flex align-items-start bg-transparent">
                                    <div class="mr-3 d-flex flex-column align-items-center">
                                        <a href="#" class="avatar avatar-xs mb-2">
                                            <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </a>
                                        <a href="#" class="text-muted"><i class="material-icons icon-16pt">star_border</i></a>
                                    </div>
                                    <div class="flex">
                                        <p class="m-0">
                                            <span class="d-flex align-items-center mb-1">
                                                <a href="#" class="text-dark-gray"><strong>Elizabeth J. Ohara</strong></a>
                                                <small class="ml-auto text-muted">Feb 24</small>
                                            </span>
                                            <span class="d-flex align-items-end">
                                                <span class="flex mr-3">
                                                    <strong class="text-body mb-1">Business Analyst</strong><br>
                                                    <small class="text-muted" style="max-height: 2.5rem; overflow: hidden; position: relative; display: inline-block;"></small>
                                                </span>
                                                <a href="#" class="d-flex align-items-center mb-1">
                                                    <small class="text-muted mr-1">2</small>
                                                    <i class="material-icons icon-16pt">attachment</i>
                                                </a>
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="list-group-item d-flex align-items-start bg-transparent">
                                    <div class="mr-3 d-flex flex-column align-items-center">
                                        <a href="#" class="avatar avatar-xs mb-2">
                                            <img src="assets/images/256_michael-dam-258165-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </a>
                                        <a href="#" class="text-muted"><i class="material-icons icon-16pt">star_border</i></a>
                                    </div>
                                    <div class="flex">
                                        <p class="m-0">
                                            <span class="d-flex align-items-center mb-1">
                                                <a href="#" class="text-dark-gray"><strong>Kaci M. Langston</strong></a>
                                                <small class="ml-auto text-muted">Feb 22</small>
                                            </span>
                                            <span class="d-flex align-items-end">
                                                <span class="flex mr-3">
                                                    <strong class="text-body mb-1">Human Resources</strong><br>
                                                    <small class="text-muted" style="max-height: 2.5rem; overflow: hidden; position: relative; display: inline-block;"></small>
                                                </span>
                                                <a href="#" class="d-flex align-items-center mb-1">
                                                    <small class="text-muted mr-1">2</small>
                                                    <i class="material-icons icon-16pt">attachment</i>
                                                </a>
                                            </span>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        <div class="ps__rail-x" style="left: 0px; bottom: -304px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 304px; height: 459px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 183px; height: 276px;"></div></div></div>

                        <div class="border-top pt-3 px-3 text-center">
                            <a href="#" class="btn btn-primary">Create Message</a>
                        </div>

                    </div>
                    <div class="col-lg-8 py-3 px-4 bg-white border-left d-flex flex-column h-100">
                        <div class="flex ps ps--active-y" data-perfect-scrollbar="">
                            <div class="d-flex align-items-center mb-3">
                                <a href="#" class="avatar avatar-sm mr-3">
                                    <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                </a>
                                <div class="flex">
                                    <p class="m-0">
                                        <span class="d-flex align-items-center">
                                            <a href="#" class="text-dark-gray"><strong>Jenell D. Matney</strong></a>
                                            <small class="ml-auto text-muted">March 24</small>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <h1 class="h4 flex">Thank you for contacting XBody</h1>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="text-dark-gray">
                                        <i class="material-icons">reply</i>
                                    </a>
                                    <a href="#" class="text-dark-gray ml-2">
                                        <i class="material-icons">print</i>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex mr-3">
                                    <p>Dear Sean,<br><br>Thank you for contacting us, we are looking forward to talking to you and welcoming you in the XBody Family! <br><br>You have given us the following details in your message:</p>
                                    <blockquote class="border-left-3 pl-3">
                                        <p class="text-dark-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur inventore corporis maxime ipsum animi, quo voluptate hic, accusantium qui beatae assumenda praesentium exercitationem cum enim nobis cumque, voluptates nesciunt quibusdam.</p>
                                    </blockquote>
                                    <p>Please do not respond to this email (you can reach us at: <a href="#">sales@xbodyworld.com</a>), this is a confirmation reply to let you know we have successfully received your message and forwarded it to our team. <br><br>
                                        One of our colleagues will try to contact you within two business days and answer any of your questions. <br><br>Kind regards,<br>Team XBody</p>
                                </div>
                                <div class="text-center ml-3">
                                    <a href="#" class="d-flex flex-column mb-3">
                                        <i class="material-icons">star</i>
                                        <small class="text-muted">Starred</small>
                                    </a>

                                    <a href="#" class="d-flex flex-column">
                                        <i class="material-icons">attachment</i>
                                        <small class="text-muted">2 Attachments</small>
                                    </a>
                                </div>
                            </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 496px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 473px;"></div></div></div>
                        <div class="border-top pt-3 px-3 text-center">
                            Click here to <a class="btn btn-link px-0" href="#">Reply</a> or <a class="btn btn-link px-0" href="#">Forward</a> this message.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</div>

</div>
<!-- // END header-layout__content -->
