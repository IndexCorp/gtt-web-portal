<?php
    $student = $getFromStudent->get_single('user', $std_id);


?>
<?php
    $edit_account = 'active';

?>
                <!-- Header Layout Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


                    <div class="page__heading border-bottom">
                        <div class="container-fluid page__container d-flex align-items-center">
                            <h1 class="mb-0">Edit Account</h1>
                        </div>
                    </div>
                    <form method="post" action="student/edit-account/" enctype="multiparth/form-data">
                        <div class="container-fluid page__container">
                            <div class="card card-form">
                                <div class="row no-gutters">
                                    <div class="col-lg-4 card-body">
                                        <p><strong class="headings-color">Basic Information</strong></p>
                                        <p class="text-muted mb-0">Edit your account details and settings.</p>
                                    </div>
                                    <div class="col-lg-8 card-form__body card-body">
                                        <div class="row">
                                        <div class="col-6">
                                                <div class="form-group">
                                                    <label for="title">Title</label><br />
                                                    <select id="title" name="title" class="custom-select w-auto">
                                                        <option value="<?=$student->title;?>"><?=$student->title;?></option>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Mrs">Mrs</option>
                                                        <option value="Miss">Miss</option>
                                                        <option value="Master">Master</option>
                                                        <option value="Dr">Dr</option>
                                                        
                                                    </select>
                                                
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="Firstname">First name</label>
                                                    <input id="Firstname" name="firstname" type="text" class="form-control" placeholder="First name" value="<?=$student->firstname;?>">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="surname">Surname</label>
                                                    <input id="surname" name="surname" type="text" class="form-control" placeholder="Surname" value="<?=$student->surname;?>">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="middlename">Middle Name</label>
                                                    <input id="middlename"  name="middlename" type="text" class="form-control" placeholder="Middle Name" value="<?=$student->middle_name;?>">
                                                </div>
                                            </div>
    

                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="country">Country</label><br />
                                                    <select id="country" name="country" class="custom-select w-auto">
                                                        <option value="<?=$student->nationality;?>"><?=$student->nationality;?></option>
                                                        <option value="usa">Canada</option>
                                                    </select>
                                                
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="desc">Bio / Description</label>
                                                    <textarea id="desc"  name="bio" rows="4" class="form-control" placeholder="Bio / description ..."><?=$student->bio;?></textarea>
                                                </div>
                                             </div>
                                            </div>
                                       
                                        <div class="form-group">
                                            <label for="subscribe">Subscribe to newsletter</label><br>
                                            <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                                <input checked="" type="checkbox" id="subscribe" name="subscribe" class="custom-control-input">
                                                <label class="custom-control-label" for="subscribe">Yes</label>
                                            </div>
                                            <label for="subscribe" class="mb-0">Yes</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card card-form">
                                <div class="row no-gutters">
                                    <div class="col-lg-4 card-body">
                                        <p><strong class="headings-color">Update Your Password</strong></p>
                                        <p class="text-muted mb-0">Change your password.</p>
                                    </div>
                                    <div class="col-lg-8 card-form__body card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input id="email" name="email" type="email" value="<?=$student->email;?>" class="form-control" placeholder="Email Address" >
                                                    <input id="id" name="id" type="hidden" value="<?=$std_id;?>" class="form-control" >
                                                </div>
                                                 <div class="form-group">
                                                    <label for="tel">Telephone Number</label>
                                                    <input id="tel" name="tel" type="tel" value="<?=$student->tel;?>" class="form-control" placeholder="Telephone Number" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="opass">Old Password</label>
                                                    <input id="opass" name="opass" type="password" value="<?=$student->password;?>" class="form-control" placeholder="Old password" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="npass">New Password</label>
                                                    <input id="npass" name="npass" type="password" class="form-control ">
                                                
                                                </div>
                                              <!--  <div class="form-group">
                                                    <label for="cpass">Confirm Password</label>
                                                    <input id="cpass" name="cpass" type="password" class="form-control" placeholder="Confirm password">
                                                </div>-->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                                
    


                            <div class="card card-form">
                                <div class="row no-gutters">
                                    <div class="col-lg-4 card-body">
                                        <p><strong class="headings-color">Profile Settings</strong></p>
                                        <p class="text-muted mb-0">Update your public profile with relevant and meaningful information.</p>
                                    </div>
                                    <div class="col-lg-8 card-form__body card-body">
                                        <div class="form-group">
                                            <label>Avatar</label>
                                            <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["assets/images/account-add-photo.svg"]'>
                                                <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                                    <div class="avatar avatar-lg">
                                                        <img src="<?=BASE_URL;?>/admin/<?=$student->profileimage;?>" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                <input type="file" name="profileimage" value="Choose photo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Contact Address</label>
                                            <textarea id="address" name="address" rows="4" class="form-control" placeholder="Description ..."><?=$student->address;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="social1">Social links</label>
                                            <div class="row">
                                                <div class="col-md-6">

            
                                                    <div class="input-group input-group-merge mb-2">
                                                        <input id="facebook" name="facebook" value="<?=$student->facebook;?>" type="text" class="form-control form-control-prepended" placeholder="Facebook">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <span class="fab fa-facebook text-facebook"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group input-group-merge mb-2">
                                                        <input id="twitter" name="twitter" value="<?=$student->twitter;?>" type="text" class="form-control form-control-prepended" placeholder="Twitter">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <span class="fab fa-twitter text-twitter"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group input-group-merge mb-2">
                                                        <input id="instagram" name="instagram" value="<?=$student->instagram;?>" type="text" class="form-control form-control-prepended" placeholder="Instagram">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <span class="fab fa-instagram text-instagram"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="customCheck1">Available for freelance?</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"  id="freelance" name="freelance" >
                                                <label class="custom-control-label" for="customCheck1">Yes, show me as available for freelance!</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mb-5">
                                <input type="submit" name="edit_student_profile" value="Update Changes" class="btn btn-success"></input>
                            </div>
                        </div>
                    </form>


                </div>
                <!-- // END header-layout__content -->

         