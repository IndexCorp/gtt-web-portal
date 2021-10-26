<?php
    $student = 'active';
 ?>
  <?php 

if(isset($_GET['manage-admin'])){
   
    if(!empty($_GET['manage-admin'])){
        $id = $_GET['manage-admin'];

        $get_admin = $getFromAdmin->get_single('user', $id);
        
    }
   
}
  

  ?>
  <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Manage Admin Details </h1>
        
    </div>
</div>
<div class="bg-white border-bottom mb-3">
    <div class="container-fluid nav nav-tabs" role="tablist">
        <a href="#c-bio" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Admin Bio Data</a>
         
    </div>
</div>

<div class="container-fluid page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-bio">
            <!-- FIRST TAB CONTENT -->
         <form method="post" action="admin/manage-admin" enctype="multipart/form-data">
            <div class="col-lg-12 card-form__body card-body">
                <div class="row">
                    <div class="col">
                            <div class="form-group">
                                <label for="select01">Title</label>
                                <select id="select01" name="title" required data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                    
                                <?php 
                                    if(!empty($_GET['manage-admin'])){  ?>
                                        <option value="<?=@$get_admin->title;?>"><?=@$get_admin->title;?></option>
                                    <?php }else{?>
                                        <option value="">Select Title</option>
                                    <?php }?>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Dr">Dr</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                    </div>
                    <div class="col">
                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input id="surname"  name="surname"  value="<?=@$get_admin->surname;?>" type="text" class="form-control" placeholder="Surname" >
                            </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <input id="firstname" name="firstname" type="text" class="form-control" placeholder="First name" value="<?=@$get_admin->firstname;?>">
                        </div>
                    </div>
                </div>

            <!--    <div class="row">
                    <div class="col">
                            <div class="form-group">
                                <label for="middlename">Middle Name</label>
                                <input id="middlename" name="middlename" type="text" class="form-control" placeholder="Middle Name" value="<?=@$get_admin->middle_name;?>">
                         
                            </div>
                    </div>
                    <div class="col">
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input id="dob" name="dob" type="date" class="form-control" placeholder="dob" value="<?=@$get_admin->dob;?>">
                            </div>
                    </div>
                        <div class="col">
                        <div class="form-group">
                            <label for="country">Country</label><br>
                            <select id="country" name="country" class="custom-select w-auto">
                            <?php 
                            if(!empty($_GET['manage-admin'])){  ?>
                                <option value="<?=@$get_admin->nationality;?>"><?=@$get_admin->nationality;?></option>
                            <?php }else{?>
                                <option value="">Select Country</option>
                            <?php }?>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Ghana">Ghana</option>
                                <option value="usa">United State</option>
                            </select>
                        
                      </div>
                    </div>
                </div>-->

                <div class="row">
                    <div class="col">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input id="email" name="email" type="email" class="form-control" placeholder="Email address" value="<?=@$get_admin->email;?>">
                         
                            </div>
                    </div>
                    <div class="col">
                            <div class="form-group">
                                <label for="tel">Phone Number</label>
                                <input id="tel" name="tel" type="tel" class="form-control" placeholder="Phone Number" value="<?=@$get_admin->tel;?>">
                            </div>
                    </div>

                    
                    <div class="col">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="select01" name="gender" required data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                                
                            <?php 
                                if(!empty($_GET['manage-admin'])){  ?>
                                    <option value="<?=@$get_admin->gender;?>"><?=@$get_admin->gender;?></option>
                                <?php }else{?>
                                    <option value="">Select Gender</option>
                                <?php }?>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                               
                                <option value="Others">Prefer not Say</option>
                            </select>
                        </div>
                    </div>
                
                </div>
                <div class="row">
                
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="desc">Password</label>
                            <input type="password" id="password" name="password" character="*" class="form-control" value="<?=@$get_admin->password;?>">
                        </div>
                    </div>
                  <!--  <div class="col-md-9">
                    <div class="form-group">
                        <label for="desc">Home Address</label>
                        <textarea id="address" name="address" rows="3" class="form-control" placeholder="Home Address ..."><?//=@$get_admin->address;?></textarea>
                    </div>

              
                   <div class="col">
             
                                 <div class="form-group">
                                        <label>Avatar</label>
                                        <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["<?//=BASE_URL;?>/admin/<?//=@$get_admin->profileimage;?>"]'>
                                            <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                                <div class="avatar avatar-lg">
                                                    <img src="<?//=BASE_URL;?>/admin/<?//=@$get_admin->profileimage;?>" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <input type="file" name="profileimage" id="profileimage"  class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                    </div>-->
                </div>
                 
                <?php 
                
                        if(!empty($get_admin->id) ){

                  
                
                
                ?>
                 <input id="id_post"  name="id_post"  value="<?=@$get_admin->id;?>" type="hidden" class="form-control">
                 <input id="type_act"  name="type_act"  value="update" type="hidden" class="form-control">
                            
                <div class="form-group">
                   <input type="submit" name="admin_bio_data" value="Update Changes" class="btn btn-outline-warning" >
                </div>

                <?php }else{?> <input id="type_act"  name="type_act"  value="save" type="hidden" class="form-control">
                            
                    <div class="form-group">
                   <input type="submit" name="admin_bio_data" class="btn btn-outline-primary">
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