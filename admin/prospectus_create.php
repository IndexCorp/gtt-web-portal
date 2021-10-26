
  <?php 

if(isset($_GET['prospectus_create'])){
   
    if(!empty($_GET['prospectus_create'])){
        $id = $_GET['prospectus_create'];

        $get_prospectus = $getFromCourse->get_single('prospectus', $id);
    }
   
}
  

  ?>
  <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Prospectus Menu</h1><br>
        <a class="btn btn-secondary" href="admin/prospectus/"> Back to Prospectus</a>
        
    </div>
</div>

<div class="container-fluid page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-bio">
            <!-- FIRST TAB CONTENT -->
         <form method="post" action="admin/prospectus_create/<?=$id?>" enctype="multipart/form-data">
            <div class="col-lg-8 offset-2 card-form__body card-body">
                <div class="row">
                   
                    <div class="col">
                            <div class="form-group">
                                <label for="doc">Prospectus Name</label>
                                <input id="doc"  name="doc" readonly  value="<?=@$get_prospectus->doc;?>" type="text" class="form-control" placeholder="Category Name" >
                            </div>
                  </div>
               
                  <?php /*  <div class="col">
             
                                       <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["<?=BASE_URL;?>/admin/<?=@$get_prospectus->profileimage;?>"]'>
                                            <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                                <div class="avatar avatar-lg">
                                                    <img src="<?=BASE_URL;?>/admin/<?=@$get_prospectus->avatar;?>" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                                                </div>
                                            </div>
                                          
                                        </div>
                                  
                    </div>
                    */?>
                    </div>

            <div class="col">
             
             <div class="form-group">
                    <label>Avatar</label>
                    <div class="dz-clickable media align-items-center" data-toggle="dropzone" >
                      
                        <div class="media-body">
                            <input type="file" name="avatar" id="avatar"  class="form-control" required>
                        </div>
                    </div>
                </div>

                </div>
                 
              
                 <input id="prospectus_id"  name="prospectus_id"  value="<?=$get_prospectus->id;?>" type="hidden" class="form-control">
                            
                <div class="form-group">
                   <input type="submit" name="update_prospectus" class="btn btn-outline-warning" value="Update Prospectus Info.">
                </div>

             

              
             </div>
               
         </form>
            <!-- END FIRST TAB CONTENT -->
        </div>

      
     
      
    </div>
</div>


</div>
<!-- // END content -->