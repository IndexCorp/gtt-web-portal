
  <?php 

if(isset($_GET['create_school'])){
   
    if(!empty($_GET['create_school'])){
        $id = $_GET['create_school'];

        $get_sch = $getFromCourse->get_single('school', $id);
       
    }
   
}
  

  ?>
  <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">School Menu</h1><br>
        <a class="btn btn-secondary" href="admin/school/"> Back to School</a>
        
    </div>
</div>

<div class="container-fluid page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-bio">
            <!-- FIRST TAB CONTENT -->
         <form method="post" action="admin/create_school" enctype="multipart/form-data">
            <div class="col-lg-8 offset-2 card-form__body card-body">
                <div class="row">
                   
                    <div class="col">
                            <div class="form-group">
                                <label for="school_name">School Name</label>
                                <input id="school_name"  name="school_name"  value="<?=@$get_sch->school_name;?>" type="text" class="form-control" placeholder="Category Name" >
                            </div>
                  </div>
               
                    <div class="col">
             
                                       <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["<?=BASE_URL;?>/admin/<?=@$get_sch->profileimage;?>"]'>
                                            <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                                <div class="avatar avatar-lg">
                                                    <img src="<?=BASE_URL;?>/admin/<?=@$get_sch->avatar;?>" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                                                </div>
                                            </div>
                                          
                                        </div>
                                  
                    </div>
                    </div>

            <div class="col">
             
             <div class="form-group">
                    <label>Avatar</label>
                    <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["<?=BASE_URL;?>/admin/<?=@$get_sch->profileimage;?>"]'>
                      
                        <div class="media-body">
                            <input type="file" name="avatar" id="avatar"  class="form-control" required>
                        </div>
                    </div>
                </div>

                </div>
                 
                <?php 
                
                        if(!empty($_GET['create_school']) ){

                  
                
                
                ?>
                 <input id="school_id"  name="school_id"  value="<?=$get_sch->id;?>" type="hidden" class="form-control">
                 <input id="school_type"  name="school_type"  value="update" type="hidden" class="form-control">
                            
                <div class="form-group">
                   <input type="submit" name="school_data" class="btn btn-outline-warning" value="Update School Info.">
                </div>

                <?php }else{?> 
                <input id="school_type"  name="school_type"  value="save" type="hidden" class="form-control">
                            
                    <div class="form-group">
                   <input type="submit" name="school_data" class="btn btn-outline-primary" value="Save School Info.">
                </div>

                <?php }?>
             </div>
               
         </form>
            <!-- END FIRST TAB CONTENT -->
        </div>

      
     
      
    </div>
</div>


</div>
<!-- // END content -->