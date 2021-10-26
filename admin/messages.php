
                <!-- CONTENT -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">

                    <div class="container-fluid page__container">
                        <div class="row">
                           <!--  <div class="col-md-3">
                               <a href="#" class="btn btn-success mb-3 btn-block">Create <i class="material-icons">add_circle_outline</i></a>
                                <ul class="list-group">
                                    <li class="list-group-item active"><a href="#" class="text-white">All Threads</a></li>
                                    <li class="list-group-item"><a href="#">My Posts</a></li>
                                    <li class="list-group-item"><a href="#">Following</a></li>
                                    <li class="list-group-item"><a href="#">Resolved</a></li>
                                    <li class="list-group-item"><a href="#">Unresolved</a></li>
                                </ul>
                            </div>-->
                          
                            <div class="col-md-12">
                                <div class="d-flex mb-3">
                                  
                                   <!-- <div class="ml-auto d-flex">
                                        <div class="form-group form-inline mb-0">
                                            <label for="sort" class="mr-2">Sort by</label>
                                            <select class="form-control" id="sort">
                                                <option value="">Newest</option>
                                                <option value="">Oldest</option>
                                            </select>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="stories-cards mb-4">
                                
                            
                                <?php 

                                if(isset($_GET['message'])){

                                        $limit = 10;
                                    if($_GET['message'] == 0){
                                            $page = 1;
                                        $offset = (($page - 1)* $limit );
                                    }else{
                                        $page = $_GET['message'];
                                        $offset = (($page - 1)* $limit );
                                    }

                                    $cur =  $paginations =$getFromStudent->pagination_lower_admin_chat($offset, $limit);

                                    $lower = ($page - 1) * $limit + $cur;
                                    $uper = $getFromStudent->pagination_count_admin_chat();


                                    
                                    
                                    $paginations =$getFromStudent->pagination_admin_chat($offset, $limit);
                                    //var_dump($paginations);

                                    if(!empty($paginations)){
                                    foreach($paginations as $messages):
                                      


                                      
                                ?>

                                    <div class="card">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="m-3">
                                                <a href="admin/chat/<?=$messages->student_id;?>" class="d-flex align-items-center avatar text-muted">
                                                    <!-- LOGO -->
                                                    <img src="admin/<?=$getFromStudent->get_single('user', $messages->student_id)->profileimage; ?>" alt="Avatar" class="avatar-img rounded-circle">

                                                </a>
                                            </div>
                                            <div class="stories-card__title flex">
                                                <h5 class="card-title m-0"><a href="admin/chat/<?=@$messages->student_id;?>" class="text-body"><?php 
                                                
                                                $get = $getFromStudent->get_single('user',$messages->student_id);
                                                echo @$get->firstname.' ' .@$get->surname;
                                                
                                                
                                                
                                                ?></a></h5>
                                              
                                            </div>

                                            <div class="ml-auto">
                                            <?php   if(!empty($messages->reply)){
                                                                    ?>
                                                <div class="badge badge-soft-vuejs badge-pill mr-3">
                                              replied  
                                               
                                                             
                                                <?=$getFromStudent->timeago($messages->date_replied);?>
                                                </div>
                                                 <?php }?>
                                               
                                            </div>

                                            <div class="ml-auto">
                                                <div class="badge badge-soft-vuejs badge-pill mr-3">
                                                
                                                <?php 
                                                
                                                    $count_note = $getFromStudent->count_note($messages->student_id);

                                                    echo $count_note;
                                                    
                                                ?> New Messages</div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php  endforeach; }else{?>

                                        <div class="card">
                                        
                                        <div class="d-flex align-items-center flex-wrap">

                                        <div class="m-3">
                                                <a  class="d-flex align-items-center avatar text-muted">
                                                    <!-- LOGO -->
                                                  
                                                </a>
                                            </div>
                                          
                                            <div class="stories-card__title flex">
                                                <h5 class="card-title m-0" style="color: red;">No Ongoing Chat</h5>
                                              
                                            </div>

                                         

                                         
                                        </div>
                                    </div>

                                    <?php }}?>

                                  


                                </div>

                                <div class="d-flex flex-row align-items-center mb-3">
                                   <!-- <div class="form-inline">
                                        View
                                        <select class="custom-select ml-2">
                                            <option value="20" selected="">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                        </select>
                                    </div>-->
                                    <div class="ml-auto">
                                <?php 

                                if(!empty($paginations)){
                                    if($page == 1){

                                 
                                ?>
                                 <?php }else{
                                        ?> 

                            <a href="student/chat/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
                            <?php }?>
                              <?=$lower;?> <span class=" text-center text-black">of  <?=$uper;?></span>
                                
                              
                                 <?php 
                                    if($lower == $uper){

                                 
                                ?>
                                    <?php }else{
                                        ?> 
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="student/chat/<?=$page + 1?>" class=""><i class="material-icons float-right">arrow_forward</i></a>
                                        <?php }}?>
 
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- // END header-layout__content -->
