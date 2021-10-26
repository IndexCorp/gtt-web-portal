<?php 
    $std_id = $_GET['chat'];
    $getFromStudent->update_where('chats', 'student_id', $std_id, array('status'=>1));

?>
                <!-- Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


                    <div class="page__heading border-bottom">
                        <div class="container-fluid page__container d-flex align-items-center">
                            <h1 class="mb-0">Discussions</h1>
                            
                        </div>
                    </div>
                    <div class="bg-white border-bottom mb-3">
                        <div class="container-fluid nav nav-tabs" role="tablist">
                            <a href="#c-curriculum" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Chats</a>
                           
                        </div>
                    </div>
                
                    <div class="container-fluid page__container">
                        <div class="tab-content">
                            
                            <div class="tab-pane active show  fade" id="c-curriculum">
                                <!-- SECOND TAB CONTENT -->

                                <div class="app-chat-container">
                                    <div class="row h-100 m-0">
                                        <div class="col-lg-12 py-3 d-flex flex-column h-100">
                                          
            
                                            <div class="flex p-3 d-flex flex-column">
                                            <form method="post" action="admin/chat/<?=$std_id;?>">
                                            <div class="input-group input-group-merge">
                                            <input type="text" name="chat" class="form-control form-control-appended" required="" placeholder="Type message">
                                            <input type="hidden" name="student_id" value="<?=$std_id?>" class="form-control form-control-appended" required="" placeholder="Type message">
                                                <div class="input-group-append">
                                                  
                                                    <div class="input-group-text pl-0">
                                                        <div class="custom-file custom-file-naked d-flex">
                                                            <input type="submit" name="sumbit_admin_chat" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">
                                                                <i class="material-icons">send</i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                                <div data-perfect-scrollbar="" class="h-100 ps">
                                                    <?php 
                                                        $get_chats = $getFromStudent->get_chats($std_id);

                                                        foreach($get_chats as $chats):
                                                    ?>

                                                    <?php 
                                                    
                                                            if(!empty($chats->message)){
                                                                
                                                    ?>
                                                    <div class="media border-bottom py-3">
                                                        <a href="#" class="avatar avatar-sm mr-3">
                                                            <img src="admin/<?=$getFromStudent->get_single('user', $std_id)->profileimage;?>" class="avatar-img rounded-circle" alt="avatar">
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex">
                                                                    <a href="#" class="text-body bold"><?=$getFromStudent->get_single('user', $std_id)->firstname.' '.$getFromStudent->get_single('user', $std_id)->surname;?></a>
                                                                </div>
                                                                <small class="text-muted"><?=$getFromStudent->timeago($chats->date_created);?></small>
                                                            </div>
                                                            <div><?=$chats->message;?></div>
            
            
                                                        </div>
                                                    </div>

                                                    <?php }?>
                                                    <?php 
                                                                if(!empty($chats->reply)){
                                                                    ?>
                                                    <div class="media border-bottom py-3 text-right bg-light">
                                                      
                                                        <div class="media-body">
                                                            <div class="d-flex align-items-right">
                                                            <?php 
                                                                if(!empty($chats->reply)){
                                                                    ?>
                                                            <small class="text-muted text-left"><?=$getFromStudent->timeago($chats->date_created);?></small>
                                                            <?php }?>
                                                                <div class="flex">
                                                                <?php 
                                                                if(!empty($chats->reply)){
                                                                    ?>
                                                                    <a  class="text-body bold" style="color: gold">Global Trade College Admin</a>
                                                                    <?php }?>
                                                                </div>
                                                             
                                                            </div>
                                                            <div class="text-right"><?=$chats->reply;?></div>
            
                                                          
            
            
                                                        </div>
                                                    </div>
                                                    <?php } endforeach; ?>


                                                    
            
                                                  
            
                                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                                            </div>
            
                                          
            
                                        </div>
                                      
                                    </div>
                                </div>

                                <!-- END SECOND TAB -->
                            </div>
                            <div class="tab-pane fade" id="c-pricing">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter course price ..">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Discounted Price</label>
                                        <textarea class="form-control" id="exampleInputPassword1" placeholder="Enter discounted price.."></textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                            
                        </div>
                    </div>


                </div>
                <!-- // END content -->