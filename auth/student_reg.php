
<?php 
    include_once('../config/init.php')
?>

<?php 

//if(isset($_GET['register'])){
   
   // if(!empty($_GET['register'])){
        $id = @$_GET['register'];

        $get_student = $getFromCourse->get_single('user', $id);

      //  var_dump($get_student);
  //  }
   
//}
  

  ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <base href="<?=BASE_URL?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

    <!-- ion Range Slider -->
    <link type="text/css" href="assets/css/vendor-ion-rangeslider.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-ion-rangeslider.rtl.css" rel="stylesheet">


</head>

<body class="bg-white ">





    <div class="container-fluid bg-white ">

        <div class="row d-flex flex-column justify-content-center align-items-center mt-2 mb-4 navbar-light">
            <a href="<?=BASE_URL?>" class="navbar-brand text-center mb-2 mr-0 flex-column" style="min-width: 0">
                <!-- LOGO -->
                <span class="mr-1">
                    <!-- LOGO -->
                    <img src="assets/images/logos/icon_logoo.png" alt="">
                </span>

                <span class="ml-1">Global Trade Tutors</span>
            </a>
        </div>
      
        <div class="row bg-white ">
        
            <div class="col-md-10 offset-1">






  <h1 class="mb-0">Registration</h1>
        
   
<div class="bg-white border-bottom mb-3">
    <div class="container-fluid nav nav-tabs" role="tablist">
        <a href="#c-bio" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Bio Data</a>
        <?php 
        
        if(!empty($_GET['register'])){
        
        ?>
        <a href="#c-employment" data-toggle="tab" role="tab" aria-selected="false">Employment Info</a>
        <a href="#c-edu" data-toggle="tab" role="tab" aria-selected="false">Education and Qualifications</a>
        <?php }else{
            ?>
             <a  data-toggle="tab" role="tab" aria-selected="false">Employment Info</a>
        <a data-toggle="tab" role="tab" aria-selected="false">Education and Qualifications</a>
       <?php }?>
      
    </div>
</div>

