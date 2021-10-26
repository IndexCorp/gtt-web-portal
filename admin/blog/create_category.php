
  <?php 

if(isset($_GET['create-blog-category'])){
   
    if(!empty($_GET['create-blog-category'])){
        $id = $_GET['create-blog-category'];

        $get_cat = $getFromCourse->get_single('blog_category', $id);
    }
   
}
  

  ?>
  <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Category Menu</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <p>
       <a class="btn btn-secondary btn-xs" href="admin/blog-category"> Back to Category</a>
      
        </p> 
    </div>
</div>

<div class="container-fluid page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-bio">
            <!-- FIRST TAB CONTENT -->
         <form method="post" action="admin/create-blog-category" enctype="multipart/form-data">
            <div class="col-lg-8 offset-2 card-form__body card-body">
                <div class="row">
                   
                    <div class="col">
                            <div class="form-group">
                                <label for="cat_name">Category Name</label>
                                <input id="cat_name"  name="cat_name"  value="<?=@$get_cat->cat_name;?>" type="text" class="form-control" placeholder="Category Name" >
                            </div>
                  </div>
               
                    <div class="col">
             
                                       <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["<?=BASE_URL;?>/admin/<?=@$get_cat->profileimage;?>"]'>
                                            <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                                <div class="avatar avatar-lg">
                                                    <img src="<?=BASE_URL;?>/admin/<?=@$get_cat->avatar;?>" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                                                </div>
                                            </div>
                                          
                                        </div>
                                  
                    </div>
                    </div>

            <div class="col">
             
             <div class="form-group">
                    <label>Avatar</label>
                    <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["<?=BASE_URL;?>/admin/<?=@$get_cat->profileimage;?>"]'>
                      
                        <div class="media-body">
                            <input type="file" name="avatar" id="avatar"  class="form-control" required>
                        </div>
                    </div>
                </div>

                </div>
                 
                <?php 
                
                        if(!empty($_GET['create-blog-category']) ){

                  
                
                
                ?>
                 <input id="cat_id"  name="cat_id"  value="<?=$get_cat->id;?>" type="hidden" class="form-control">
                 <input id="cat_type"  name="cat_type"  value="update" type="hidden" class="form-control">
                            
                <div class="form-group">
                   <input type="submit" name="blog-category_data" class="btn btn-outline-warning" value="Update Category Info.">
                </div>

                <?php }else{?> 
                <input id="cat_type"  name="cat_type"  value="save" type="hidden" class="form-control">
                            
                    <div class="form-group">
                   <input type="submit" name="blog-category_data" class="btn btn-outline-primary" value="Save Category Info.">
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