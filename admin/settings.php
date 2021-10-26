
        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="container-fluid page__container">
<h2>Portal Settings</h2>
<!--<div class="alert alert-soft-warning d-flex align-items-center card-margin" role="alert">
        <i class="material-icons mr-3">error_outline</i>
        <div class="text-body">You have <strong>5 days left</strong> on your subscription</div>
        <a href="#" class="btn btn-warning ml-auto">Upgrade</a>
    </div>-->

    <div class="row">
        <div class="col-lg-7">

            <div class="card">
                <div class="card-header card-header-large bg-light d-flex align-items-center">
                    <div class="flex">
                        <h4 class="card-header__title">In Progress</h4>
                        <div class="card-subtitle text-muted">Your recent courses</div>
                    </div>
                    <div class="ml-auto">
                        <a href="student/my_courses/" class="btn btn-light">Browse All</a>
                    </div>
                </div>




                <ul class="list-group list-group-flush mb-0" style="z-index: initial;">
                        <li class="list-group-item" style="z-index: initial;">
                            <div class="d-flex align-items-center">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-xs mr-2">
                                    <a href="#" class="mr-3">
                                    <img src="<?=BASE_URL?>/admin/<?=$list->avatar;?>" alt="course" class="avatar-img rounded-circle">

                                </a>
                                      
                                    </div>
                                
                                </div>
                               
                                <div class="flex">
                                    <a href="student/learning/" class="text-body"><strong></strong></a>
                                    <div class="d-flex align-items-center">
                                 
                                        <div class="progress" style="width: 100px; height:4px;">
                                      
                                            <div class="progress-bar bg-danger" role="progressbar" style="width:12%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                  <div class="progress-bar bg-warning" role="progressbar" style="width:12%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            

                                                    
                                      </div>
                                      
                                        <small class="text-muted ml-2">98%</small>

                                       
                                    <!--    <small class="text-muted ml-2">25%</small>-->
                                    </div>
                                </div>
                                <div class="dropdown ml-3">
                                    <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item"  target="/" href="admin/student/open_file_aies.php?id=<?=@$aies->id?>&type=aies" >AIES Letter</a>
                                        <a class="dropdown-item"  target="/" href="admin/student/open_file.php?id=<?=@$cert->id?>&type=cert">Certificate</a>
                                     </div>
                                </div>
                            </div>
                        </li>
                     
                  

                </ul>
            </div>

           
       </div>
       </div>
       </div>
       </div></div>

</div>
<!-- // END header-layout__content -->

