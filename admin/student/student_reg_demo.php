<?php 

if(isset($_GET['student_reg'])){

if(!empty($_GET['student_reg'])){
$id = $_GET['student_reg'];

$get_student = $getFromCourse->get_single('user', $id);
}
}


?>
<!-- Content -->
<div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
<div class="container-fluid page__container d-flex align-items-center">
<h1 class="mb-0">Registration</h1>

</div>
</div>
<div class="bg-white border-bottom mb-3">
<div class="container-fluid nav nav-tabs" role="tablist">
<a href="#c-bio" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Bio Data</a>
<a href="#c-employment" data-toggle="tab" role="tab" aria-selected="false">Employment Info</a>
<a href="#c-edu" data-toggle="tab" role="tab" aria-selected="false">Education and Qualifications</a>
<a href="#c-curriculum" data-toggle="tab" role="tab" aria-selected="false">Documents</a>

</div>
</div>

<div class="container-fluid page__container">
<div class="tab-content">
<div class="tab-pane active show fade" id="c-bio">
<!-- FIRST TAB CONTENT -->
<form method="post" action="admin/student_reg">
<div class="col-lg-10 card-form__body card-body">
<div class="row">
<div class="col">
    <div class="form-group">
        <label for="select01">Title</label>
        <select id="select01" name="title" required data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
        <?php 
        if(!empty($_GET['student_reg'])){  ?>
            <option value="<?=@$get_student->title;?>"><?=@$get_student->title;?></option>
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
        <input id="surname"  name="surname" type="text" class="form-control" placeholder="Surname" value="<?=@$get_student->surname;?>">
    </div>
</div>
<div class="col">
<div class="form-group">
    <label for="firstname">First name</label>
    <input id="firstname" name="firstname" type="text" class="form-control" placeholder="First name" value="<?=@$get_student->firstname;?>">
</div>
</div>
</div>

<div class="row">
<div class="col">
    <div class="form-group">
        <label for="middlename">Middle Name</label>
        <input id="middlename" name="middlename" type="text" class="form-control" placeholder="Middle Name" value="<?=@$get_student->middle_name;?>">
    
    </div>
</div>
<div class="col">
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input id="dob" name="dob" type="date" class="form-control" placeholder="dob" value="<?=@$get_student->dob;?>">
    </div>
</div>
<div class="col">
<div class="form-group">
    <label for="gender">Gender</label>
    <select id="select01" name="gender" required data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
    <?php 
        if(!empty($_GET['student_reg'])){  ?>
            <option value="<?=@$get_student->gender;?>"><?=@$get_student->gender;?></option>
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
<div class="col">
    <div class="form-group">
        <label for="email">Email Address</label>
        <input id="email" name="email" type="email" class="form-control" placeholder="Email address" value="<?=@$get_student->email;?>">
    
    </div>
</div>
<div class="col">
    <div class="form-group">
        <label for="tel">Phone Number</label>
        <input id="tel" name="tel" type="tel" class="form-control" placeholder="Phone Number" value="<?=@$get_student->tel;?>">
    </div>
</div>
<div class="col">
<div class="form-group">
    <label for="country">Country</label><br>
    <select id="country" name="country" class="custom-select w-auto">
    <?php 
        if(!empty($_GET['student_reg'])){  ?>
            <option value="<?=@$get_student->nationality;?>"><?=@$get_student->nationality;?></option>
        <?php }else{?>
            <option value="">Select Country</option>
        <?php }?>
        <option value="Nigeria">Nigeria</option>
        <option value="Ghana">Ghana</option>
        <option value="usa">United State</option>
    </select>

</div>
</div>
</div>
<div class="form-group">
<label for="desc">Home Address</label>
<textarea id="address" name="address" rows="3" class="form-control" placeholder="Home Address ..."><?=@$get_student->address;?></textarea>
</div>

<div class="form-group">
<input type="submit" name="student_bio_data" class="btn btn-outline-primary" value="Save Bio Data">
</div>


</div>
</form>
<!-- END FIRST TAB CONTENT -->
</div>

<div class="tab-pane  fade" id="c-employment">
<!-- FIRST TAB CONTENT -->
<form method="post" action="admin/student_reg">
<div class="col-lg-8 card-form__body card-body">
<div class="row">
<div class="col">

<div class="form-group">
    <label for="company">Company Name</label>
    <input id="company" name="company" type="text" class="form-control" placeholder="Company Name"  value="<?=@$get_student->company_name;?>">
    <input type="hidden" name="id" value="<?=@$id;?>">
                    
</div>
</div>
<div class="col">
<div class="form-group">
    <label for="position">Position/Job</label>
    <input id="position" value="<?=@$get_student->position;?>" name="position" type="text" class="form-control" placeholder="Position/Job" >
</div>
</div>
<div class="col">
<div class="form-group">
    <label for="dept">Department</label>
    <input id="dept" value="<?=@$get_student->dept;?>" name="dept" type="text" class="form-control" placeholder="Department" >
</div>
</div>

</div>

<div class="row">

<div class="col">
<div class="form-group">
    <label for="town">Town/City</label>
    <input id="town" value="<?=@$get_student->town;?>" name="town" type="text" class="form-control" placeholder="Town/City" >
</div>
</div>
<div class="col">
<div class="form-group">
    <label for="country">Country</label><br>
    
    <select id="country" name="country" class="custom-select w-auto">
    <?php 
    if(!empty($_GET['student_reg'])){  ?>
        <option value="<?=@$get_student->country;?>"><?=@$get_student->country;?></option>
        <?php }else{?>
            <option value="">Select Country</option>
            <?php }?>

        <option value="usa">United States</option>
        <option value="usa">Canada</option>
    </select>

</div>
</div>
<div class="col">
<div class="form-group">
    <label for="company_address">Company Address</label>
    <textarea id="company_address" name="company_address" rows="3" class="form-control" placeholder="Company Address ..."><?=@$get_student->company_address;?></textarea>
</div>
</div>
</div>
<div class="row">
<div class="col-4 offset-4">
<div class="form-group">
    <input type="submit" name="student_employment_data" class="btn btn-outline-primary" value="Save Employment Info">
</div>

</div>
</div>




</div>
</form>
<!-- END FIRST TAB CONTENT -->
</div>

<div class="tab-pane fade" id="c-edu">

<form method="post" action="admin/student_reg">

<div class="row">


<div class="col-3">
<div class="form-group">
    <label for="country">Highest Level of Education</label><br>
    <select id="country" name="qualification" class="custom-select w-auto">
    <?php 
    if(!empty($_GET['student_reg'])){  ?>
        <option value="<?=@$get_student->qualification;?>"><?=@$get_student->qualification;?></option>
        <?php }else{?>
            <option value="">Select Country</option>
            <?php }?>
        <option value="">Select Qualification</option>
        <option value="University Degree">University Degree</option>
        <option value="OND">OND</option>
        <option value="HND">HND</option>
        <option value="Post Graduate Diploma">Post Graduate Diploma</option>
        <option value="Masters">Masters</option>
        <option value="PHD">PHD</option>
    </select>

</div>
</div>
<div class="col-6">
<div class="row">
        <div class="col-4">
            <div class="form-group text-center">
                <div class="custom-control custom-checkbox">
                <?php 
                    if(!empty(@$get_student->ond)) {
                        echo '<input type="checkbox" class="custom-control-input" id="ond" name="ond" checked>';
                    } else {
                        echo '<input type="checkbox" class="custom-control-input" id="ond" name="ond">';
                    }
                ?>
                    
                    <input type="hidden" name="id" value="<?=@$id;?>">
                    <label class="custom-control-label" for="ond">ND</label>
                </div>
            </div>
        </div>

        <div class="col-4">
                <div class="form-group text-center">
                    <div class="custom-control custom-checkbox">
                    <?php 
                    if(!empty(@$get_student->hnd)) {
                        echo '<input type="checkbox" class="custom-control-input" id="HND" name="hnd" checked>';
                    } else {
                        echo '<input type="checkbox" class="custom-control-input" id="HND" name="hnd">';
                    }
                    ?>
                        <label class="custom-control-label" for="HND">HND</label>
                    </div>
                </div>
        </div>

        <div class="col-4">
            <div class="form-group text-center">
                <div class="custom-control custom-checkbox">
                <?php 
                    if(!empty(@$get_student->bsc)) {
                        echo '<input type="checkbox" class="custom-control-input" id="BSC" name="bsc" checked>';
                    } else {
                        echo '<input type="checkbox" class="custom-control-input" id="BSC" name="bsc">';
                    }
                ?>
                    <label class="custom-control-label" for="BSC">University Degree</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-4">
                <div class="form-group text-center">
                    <div class="custom-control custom-checkbox">
                    <?php 
                    if(!empty(@$get_student->pgd)) {
                        echo '<input type="checkbox" class="custom-control-input" id="pgd" name="pgd" checked>';
                    } else {
                        echo '<input type="checkbox" class="custom-control-input" id="pgd" name="pgd">';
                    }
                    ?>
                        <label class="custom-control-label" for="pgd">Post-Graduate Diploma</label>
                    </div>
                </div>
        </div>

        <div class="col-4">
            <div class="form-group text-center">
                <div class="custom-control custom-checkbox">
                <?php 
                    if(!empty(@$get_student->masters)) {
                        echo '<input type="checkbox" class="custom-control-input" id="masters" name="masters" checked>';
                    } else {
                        echo '<input type="checkbox" class="custom-control-input" id="masters" name="masters">';
                    }
                ?>
                    <label class="custom-control-label" for="masters">Masters</label>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group text-center">
                <div class="custom-control custom-checkbox">
                <?php 
                    if(!empty(@$get_student->phd)) {
                        echo '<input type="checkbox" class="custom-control-input" id="phd" name="phd" checked>';
                    } else {
                        echo '<input type="checkbox" class="custom-control-input" id="phd" name="phd">';
                    }
                ?>
                    <label class="custom-control-label" for="phd">PhD</label>
                </div>
            </div>
        </div>

</div>
</div>

<div class="col-3">
    <div class="form-group">
        <label for="qualification">Professional Qualifications</label>
                <?php 
                    if(!empty(@$get_student->qualification)) {
                        echo '<input type="checkbox" class="custom-control-input" id="qualification" name="pro_qualification" checked>';
                    } else {
                        echo '<input type="checkbox" class="custom-control-input" id="qualification" name="pro_qualification" placeholder="Professional Qualifications">';
                    }
                ?>
    </div>
</div>
</div>

<button type="submit" name="save_student_qualification" class="btn btn-primary">Save</button>
</form>
</div>


<div class="tab-pane fade" id="c-curriculum">
<!-- SECOND TAB CONTENT -->
<div class="card">
<div class="card-header card-header-large bg-white d-flex align-items-center">
<h4 class="card-header__title flex m-0">My Documents</h4>

</div>

<div class="list-group tab-content list-group-flush">
<div class="tab-pane active show fade" id="activity_all">


<div class="list-group-item list-group-item-action d-flex align-items-center ">
    

    <div class="flex">
        <div class="d-flex align-items-middle">
        
            <strong class="text-15pt mr-1">Prospectus</strong>
        </div>
    </div>
    <div class="ml-auto">
        <button class="btn btn-outline-primary"> View</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-prospectus"><i class="material-icons mr-1">file_upload</i> Upload</button>
    </div>
    

</div>

<div class="list-group-item list-group-item-action d-flex align-items-center ">
    

    <div class="flex">
        <div class="d-flex align-items-middle">
        
            <strong class="text-15pt mr-1">AIES Welcome Letter</strong>
        </div>
    </div>
    <div class="ml-auto">
        <button class="btn btn-outline-primary"> View</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-letter"><i class="material-icons mr-1">file_upload</i> Upload</button>
    </div>

</div>

<div class="card-footer text-center border-0">
    <a class="text-muted" href="#">Download All </a>
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
<!-- END SECOND TAB -->
</div>

</div>
</div>


</div>
<!-- // END content -->