<div class="container-fluid page__container bg-white ">
    <div class="tab-content">
    <div class="row col-2 offset-10">
            
            <?php 
                if(!empty($get_student->qualification)  and !empty($get_student->company_name)){
            
                
            ?>
            <form method="post" action="register">
            <button type="submit" name="final" id="complete_reg" class="btn btn-outline-success btn-lg"  style="font-size: 20px;"><i class="material-icons icon-128pt" style="font-size: 64px;">check</i>Complete</button></form><?php }?>
                         
            </form>
            </div>
        <div class="tab-pane active show fade" id="c-bio">
            <!-- FIRST TAB CONTENT -->
         <form method="post" action="register" enctype="multipart/form-data">
         <div class="row">
            <div class="col-lg-10 card-form__body card-body bg-white ">
                <div class="row ">
                    <div class="col">
                            <div class="form-group">
                                <label for="select01">Title</label>
                                <select id="select01" name="title" required data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                    
                                <?php 
                                    if(!empty($_GET['register'])){  ?>
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
                                <input type="surname"  name="surname"  value="<?=@$get_student->surname;?>" type="text" class="form-control" placeholder="Surname" >
                              
                                <input type="hidden"  name="type"  value="<?=@$get_student->id;?>" type="text" class="form-control" placeholder="Surname" >
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
                                if(!empty($_GET['register'])){  ?>
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
                            if(!empty($_GET['register'])){  ?>
                                <option value="<?=@$get_student->nationality;?>"><?=@$get_student->nationality;?></option>
                            <?php }else{?>
                                <option value="">Select Country</option>
                            <?php }?>
                                
                            <option value="Afghanistan">Afghanistan</option>
            <option value="Åland Islands">Åland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="Brunei Darussalam">Brunei Darussalam</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Congo">Congo</option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Cote D'ivoire">Cote D'ivoire</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guernsey">Guernsey</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-bissau">Guinea-bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran">Iran</option>
            <option value="Iraq">Iraq</option>
            <option value="Ireland">Ireland</option>
            <option value="Isle of Man">Isle of Man</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jersey">Jersey</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="North Korea">North Korea</option>
            <option value="South Korea">South Korea</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macao">Macao</option>
            <option value="Macedonia">Macedonia</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Micronesia">Micronesia</option>
            <option value="Moldova">Moldova</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="Netherlands Antilles">Netherlands Antilles</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Palestinian Territory">Palestinian Territory</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn">Pitcairn</option>
            <option value="Poland">Poland</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Reunion">Reunion</option>
            <option value="Romania">Romania</option>
            <option value="Russian Federation">Russian Federation</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Helena">Saint Helena</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania">Tanzania</option>
            <option value="Thailand">Thailand</option>
            <option value="Timor-leste">Timor-leste</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Viet Nam">Viet Nam</option>
            <option value="Virgin Islands, British">Virgin Islands, British</option>
            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
            <option value="Wallis and Futuna">Wallis and Futuna</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>

            
                            </select>
                        
                      </div>
                    </div>
                </div>
                <div class="row">
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="desc">Password</label>
                        <input type="password" id="password" name="password" class="form-control" value="<?=@$get_student->password;?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="desc">Passport</label>
                        <input type="file"  name="profileimage" id = "profileimage" class="form-control" required>
                                    
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="desc">Home Address</label>
                        <textarea id="address" name="address" rows="3" class="form-control" placeholder="Home Address ..."><?=@$get_student->address;?></textarea>
                    </div>

              
                </div>
              <!--  <div class="col">
             
                                 <div class="form-group">
                                        <label>Avatar</label>
                                        <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["assets/images/account-add-photo.svg"]'>
                                            <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                                <div class="avatar avatar-lg">
                                                    <img src="assets/images/account-add-photo.svg" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <button class="btn btn-sm btn-primary dz-clickable">Choose photo</button>
                                            </div>
                                        </div>
                                    </div>
                    </div>-->
                </div>
                 

                <div class="form-group">
                <?php 
                    if(!empty($_GET['register'])){
                        ?>
                          <input type="submit"  name="ind_student_bio_data" class="btn btn-outline-primary" value="Save and Continue">
               
                          <a type="submit" href="#c-employment" data-toggle="tab" role="tab" aria-selected="false" class="btn btn-outline-warning">Proceed</a>
               
                        
                        <?php }else{?>
                            <input type="submit" name="ind_student_bio_data" class="btn btn-outline-primary" value="Save and Continue">
               
                  <?php   }
                ?>
                  </div>
               
              
            </div>
            <div class="col-lg-2">
             <div class="row">&nbsp;</div>
                <div class="row">

                <img src="<?=BASE_URL?>/auth/<?=@$get_student->profileimage;?>" class="img-thumbnail">
                </div>
            </div>
            </div>
         </form>
         
            <!-- END FIRST TAB CONTENT -->
        </div>

        <div class="tab-pane  fade" id="c-employment">
            <!-- FIRST TAB CONTENT -->
         <form method="post" action="register/<?=$id;?>">
            <div class="col-lg-8 card-form__body card-body bg-white ">
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
                            if(!empty($_GET['register'])){  ?>
                                <option value="<?=@$get_student->country;?>"><?=@$get_student->country;?></option>
                                <?php }else{?>
                                    <option value="">Select Country</option>
                                    <?php }?>

                                    <option value="Afghanistan">Afghanistan</option>
            <option value="Åland Islands">Åland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="Brunei Darussalam">Brunei Darussalam</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Congo">Congo</option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Cote D'ivoire">Cote D'ivoire</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guernsey">Guernsey</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-bissau">Guinea-bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran">Iran</option>
            <option value="Iraq">Iraq</option>
            <option value="Ireland">Ireland</option>
            <option value="Isle of Man">Isle of Man</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jersey">Jersey</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="North Korea">North Korea</option>
            <option value="South Korea">South Korea</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macao">Macao</option>
            <option value="Macedonia">Macedonia</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Micronesia">Micronesia</option>
            <option value="Moldova">Moldova</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="Netherlands Antilles">Netherlands Antilles</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Palestinian Territory">Palestinian Territory</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn">Pitcairn</option>
            <option value="Poland">Poland</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Reunion">Reunion</option>
            <option value="Romania">Romania</option>
            <option value="Russian Federation">Russian Federation</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Helena">Saint Helena</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania">Tanzania</option>
            <option value="Thailand">Thailand</option>
            <option value="Timor-leste">Timor-leste</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Viet Nam">Viet Nam</option>
            <option value="Virgin Islands, British">Virgin Islands, British</option>
            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
            <option value="Wallis and Futuna">Wallis and Futuna</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
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
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <input type="submit" name="ind_student_employment_data" class="btn btn-outline-primary" value="Save Employment Info">
                            <a type="submit" href="#c-edu" data-toggle="tab" role="tab" aria-selected="false" class="btn btn-outline-warning">Proceed</a>
               
                        </div>

                    </div>
                </div>

               
               
              
            </div>
         </form>
            <!-- END FIRST TAB CONTENT -->
        </div>

        <div class="tab-pane fade" id="c-edu">

            <form method="post" action="register/<?=$id;?>">

            <div class="row">


            <div class="col-3">
            <div class="form-group">
                <label for="country">Highest Level of Education</label><br>
                <select id="country" name="qualification" class="custom-select w-auto">
                <?php 
                if(!empty($_GET['register'])){  ?>
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
                        
                <input type="text" class="form-control" id="qualification" name="pro_qualification" value="<?=@$get_student->professionality;?>">
                                
                            
                </div>
            </div>
            </div>

        <button type="submit" name="ind_save_student_qualification" class="btn btn-primary">Save</button>

</div>


        

     
    </div>
</div>




















































               
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/material-design-kit.js"></script>

    <!-- Range Slider -->
    <script src="assets/vendor/ion.rangeSlider.min.js"></script>
    <script src="assets/js/ion-rangeslider.js"></script>

    <!-- App -->
    <script src="assets/js/toggle-check-all.js"></script>
    <script src="assets/js/check-selected-row.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/sidebar-mini.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>

    

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
   
 <!-- SweetAlert2 -->
 <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    





</body>


<!-- Mirrored from educate.frontted.com/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Jan 2021 14:34:50 GMT -->
</html>


<!--Confirmation for course content Deletion -->
<script>

        $('#complete_reg').click(function(){
        //var check = event.preventDefault();
        var conf = confirm('Are you sure you want to Submit Finally !!');
        if(conf == true){
            return true;
        }else{
            return false;
        }
        });
</script>


<?php




/*
    * Individual Student Registration Model
*/


if(isset($_POST['final'])){
    
    $_SESSION['login_id'] = $get_student->id;
    $_SESSION['sname'] = $get_student->surname;
    $_SESSION['fname'] = $get_student->firstname;
   // $_SESSION['passport'] = $get_student->passport;
    $_SESSION['email'] = $get_student->email;
   // header('Location: /admin/dashboard/');


        echo "<script type='text/javascript'>
        $(function() {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });
          //  toastr.success(' Student Employment Info has Been Saved.')
            
            Toast.fire({
                type: 'success',
                title: ' Registration Completed .'
            })
            
        });
        setInterval(() => {
            window.open('".BASE_URL."/student/','_self');
        }, 2000);
        
        </script>";

       
        
       

}

//Student Bio Data

if(isset($_POST['ind_student_bio_data'])){

    $title = $_POST['title'];
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $password = MD5($_POST['password']);
   $type = $_POST['type'];
   // $id_reg = $_GET['register'];

    $fileRoot = $getFromCourse->uploadImage($_FILES['profileimage']);
        
  
  
    if($type > 0){

        $student_bio = $getFromCourse->update('user',  $type, array('surname'=>$surname,'title'=>$title,'firstname'=>$firstname,'middle_name'=>$middlename,'dob'=>$dob,'gender'=>$gender,'email'=>$email,'tel'=>$tel,'nationality'=>$country,'address'=>$address,'password'=>$password,'profileimage'=>$fileRoot, 'type'=>'student'));
    
        if($student_bio){ 
    
          echo "<script type='text/javascript'>
            $(function() {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              toastr.success(' Student Bio Data Updated.')
             
               /* Toast.fire({
                  type: 'success',
                  title: ' Price Info Saved .'
                })*/
             
            });
           setInterval(() => {
              window.open('register/".$type."','_self');
            }, 1000);
          
          </script>";
         
          }else{
            echo "<script type='text/javascript'>
            $(function() {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              toastr.error('  Failed to Update Student Data.')
              
            
            
            
            });
            setInterval(() => {
                window.open('register/".$id."','_self');
              }, 1000);
          
                        
          
          </script>"; 
    
        }
    
    

    }else{
        $student_bio = $getFromCourse->create('user', array('surname'=>$surname,'title'=>$title,'firstname'=>$firstname,'middle_name'=>$middlename,'dob'=>$dob,'gender'=>$gender,'email'=>$email,'tel'=>$tel,'nationality'=>$country,'password'=>$password,'address'=>$address,'profileimage'=>$fileRoot, 'type'=>'student'));
    
        if($student_bio){ 
    
          echo "<script type='text/javascript'>
            $(function() {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              toastr.success(' Student Bio Data Saved.')
             
               /* Toast.fire({
                  type: 'success',
                  title: ' Price Info Saved .'
                })*/
             
            });
           setInterval(() => {
              window.open('register/".$student_bio."','_self');
            }, 1000);
          
          </script>";
         
          }else{
            echo "<script type='text/javascript'>
            $(function() {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              toastr.error('  Failed to Create Student Data.')
            
            
            
            });
            setInterval(() => {
                window.open('register/".$id."','_self');
              }, 1000);
          
                        
          
          </script>"; 
    
        }
    
    

    }
   
  
  }
  
  
  
  //Student Employment Data
  
  if(isset($_POST['ind_student_employment_data'])){
  
    $company = $_POST['company'];
    $position = $_POST['position'];
    $dept = $_POST['dept'];
    $town = $_POST['town'];
    $company_address = $_POST['company_address'];
    $country = $_POST['country'];
    $id = $_GET['register'];
    $col_id = $_POST['id'];
   // $address = $_POST['address'];
  
    $student_employment_info = $getFromCourse->update('user', $col_id, array('company_name'=>$company, 'position'=>$position, 'dept'=>$dept, 'town'=>$town, 'company_address'=>$company_address, 'country'=>$country));
    
      if($student_employment_info){ 
  
        echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            toastr.success(' Student Employment Info has Been Saved.')
           
             /* Toast.fire({
                type: 'success',
                title: ' Price Info Saved .'
              })*/
           
          });
         setInterval(() => {
            window.open('register/".$col_id."','_self');
          }, 2000);
        
        </script>";
       
        }else{
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            toastr.error('  Failed to Save Employment Info.')
          
          
          
          });
        
                      
        
        </script>"; 
  
      }
  
  
  }
  
  
  
  
  

/*
      Education and Qualifications
*/
if(isset($_POST['ind_save_student_qualification'])){

    $qualification = $_POST['qualification'];
    $pro_qualification = $_POST['pro_qualification'];
    $ond = @$_POST['ond'];
    $hnd = @$_POST['hnd'];
    $bsc = @$_POST['bsc'];
    $pgd = @$_POST['pgd'];
    $masters = @$_POST['masters'];
    $phd = @$_POST['phd'];
    $col_id = @$_POST['id'];
  
    $student_qualification_info = $getFromCourse->update('user', $col_id, array('qualification'=>$qualification, 'professionality'=>$pro_qualification, 'ond'=>$ond, 'hnd'=>$hnd, 'bsc'=>$bsc, 'pgd'=>$pgd, 'masters'=>$masters, 'phd'=>$phd));
    
      if($student_qualification_info){
  
        echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            toastr.success(' Student Employment Info has Been Saved.')
           
             /* Toast.fire({
                type: 'success',
                title: ' Price Info Saved .'
              })*/
           
          });
         setInterval(() => {
            window.open('register/".$col_id."','_self');
          }, 2000);
        
        </script>";
       
        }else{
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            toastr.error('  Failed to Save Employment Info.')
          
          
          
          });
        
                      
        
        </script>"; 
  
      }
  
  }
  
  
  
  
  
  
  ?>