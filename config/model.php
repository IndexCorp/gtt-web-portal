<?php





//Student Course Registration By Admin 

if(isset($_POST['register_school'])){
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  $school_id = $_POST['school_id'];
  


  $check = $getFromStudent->check_std_schools($school_id,$course_id, $student_id);
  if(!empty($check)){
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.warning('Student Already Subcribed to this Course.')
     
     
     
    });
   setInterval(() => {
      window.open('admin/student_reg/".$student_id."','_self');
    }, 2000);
  
  </script>";
 
  }else{
  $student_school_reg = $getFromCourse->create('student_schools', array('school_id'=>$school_id, 'student_id'=>$student_id, 'course_id'=>$course_id));
  
      if($student_school_reg){ 
        
    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('School Registration Successsfull.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
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
        toastr.error('  Failed to  Register School.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
  
  }

}






// Delete Student  School
if(isset($_POST['delete_student_schools']))
{

  $student_id = $_POST['student_id'];

  $student_school_id = $_POST['student_school_id'];

  //$school_id = $getFromGeneric->get_single('student_schools', $student_school_id)->school_id;

  $delete_std = $getFromGeneric->delete('student_schools', array('id'=> $student_school_id));
  
   
  if($delete_std){ 
   
      
    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Student School Deleted Successfully.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/student_reg/".$student_id."/','_self');
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
        toastr.error('  Failed to  Delete Student School.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

    }
  
}


 
//School Data

if(isset($_POST['school_data'])){

  $school_name = @$_POST['school_name'];
  $school_id = @$_POST['school_id'];
 

  if(isset($_FILES['avatar']) ){
    if(!empty($_FILES['avatar']['name'][0])){
            $fileRoot = $getFromCourse->uploadImage($_FILES['avatar']);
    }
  }

  if($_POST['school_type']  == 'update'){

      
  $school_info = $getFromCourse->update('school', $school_id, array('school_name'=>$school_name,'avatar'=>$fileRoot));
  
  if($school_info){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' School Info Updated.')
       
       
       
      });
     setInterval(() => {
        window.open('admin/create_school/".$school_id."','_self');
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
        toastr.error('  Failed to Update School Info.')
      
      
      
      });
    
                  
    
    </script>"; 

  }



  }else{
    
  $school_info = $getFromCourse->create('school', array('school_name'=>$school_name, 'avatar'=>$fileRoot));
  
  if($school_info){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('School Info Saved.')
       
        
       
      });
     setInterval(() => {
        window.open('admin/create_school/".$school_info."','_self');
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
        toastr.error('  Failed to Create School.')
      
      
      
      });
    
                  
    
    </script>"; 

  }




  }

 


}






//send_delete_det
if(isset($_POST['delete_admin_role']))
{
  $admin_role_id = $_POST['admin_role_id'];


  
  $delete_exam = $getFromGeneric->delete('admin_role', array('id'=> $admin_role_id));

  
  if($delete_exam){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Role  Deleted Successfully.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/role/','_self');
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
        toastr.error('  Failed to  Delete Role.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/role/','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
 
}



// ADMIN CREATE Admin Role 

if(isset($_POST['create_role'])){

  $admin_id = $_POST['admin_id'];
  $role_id = $_POST['role_id'];
  //$starting = $_POST['starting'];
  //$ending = $_POST['ending'];


  $create_role = $getFromCourse->create('admin_role', array('admin_id'=>$admin_id,'role_id'=>$role_id));



  if($create_role){ 

   
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
   toastr.success('Role has been added .')
     
      
     
    });
    setInterval(() => {
      window.open('admin/role/','_self');
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
      toastr.error('  Failed to Add  Role.')
    
    
    
    });
  
                
  
  </script>"; 


      }
}



/// assignment_submission
if(isset($_POST['update_prospectus'])){


  $prospectus_id = $_POST['prospectus_id'];


if(isset($_FILES['avatar'])){
 if(!empty($_FILES['avatar']['name'][0])){
         $fileRoot = $getFromExam->uploadDoc_main($_FILES['avatar']);

 
     $up_file =  $getFromExam->update('prospectus', $prospectus_id,  array( 'doc' => $fileRoot));


if($up_file){ 


   echo "<script type='text/javascript'>
   $(function() {
     const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
     });
  toastr.success('Prospectus File Uploaded Successfully.')
    
      /* Toast.fire({
         type: 'success',
         title: ' Course Details Saved .'
       })*/
    
   });
   setInterval(() => {
     window.open('admin/prospectus/','_self');
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
     toastr.error('  Failed to Upload Prospectus File.')
   
   
   
   });
 
               
 
 </script>"; 

 }
 

 }




}


}








// Delete Student 
if(isset($_POST['delete_student_courses']))
{

  $student_id = $_POST['student_id'];

  $student_course_id = $_POST['student_course_id'];
  $course_id = $getFromGeneric->get_single('student_courses', $student_course_id)->course_id;

  $delete_std = $getFromGeneric->delete('student_courses', array('id'=> $student_course_id));
  
  $get_payment =  $getFromGeneric->get_payment_std($student_id, $course_id);
  
  if($delete_std){ 
    $delete_std_payment = $getFromGeneric->delete('payment', array('id'=> $get_payment->id));
    
    if( $delete_std_payment){
      
    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Student Course Deleted Successfully.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/student_reg/".$student_id."/','_self');
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
        toastr.error('  Failed to  Delete Student Course.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

    }
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to  Delete Student Course.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
 
}






//Delete Student 
if(isset($_POST['delete_student']))
{
  $stud_id = $_POST['student_id'];


  
  $delete_std = $getFromGeneric->delete('user', array('id'=> $stud_id));

  
  if($delete_std){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Student  Deleted Successfully.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/student/','_self');
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
        toastr.error('  Failed to  Delete Student.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/student/','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
 
}






//Payment Update
if(isset($_POST['student_payment_update1'])){
  $amount = $_POST['amount'];
  $status = $_POST['status'];

  $student_id = $_POST['student_id']; 
    $course_id = $_POST['course_id'];  
   
  //echo '<script>alert("'.$student_id. $course_id. $status.$amount.'")</script>';


    $idf = $getFromCourse->check_payment_adf($student_id, $course_id);
    $id = @$idf->id;
    
   // echo '<script>alert("'.$idf.'")</script>';
    if(!empty($idf)){
      
  if($status == 'tranche_1')
  {
    $pay = $getFromCourse->update('payment', $id, array('staff_id'=>$admin_id,'tranche_1'=>$amount, 'status'=>'tranche_1'));
  
  }elseif($status == 'free_access')
  {
    $pay = $getFromCourse->update('payment', $id, array('staff_id'=>$admin_id, 'status'=>'free_access'));

  }elseif($status == 'tranche_2')
  {
    $pay = $getFromCourse->update('payment', $id, array('staff_id'=>$admin_id,'tranche_2'=>$amount, 'status'=>'tranche_2'));

  }elseif($status == 'tranche_3')
  {
    $pay = $getFromCourse->update('payment', $id, array('staff_id'=>$admin_id,'tranche_3'=>$amount, 'status'=>'tranche_3'));
  
  }
    }else{
      
if($status == 'tranche_1')
{
  $pay = $getFromCourse->create('payment', array('staff_id'=>$admin_id,'user_id'=>$student_id,'course_id'=>$course_id,'tranche_1'=>$amount, 'status'=>'tranche_1'));

}elseif($status == 'free_access')
{
  $pay = $getFromCourse->create('payment', array('staff_id'=>$admin_id,'user_id'=>$student_id,'course_id'=>$course_id, 'status'=>'free_access'));

}elseif($status == 'tranche_2')
{
  $pay = $getFromCourse->create('payment', array('staff_id'=>$admin_id,'user_id'=>$student_id,'course_id'=>$course_id,'tranche_2'=>$amount, 'status'=>'tranche_2'));

}elseif($status == 'tranche_3')
{
  $pay = $getFromCourse->create('payment', array('staff_id'=>$admin_id,'user_id'=>$student_id,'course_id'=>$course_id,'tranche_3'=>$amount, 'status'=>'tranche_3'));

}
    }
  
  
 
    


if($pay){ 

echo "<script type='text/javascript'>
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    toastr.success(' Payment Updated.')
   
     /* Toast.fire({
        type: 'success',
        title: ' Price Info Saved .'
      })*/
   
  });
  setInterval(() => {
    window.open('admin/student_reg/".$student_id."','_self');
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
    toastr.error('  Failed to Update Payment.')
  
  
  
  });
  setInterval(() => {
    window.open('admin/student_reg/".$student_id."','_self');
  }, 2000);

              

</script>"; 

}


}




//Payment Update
if(isset($_POST['student_payment_update'])){
  $amount = $_POST['amount'];
  $status = $_POST['status'];

  $id = $_POST['id'];  
  
  if($status == 'tranche_1')
  {
    $pay = $getFromCourse->update('payment', $id, array('tranche_1'=>$amount, 'status'=>'tranche_1'));
  
  }elseif($status == 'tranche_2')
  {
    $pay = $getFromCourse->update('payment', $id, array('tranche_2'=>$amount, 'status'=>'tranche_2'));

  }elseif($status == 'tranche_3')
  {
    $pay = $getFromCourse->update('payment', $id, array('tranche_3'=>$amount, 'status'=>'tranche_3'));

  }
 
    


if($pay){ 

echo "<script type='text/javascript'>
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    toastr.success(' Payment Updated.')
   
     /* Toast.fire({
        type: 'success',
        title: ' Price Info Saved .'
      })*/
   
  });
  setInterval(() => {
    window.open('admin/payment-mgt/".$id."','_self');
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
    toastr.error('  Failed to Update Payment.')
  
  
  
  });
  setInterval(() => {
    window.open('admin/payment-mgt/".$id."','_self');
  }, 2000);

              

</script>"; 

}


}





//send_delete_det
if(isset($_POST['delete_role']))
{
  $exam_id = $_POST['schedule_id'];


  
  $delete_exam = $getFromGeneric->delete('course_exam', array('id'=> $exam_id));

  
  if($delete_exam){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Schedule  Deleted Successfully.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/schedule_exam/','_self');
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
        toastr.error('  Failed to  Delete Exam.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/schedule_exam/','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
 
}

// Course Info Post
if(isset($_POST['price_info_product'])){
  $price = $_POST['price'];
 // $disc_price = $_POST['discount'];
  $id = $_POST['id'];      
$create_product = $getFromCourse->update('product', $id, array('price'=>$price));

if($create_product){ 

echo "<script type='text/javascript'>
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    toastr.success(' Price Info Saved.')
   
     /* Toast.fire({
        type: 'success',
        title: ' Price Info Saved .'
      })*/
   
  });
  setInterval(() => {
    window.open('admin/create_product/".$id."','_self');
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
    toastr.error('  Failed to Save Price Info.')
  
  
  
  });
  setInterval(() => {
    window.open('admin/create_product/".$id."','_self');
  }, 2000);

              

</script>"; 

}


}





//Category Data

if(isset($_POST['product-category_data'])){

  $cat_name = $_POST['cat_name'];
  //$avatar = $_POST['avatar'];
  //$cat_type = $_POST['cat_type']; 
   $cat_id = @$_POST['cat_id'];
 

  if(isset($_FILES['avatar']) ){
    if(!empty($_FILES['avatar']['name'][0])){
            $fileRoot = $getFromCourse->uploadImage($_FILES['avatar']);
    }
  }

  if($_POST['cat_type']  == 'update'){

      
  $cat_info = $getFromCourse->update('product_category', $cat_id, array('cat_name'=>$cat_name,'avatar'=>$fileRoot));
  
  if($cat_info){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Category Info Updated.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/create-product-category/".$cat_id."','_self');
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
        toastr.error('  Failed to Update Category Info.')
      
      
      
      });
    
                  
    
    </script>"; 

  }



  }else{
    
  $cat_info = $getFromCourse->create('product_category', array('cat_name'=>$cat_name, 'avatar'=>$fileRoot));
  
  if($cat_info){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Category Info Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/create-product-category/','_self');
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
        toastr.error('  Failed to Create Category.')
      
      
      
      });
    
                  
    
    </script>"; 

  }




  }
  
 


}













     // Course Creating/ Updating Product
     if(isset($_POST['create_product'])){


      $title = $_POST['names'];
      $full = $_POST['full_desc'];
      $short = $_POST['short_desc'];
      $category = $_POST['product_cat'];
      $det = $_POST['det'];
      $user = $_SESSION['admin_id'];
      $url_slug = $getFromProduct->url_slug($_POST['names']);

    if($det == 'save'){
      $product = $getFromProduct->create('product',  array('names'=>$title, 'url_slug'=>$url_slug, 'body'=>$full, 'descs'=>$short, 'category'=>$category, 'author'=>$user));

      if($product){ 

     
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
       toastr.success('Product Details Saved.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Course Details Saved .'
            })*/
         
        });
        setInterval(() => {
          window.open('admin/create_product/".$product."','_self');
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
          toastr.error('Failed to Save Product Details.')
        
        
        
        });
      
                    
      
      </script>"; 

  
          }
      

    }else{
      $ids = $_POST['ids'];
      $product = $getFromProduct->update('product',  $ids, array('names'=>$title,'url_slug'=>$url_slug, 'body'=>$full, 'descs'=>$short, 'category'=>$category, 'author'=>$user));

      if($product){ 

     
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
       toastr.success('Product Details Saved.')
         
       
         
        });
        setInterval(() => {
          window.open('admin/create_product/".$ids."','_self');
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
          toastr.error('  Failed to Update Product Details.')
        
        
        
        });
        setInterval(() => {
          window.open('admin/create_product/".$ids."','_self');
        }, 2000);
      
                    
      
      </script>"; 

  
          }
      

    }
     
     


  }





    // Update Product Image

    if(isset($_POST['update_product_image'])){
      $id = $_POST['id'];
      if(isset($_FILES['img_preview'])){
        if(!empty($_FILES['img_preview']['name'][0])){
                $fileRoot = $getFromProduct->uploadImage($_FILES['img_preview']);
               // $fileRoots = $getFromProduct->uploadImage($_FILES['avatar']);
              $up_img =  $getFromCourse->update('product', $id, array('img_url' => $fileRoot));
                if(!empty($up_img)){
                  
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
     toastr.success('Image Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Post Details Saved .'
          })*/
       
      });
      setInterval(() => {
        window.open('admin/create_product/".$id."','_self');
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
        toastr.error('  Failed to Save Image.')
      
      
      
      });
    
      setInterval(() => {
        window.open('admin/create_product/".$id."','_self');
      }, 2000);         
    
    </script>"; 

  }
}

                }
 
    }







/// Publish Product
if(isset($_POST['publish_product'])){
  
  $product_id = $_POST['product_id'];
  $status = $_POST['status'];

if($status == 'publish'){
  $section = $getFromProduct->update('product', $product_id, array('product_status'=>'1'));

  if($section){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
       
         Toast.fire({
            type: 'success',
            title: ' The Product has been Published ! .'
          })
       
      });
     setInterval(() => {
        window.open('admin/create_product/".$product_id."','_self');
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
        toastr.error('  Failed to Publish this Prosuct Try again!!.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/create_product/".$product_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }

}elseif($status == 'unpublish'){
  $section = $getFromProduct->update('product', $product_id, array('product_status'=>'0'));

  if($section){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
          Toast.fire({
            type: 'success',
            title: ' The Product has been Unpublished! .'
          })
       
      });
     setInterval(() => {
        window.open('admin/create_product/".$product_id."','_self');
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
        toastr.error('  Failed to Unpublish this Product again!!.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/create_product/".$product_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
}
  
}










//Product Post Activate


if(isset($_POST['products_activate'])){
  $product = $_POST['product_id'];

  $update = $getFromProduct->update('product', $product, array('product_status'=>1));


    
if($update){ 

  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Product Published Successfully.')
     
   
     
    });
   setInterval(() => {
      window.open('admin/products/','_self');
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
      toastr.error('  Failed to Publish Product.')
      setInterval(() => {
          window.open('admin/products/','_self');
        }, 2000);
    
    
    
    });
  
                
  
  </script>"; 

}

}





//product De-Activated

if(isset($_POST['products_deactivate'])){
  $product = $_POST['product_id'];

  $update = $getFromProduct->update('product', $product, array('product_status'=>0));

  
if($update){ 

  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Product Post Unpublished.')
     
     
    });
   setInterval(() => {
      window.open('admin/products/','_self');
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
      toastr.error('  Failed to upublish product post.')
      setInterval(() => {
          window.open('admin/products/','_self');
        }, 2000);
    
    
    
    });
  
                
  
  </script>"; 

}

}







//send_delete_det
if(isset($_POST['send_delete_exam']))
{
  $exam_id = $_POST['exam_id'];


  
  $delete_exam = $getFromGeneric->delete('exam', array('id'=> $exam_id));

  
  if($delete_exam){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Exam Deleted Successfully.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/exam/','_self');
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
        toastr.error('  Failed to  Delete Exam.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/exam/','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
 
}
//send_delete_det
if(isset($_POST['send_delete_det']))
{
  $question_id = $_POST['question_id'];
  $exam_id = $_POST['exam_id'];


  
  $delete_course = $getFromGeneric->delete('question', array('id'=> $question_id));

  
  if($delete_course){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Question Deleted Successfully.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/new_exam/".$exam_id."','_self');
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
        toastr.error('  Failed to  Delete Question.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/new_exam/".$exam_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
 
}
/// assignment_submission
if(isset($_POST['edit_question_admin'])){


  $instruction = $_POST['instruction'];
  $question_id = $_POST['question_id'];
  $exam_id = $_POST['exam_id'];


 $det = $_POST['det'];

if(isset($_FILES['file'])){
 if(!empty($_FILES['file']['name'][0])){
         $fileRoot = $getFromExam->uploadImage($_FILES['file']);

   if($det == 'save'){
       $up_file =  $getFromExam->create('attachement',  array('instruction'=> $instruction,'question_id'=> $question_id, 'file' => $fileRoot));
   }else{
     $ide = $_POST['submit_id'];
     $up_file =  $getFromExam->update('attachement', $ide,  array('instruction'=> $instruction,'question_id'=> $question_id, 'file' => $fileRoot));

   }
if($up_file){ 


   echo "<script type='text/javascript'>
   $(function() {
     const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
     });
  toastr.success('Image Uploaded Successfully.')
    
      /* Toast.fire({
         type: 'success',
         title: ' Course Details Saved .'
       })*/
    
   });
   setInterval(() => {
     window.open('admin/new_exam/".$exam_id."','_self');
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
     toastr.error('  Failed to Upload Image File.')
   
   
   
   });
 
   setInterval(() => {
    window.open('admin/new_exam/".$exam_id."','_self');
  }, 2000);
      
 
 </script>"; 

 }
 

 }




}


}





//notify_exam_message_student


if(isset($_POST['notify_exam_message_student']))
{

  $name = $_POST['name'];
  $exam_date = $_POST['schedule_date'];
  $email = $_POST['email'];
  
 

  $subject = "Global Trade College Examination Notice";
        
  
    $body = "
  <html>
  <head>
  </head>
  <body>
  <p>Hurray!!!  Dear ".$name."</p>
  <p>This is to Notify you that Your Examination has been Scheduled to <strong></strong>".$exam_date."</strong></p>
  
  <h3>Global Trade College</h3>
  </body>
  </html>
  ";



    $send_mail = $getFromGeneric->sendmail($email,$subject,$body);

  if($send_mail){ 


    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Exam Schedule Notifacation Sent.')
      
      
      });
    setInterval(() => {
        window.open('admin/schedule_list/','_self');
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
      toastr.error(' Failed to send Exam Notification')
    
    
    
    });
  
                
  
  </script>"; 

}



}




//send_birth_day_greetings


if(isset($_POST['send_birth_day_greetings']))
{

   $student_name = $_POST['student_name'];
   $email = $_POST['email'];
  
 

  $subject = "Happy Birthday From Global Trade College";
        
  
    $body = "
  <html>
  <head>
  <title>Global Trade Tutor Examination Notice</title>
  </head>
  <body>
  <p>Hurray!!!  Dear ".$student_name."</p>
  <p>This is to wish you Happy Birthday from all of us at Global Trade College</p>
  <p>Enjoy Your Day</p>
  <h3>Global Trade College</h3>
  </body>
  </html>
  ";



    $send_mail = $getFromGeneric->sendmail($email,$subject,$body);

if($send_mail){ 


  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success('Birthday Greetings Sent.')
     
     
    });
   setInterval(() => {
      window.open('admin/dashboard/','_self');
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
      toastr.error(' Failed to send Birthday Greeting')
    
    
    
    });
  
                
  
  </script>"; 

}



}





// notify_students_of_new_courses


if(isset($_POST['notify_students_of_new_courses']))
{

   $course_name = $_POST['course_name'];
  
 

  $subject = "Global Trade Tutor New Course Notice";
        
  

  $get_students = $getFromExam->get_multi('user');
 
  foreach($get_students as $get_studes){
    $email = $get_studes->email;

    $body = "
  <html>
  <head>
  <title>Global Trade Tutor Examination Notice</title>
  </head>
  <body>
  <p> Dear ".$get_studes->firstname."</p>
  <p>This is to notify you of Our New Course  ".$course_name."</p>
  <p> Login to your portal <a href='https://globaltradetutor.com/auth/'>Here</a> to Subcribe to this Course now.</p>
  <p>Thanks</p>
  <h3>Global Trade College</h3>
  </body>
  </html>
  ";



    $send_mail = $getFromGeneric->sendmail($email,$subject,$body);

   

  }

  $bodys = "
  <html>
  <head>
  <title>Global Trade Tutor Examination Notice</title>
  </head>
  <body>
  <p> Dear ".$get_studes->firstname."</p>
  <p>This is to notify you of Our New Course  ".$course_name."</p>
  <p> Login to your portal <a href='https://globaltradetutor.com/auth/'>Here</a> to Subcribe to this Course now.</p>
  <p>Thanks</p>
  <h3>Global Trade College</h3>
  </body>
  </html>
  ";

  $send_mail = $getFromGeneric->sendmail('info@3timpex.com',$subject,$bodys);



if($send_mail){ 


  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' New Course Notification has been Sent to all student.')
     
     
    });
   setInterval(() => {
      window.open('admin/courses/','_self');
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
      toastr.error('  Failed to Send the New Course Notifications.')
    
    
    
    });
  
                
  
  </script>"; 

}



}



/// assignment_submission
if(isset($_POST['assignment_submission_student'])){


   $assignment_id = $_POST['assignment_id'];


  $det = $_POST['det'];

if(isset($_FILES['file'])){
  if(!empty($_FILES['file']['name'][0])){
          $fileRoot = $getFromExam->uploadDoc_main($_FILES['file']);

    if($det == 'save'){
        $up_file =  $getFromExam->create('assignment_sub',  array('student_id'=> $std_id,'assignment_id'=> $assignment_id, 'file' => $fileRoot));
    }else{
      $ide = $_POST['submit_id'];
      $up_file =  $getFromExam->update('assignment_sub', $ide,  array('student_id'=> $std_id,'assignment_id'=> $assignment_id, 'file' => $fileRoot));

    }
if($up_file){ 

 
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
   toastr.success('Assignent File Uploaded Successfully.')
     
       /* Toast.fire({
          type: 'success',
          title: ' Course Details Saved .'
        })*/
     
    });
    setInterval(() => {
      window.open('student/submit_ass/".$assignment_id."','_self');
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
      toastr.error('  Failed to Upload Assignment File.')
    
    
    
    });
  
                
  
  </script>"; 

  }
  

  }
 
 


}


}


// assignment_submission
if(isset($_POST['assignment_submission'])){


  $title = $_POST['title'];
  $question = $_POST['question'];
  $course_id = $_POST['course_id'];
  $due_date = $_POST['due_date'];
  $det = $_POST['det'];
//  $files = $_FILES['upload'];

if($det == 'save'){
  $createassignment = $getFromCourse->create('assignment',  array('title'=>$title, 'question'=>$question,'course_id'=>$course_id,'due_date'=>$due_date));

  if($createassignment){ 

 
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
   toastr.success('Assignent Details Saved.')
     
       /* Toast.fire({
          type: 'success',
          title: ' Course Details Saved .'
        })*/
     
    });
    setInterval(() => {
      window.open('admin/assignment/".$createassignment."','_self');
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
      toastr.error('  Failed to Save Course Details.')
    
    
    
    });
  
                
  
  </script>"; 


      }
  

}else{
  $ids = $_POST['ids'];
  $create_assignment = $getFromCourse->update('assignment',  $ids, array('title'=>$title, 'question'=>$question,'course_id'=>$course_id,'due_date'=>$due_date));

  if($create_assignment){ 

 
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
   toastr.success('Assignment Details Saved.')
     
     
     
    });
    setInterval(() => {
      window.open('admin/assignment/".$ids."','_self');
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
      toastr.error('  Failed to Update Assignment Details.')
    
    
    
    });
    setInterval(() => {
      window.open('admin/assignment/".$ids."','_self');
    }, 2000);
  
                
  
  </script>"; 


      }
  

}
 
 


}





// Submit Admin Chats

if(isset($_POST['sumbit_admin_chat']))
{
  $chat = $_POST['chat'];
  $student_id = $_POST['student_id'];
  

  
  $cat_info = $getFromCourse->create('chats', array('reply'=>$chat,  'admin_id' => $admin_id, 'student_id'=>$student_id));
  
  if($cat_info){ 

    echo "<script type='text/javascript'>
         setInterval(() => {
        window.open('admin/chat/".$student_id."','_self');
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
        toastr.error('  Failed to Send Chat.')
      
      
      
      });
    
                  
    
    </script>"; 

  }

}

// Submit Student Chat
if(isset($_POST['sumbit_student_chat']))
{
  $chat = $_POST['chat'];

  
  $cat_info = $getFromCourse->create('chats', array('message'=>$chat, 'student_id'=>$std_id));
  
  if($cat_info){ 

    echo "<script type='text/javascript'>
         setInterval(() => {
        window.open('student/chat/','_self');
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
        toastr.error('  Failed to Send Chat.')
      
      
      
      });
    
                  
    
    </script>"; 

  }


}



//Category Data

if(isset($_POST['blog-category_data'])){

  $cat_name = $_POST['cat_name'];
  //$avatar = $_POST['avatar'];
  //$cat_type = $_POST['cat_type']; 
   $cat_id = @$_POST['cat_id'];
 

  if(isset($_FILES['avatar']) ){
    if(!empty($_FILES['avatar']['name'][0])){
            $fileRoot = $getFromCourse->uploadImage($_FILES['avatar']);
    }
  }

  if($_POST['cat_type']  == 'update'){

      
  $cat_info = $getFromCourse->update('blog_category', $cat_id, array('cat_name'=>$cat_name,'avatar'=>$fileRoot));
  
  if($cat_info){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Category Info Updated.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/create-blog-category/".$cat_id."','_self');
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
        toastr.error('  Failed to Update Category Info.')
      
      
      
      });
    
                  
    
    </script>"; 

  }



  }else{
    
  $cat_info = $getFromCourse->create('blog_category', array('cat_name'=>$cat_name, 'avatar'=>$fileRoot));
  
  if($cat_info){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Category Info Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/create-blog-category/','_self');
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
        toastr.error('  Failed to Create Category.')
      
      
      
      });
    
                  
    
    </script>"; 

  }




  }
  
 


}









// Student Mark Exam Taken
if(isset($_POST['student_mark_exam']))
{

  $schedule_id = $_POST['exam_id'];

  $taken = $getFromCourse->update('schedule_final',  $schedule_id, array('taken'=> 1 ));

    
  if($taken){ 
   
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
    toastr.success('Exam Marked Taken .')
      
        /* Toast.fire({
            type: 'success',
            title: ' Course Details Saved .'
          })*/
      
      });
      setInterval(() => {
        window.open('student/schedule_exam/','_self');
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
        toastr.error('  Failed to Mark Exam Taken .')
      
      
      
      });
    
                  
    
    </script>"; 


    

  }
}





// Admin Approve Schedule
if(isset($_POST['approve_exam']))
{

  $schedule_id = $_POST['schedule_id'];

  $disapprove_exam = $getFromCourse->update('schedule_final',  $schedule_id, array('approve'=> 1 ));

    
  if($disapprove_exam){ 
   
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
    toastr.success('Schedule has been Approved .')
      
        /* Toast.fire({
            type: 'success',
            title: ' Course Details Saved .'
          })*/
      
      });
      setInterval(() => {
        window.open('admin/schedule_list/','_self');
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
        toastr.error('  Failed to Approve Schedule .')
      
      
      
      });
    
                  
    
    </script>"; 


    

  }
}


// Admin Disapprove Schedule
if(isset($_POST['schedule_disapprove']))
{

  $schedule_id = $_POST['schedule_id'];

  $disapprove_exam = $getFromCourse->update('schedule_final',  $schedule_id, array('approve'=> 2 ));

    
  if($disapprove_exam){ 
   
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
    toastr.success('Schedule has been Disapproved .')
      
        /* Toast.fire({
            type: 'success',
            title: ' Course Details Saved .'
          })*/
      
      });
      setInterval(() => {
        window.open('admin/schedule_list/','_self');
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
        toastr.error('  Failed to Disapprove Schedule .')
      
      
      
      });
    
                  
    
    </script>"; 


    

  }
}







// Student SCHEDULE  Exam

if(isset($_POST['admin_schedule_exam_for_student'])){

  
  //$exam_id = $_POST['exam_id'];
  $course_id = $_POST['course_id'];
  $student_id = $_POST['student_id'];
  $starting = $_POST['starting'];
  //$ending = $_POST['ending'];


  $create_schedule = $getFromCourse->create('schedule_final', array('student_id'=>$student_id, 'course_id'=>$course_id,'exam_date'=>$starting));



  if($create_schedule){ 
    $approve = $getFromCourse->update('schedule_final', $create_schedule, array('approve'=> 1));

   
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
   toastr.success('Exam has been Scheduled .')
     
       /* Toast.fire({
          type: 'success',
          title: ' Course Details Saved .'
        })*/
     
    });
  /*  setInterval(() => {
      window.open('student/schedule_exam/','_self');
    }, 2000);*/
  
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
      toastr.error('  Failed to Schedule Exam.')
    
    
    
    });
  
                
  
  </script>"; 


      }
}






// Student   Re-SCHEDULE  Exam

if(isset($_POST['student_reschedule_exam'])){

  
  
  //$exam_id = $_POST['exam_id'];
  $course_id = $_POST['course_id'];
  $student_id = $_SESSION['login_id'];
  $starting = $_POST['starting'];
  $schedule_id = $_POST['schedule_id'];


  $create_schedule = $getFromCourse->update('schedule_final', $schedule_id, array( 'course_id'=>$course_id,'exam_date'=>$starting));



  if($create_schedule){ 

   
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
   toastr.success('Exam has been Re-Scheduled .')
     
       /* Toast.fire({
          type: 'success',
          title: ' Course Details Saved .'
        })*/
     
    });
  /*  setInterval(() => {
      window.open('student/schedule_exam/','_self');
    }, 2000);*/
  
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
      toastr.error('  Failed to Re-Schedule Exam.')
    
    
    
    });
  
                
  
  </script>"; 


    }
}




// Student   SCHEDULE  Exam

if(isset($_POST['tudent_schedule_exam'])){

  
  
  //$exam_id = $_POST['exam_id'];
  $course_id = $_POST['course_id'];
  $student_id = $_SESSION['login_id'];
  $starting = $_POST['starting'];
  //$ending = $_POST['ending'];

  
$get_course = $getFromCourse->get_single('courses', $course_id);

$get_name = $getFromCourse->get_single('user', $student_id);
$check_schedul = $getFromExam->check_sched($course_id, $student_id);

if(empty($check_schedul)){
$date_d = date_create($starting);

  $create_schedule = $getFromCourse->create('schedule_final', array('student_id'=>$student_id, 'course_id'=>$course_id,'exam_date'=>$starting));

  $title = 'Students Exam Schedules';
$body = 'Dear '.$get_name->firstname.' '.$get_name->surname.' <br> You have scheduled '.$get_course->course_name.' exam to  hold on '. date_format($date_d,"Y/m/d H:i:s");

  if($create_schedule){ 

  $send_mail = $getFromGeneric->sendmail($get_name->email,$title,$body);

   if($send_mail){
   
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
   toastr.success('Exam has been Scheduled .')
     
       /* Toast.fire({
          type: 'success',
          title: ' Course Details Saved .'
        })*/
     
    });
    setInterval(() => {
      window.open('student/schedule_exam/','_self');
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
      toastr.error('Failed to Mail Admin.')
    
    
    
    });
  
                
  
  </script>"; 


    }
  }else{
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.error('  Failed to Schedule Exam.')
    
    
    
    });
  
                
  
  </script>"; 

}
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Duplicate Schedule is not allowed.')
      
      
      
      });
    
                  
    
    </script>"; 
  
    }
}




// Exam Postponement Notification 

if(isset($_POST['postpone_exam']))
{
    
}


// Notify Students of Exams

if(isset($_POST['notify_student_exam']))
{

  $exam_id = $_POST['exam_id'];
  $course_id = $_POST['course_id'];
  $start_date = $_POST['start_date'];

  $get_exam_det= $getFromExam->get_single('exam', $exam_id);

  $get_course_det= $getFromExam->get_single('courses', $course_id);


  $subject = "Global Trade Tutor Examination Notice";
        
  

  $get_students = $getFromExam->get_single_g('student_courses', 'course_id', $course_id);
  
  foreach($get_students as $get_std){
    $get_studes = $getFromExam->get_single('user', $get_std->student_id);
    $email = $get_studes->email;

    $body = "
  <html>
  <head>
  <title>Global Trade Tutor Examination Notice</title>
  </head>
  <body>
  <p> Dear ".$get_studes->firstname."</p>
  <p>This is to notify you that your  ".$get_exam_det->exam_name."  exam  is starting on ".$start_date." </p>
  <p> Login to your portal <a href='https://globaltradetutor.com/auth/'>Here</a> to Start your Exam.</p>
  <p>Thanks</p>
  <h3>Global Trade College</h3>
  </body>
  </html>
  ";



    $send_mail = $getFromGeneric->sendmail($email,$subject,$body);

   

  }

  $bodys = "
  <html>
  <head>
  <title>Global Trade Tutor Examination Notice</title>
  </head>
  <body>
  <p> Dear Admin</p>
  <p>This is to notify you that  ".$get_exam_det->exam_name."  exam  is starting on ".$get_exam_det->start_date." </p>
  <p> Login to your portal <a href='https://globaltradetutor.com/auth/'>Here</a> to Start your Exam.</p>
  <p>Thanks</p>
  <h3>Global Trade College</h3>
  </body>
  </html>
  ";
  $send_mail = $getFromGeneric->sendmail('info@3timpex.com',$subject,$bodys);



if($send_mail){ 


  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Exam Notification has been Sent to all student.')
     
       /* Toast.fire({
          type: 'success',
          title: ' Price Info Saved .'
        })*/
     
    });
   setInterval(() => {
      window.open('admin/schedule_exam/','_self');
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
      toastr.error('  Failed to Send the Exam Notifications.')
    
    
    
    });
  
                
  
  </script>"; 

}



}






// ADMIN CREATE SCHEDULE 

if(isset($_POST['create_schedule_exam'])){

  $exam_id = $_POST['exam_id'];
  $course_id = $_POST['course_id'];
  //$starting = $_POST['starting'];
  //$ending = $_POST['ending'];


  $create_schedule = $getFromCourse->create('course_exam', array('exam_id'=>$exam_id,'course_id'=>$course_id));



  if($create_schedule){ 

   
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
   toastr.success('Exam has been Scheduled .')
     
     
     
    });
    setInterval(() => {
      window.open('admin/schedule_exam/','_self');
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
      toastr.error('  Failed to Schedule Exam.')
    
    
    
    });
  
                
  
  </script>"; 


      }
}

// Admi Create Exam

if(isset($_POST['exam_course'])){

  $exam_name  = $_POST['exam_name'];
  $question_no  = $_POST['question_no'];
  $duration  = $_POST['duration'];
 // $avatar  = $_POST['avatar'];
  $det  = $_POST['det'];
  $ids  = @$_POST['ids'];


  if($det == 'save'){

    
        if(isset($_FILES['avatar']) ){
          if(!empty($_FILES['avatar']['name'][0])){
                  $avatar = $getFromCourse->uploadImage($_FILES['avatar']);
                  $create_exam = $getFromExam->create('exam',  array('exam_name'=>$exam_name,'question_no'=>$question_no,'duration'=>$duration,'avatar'=>$avatar ));
          }
                
        }
       
   
    if($create_exam){ 

   
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
     toastr.success('Exam Details Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Course Details Saved .'
          })*/
       
      });
      setInterval(() => {
        window.open('admin/new_exam/".$create_exam."','_self');
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
        toastr.error('  Failed to Save Exam Details.')
      
      
      
      });
    
                  
    
    </script>"; 


        }
    

  }else{
    $ids = $_POST['ids'];

    if(isset($_FILES['avatar']) ){
      if(!empty($_FILES['avatar']['name'][0])){
              $avatar = $getFromCourse->uploadImage($_FILES['avatar']);
              $create_exam = $getFromCourse->update('exam',  $ids, array('exam_name'=>$exam_name,'question_no'=>$question_no,'duration'=>$duration,'avatar'=>$avatar ));
      }else{
        $create_exam = $getFromCourse->update('exam',  $ids, array('exam_name'=>$exam_name,'question_no'=>$question_no,'duration'=>$duration));
  
      }
    }
   
    if($create_exam){ 

   
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
     toastr.success('Exam Details Updated.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Course Details Updated .'
          })*/
       
      });
      setInterval(() => {
        window.open('admin/new_exam/".$ids."','_self');
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
        toastr.error('  Failed to Update Exam Details.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/new_exam/".$ids."','_self');
      }, 2000);
    
                  
    
    </script>"; 


        }
    

  }
   
   



  

}



//Admin Set Question 


if(isset($_POST['save_question'])){
  
    $exam_id = $_POST['exam_id'];
    
    if(isset($_FILES['question_file'])){
      if(!empty($_FILES['question_file']['name'][0])){
              $fileRoot = $getFromExam->uploadDoc_main($_FILES['question_file']);
            $up_file =  $getFromExam->create('question_upload',  array('exam_id'=> $exam_id, 'file' => $fileRoot));

       
  
      
  if($up_file){ 

    
 // $exam_id = $_POST['exam_id'];
  //$set_id = $_POST['set_id'];
  $get_file = $getFromExam->get_single('question_upload', $up_file)->file;
    $folder = '../document/'.$get_file;
   $questions = $getFromExam->XtractQuestion($folder);
   //var_dump($questions);
  
  for ($i=0; $i < count($questions); $i++) { 
     $question = $questions[$i]['question'];
      $options = $questions[$i]['options'];     
      $correct = $questions[$i]['answer'];

      if($correct == 'A'){
        $corrects = 0;
      }else if($correct == 'B'){
        $corrects = 1;
      }else if($correct == 'C'){
        $corrects = 2;
      }else if($correct == 'D'){
        $corrects = 3;
      }else if($correct == 'E'){
        $corrects = 4;
      }
      


      $createQuestion = $getFromExam->create('question',  array('question'=>$question, 'exam_id'=>$id));
      if($createQuestion){ 

        $question_id = $createQuestion;
    
        $createOptions = $getFromExam->createOption($question_id, $corrects, $options);  
        
        

        
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Question Uploaded.')
     
      
     
    });
   setInterval(() => {
      window.open('admin/new_exam/".$id."','_self');
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
      toastr.error('  Failed to Upload Question.')
    
    
    
    });
  /*
    setInterval(() => {
      window.open('admin/new_exam/".$id."','_self');
    }, 1000);
  
      */          
  
  </script>"; 

        
      }    
 
  }



  }
    }
}

}



//Admin Set Question 

/*
if(isset($_POST['set_question'])){
  
    $question = $_POST['question'];
    // $subject_id = $_GET['question'];
    // $subject_id = 1;

    $correct = $_POST['correct'];
    $exam_id = $_POST['exam_id'];
    $option = array();
    $option[1] =  $_POST['option1'];
    $option[2] =  $_POST['option2'];
    $option[3] =  $_POST['option3'];
    $option[4] =  $_POST['option4'];
    $option[5] =  $_POST['option5'];


    $createQuestion = $getFromExam->create('question',  array('question'=>$question, 'exam_id'=>$id));
        
    if($createQuestion){ 

      $question_id = $createQuestion;

      $createOptions = $getFromExam->createOption($question_id, $correct, $option);     
      
      
  if($createOptions){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Question Saved.')
       
        
       
      });
     setInterval(() => {
        window.open('admin/new_exam/".$id."','_self');
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
        toastr.error('  Failed to Create Question.')
      
      
      
      });
    
      setInterval(() => {
        window.open('admin/new_exam/".$id."','_self');
      }, 1000);
    
                  
    
    </script>"; 

  }
    }
}
*/




//Admin Upload Question 
 //var_dump($questions);
  //var_export($questions);
  //$opt= ['A','B','C','D','E'];
 
  
if(isset($_POST['set_question'])){

  /*
  $exam_id = $_POST['exam_id'];
  $set_id = $_POST['set_id'];
  $get_file = $getFromExam->get_single('question_upload', $set_id)->file;

   $questions = $getFromExam->XtractQuestion($get_file);
   //var_dump($questions);
  
  for ($i=0; $i < count($questions); $i++) { 
     $question = $questions[$i]['question'];
      $options = $questions[$i]['options'];     
      $correct = $questions[$i]['answer'];

      if($correct == 'A'){
        $corrects = 0;
      }else if($correct == 'B'){
        $corrects = 1;
      }else if($correct == 'C'){
        $corrects = 2;
      }else if($correct == 'D'){
        $corrects = 3;
      }else if($correct == 'E'){
        $corrects = 4;
      }
      


      $createQuestion = $getFromExam->create('question',  array('question'=>$question, 'exam_id'=>$id));
      if($createQuestion){ 

        $question_id = $createQuestion;
    
        $createOptions = $getFromExam->createOption($question_id, $corrects, $options);     
        
      }    
 
  }
*/
}
      
   
//Category Data

if(isset($_POST['category_data'])){

  $cat_name = $_POST['cat_name'];
  //$avatar = $_POST['avatar'];
  //$cat_type = $_POST['cat_type']; 
   $cat_id = @$_POST['cat_id'];
 

  if(isset($_FILES['avatar']) ){
    if(!empty($_FILES['avatar']['name'][0])){
            $fileRoot = $getFromCourse->uploadImage($_FILES['avatar']);
    }
  }

  if($_POST['cat_type']  == 'update'){

      
  $cat_info = $getFromCourse->update('course_category', $cat_id, array('cat_name'=>$cat_name,'avatar'=>$fileRoot));
  
  if($cat_info){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Category Info Updated.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/create_category/".$cat_id."','_self');
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
        toastr.error('  Failed to Update Category Info.')
      
      
      
      });
    
                  
    
    </script>"; 

  }



  }else{
    
  $cat_info = $getFromCourse->create('course_category', array('cat_name'=>$cat_name, 'avatar'=>$fileRoot));
  
  if($cat_info){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Category Info Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/create_category/','_self');
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
        toastr.error('  Failed to Create Category.')
      
      
      
      });
    
                  
    
    </script>"; 

  }




  }

 


}









/*
      MAin Menu Forms
*/



    // Blog  Page
    if(isset($_POST['blog_comment_page'])){


      $email = $_POST['email'];
      $comments = $_POST['comments'];
      $names = $_POST['names'];
      $post_id = $_POST['post_id'];
     


      $comment_pAGE = $getFromGeneric->create('blog_comments',  array('post_id'=>$post_id, 'email'=>$email, 'comment'=>$comments, 'names'=>$names));

      if($comment_pAGE){ 

     
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
       toastr.success('Comment Saved..')
         
          
         
        });
      
      
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
          toastr.error('  Failed! Please Try again.')
        
        
        
        });
      
                    
      
      </script>"; 

  
          }
      


  }




/*
      MAin Menu Forms
*/



    // Contact Us Page
    if(isset($_POST['contact_us_page'])){


      $email = $_POST['email'];
      $tel = $_POST['tel'];
      $name = $_POST['name'];
     


      $contact_us = $getFromGeneric->create('contact_us',  array('email'=>$email, 'tel'=>$tel, 'customer_name'=>$name));

      if($contact_us){ 

     
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
       toastr.success('Your Details has been Received Our Customer Services will get in touch with you..')
         
           /* Toast.fire({
              type: 'success',
              title: ' Course Details Saved .'
            })*/
         
        });
        setInterval(() => {
          window.open('".BASE_URL."/contact/','_self');
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
          toastr.error('  Failed! Please Try again.')
        
        
        
        });
      
                    
      
      </script>"; 

  
          }
      


  }



  
    // Contact Us Page
    if(isset($_POST['newsletter_footer'])){


      $email = $_POST['email'];
     


      $newsletter = $getFromGeneric->create('newsletter',  array('email'=>$email));

      if($newsletter){ 

     
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
       toastr.success('Stay Tuned for Our Newsletters...')
         
           /* Toast.fire({
              type: 'success',
              title: ' Course Details Saved .'
            })*/
         
        });
        setInterval(() => {
          window.open('".BASE_URL."/','_self');
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
          toastr.error('  Failed! Please Try again.')
        
        
        
        });
      
                    
      
      </script>"; 

  
          }
      


  }


/*
      Education and Qualifications
*/
if(isset($_POST['save_student_qualification'])){

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
          window.open('admin/student_reg/".$col_id."','_self');
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
    * Admin Admin Activation/Deactivation Model
*/


//Student Activate


if(isset($_POST['student_activate_admin'])){
  $student = $_POST['student_id'];

  $update = $getFromAdmin->update('user', $student, array('statu'=>1));


    
if($update){ 

  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Admin activated Successfully.')
     
       /* Toast.fire({
          type: 'success',
          title: ' Price Info Saved .'
        })*/
     
    });
   setInterval(() => {
      window.open('admin/admin/','_self');
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
      toastr.error('  Failed to activate Admin.')
      setInterval(() => {
          window.open('admin/admin/','_self');
        }, 2000);
    
    
    
    });
  
                
  
  </script>"; 

}

}

//Student De-Activated

if(isset($_POST['student_deactivate_admin'])){
  $student = $_POST['student_id'];

  $update = $getFromAdmin->update('user', $student, array('statu'=>0));

  
if($update){ 

  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Admin Deactivated.')
     
       /* Toast.fire({
          type: 'success',
          title: ' Price Info Saved .'
        })*/
     
    });
   setInterval(() => {
      window.open('admin/admin/','_self');
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
      toastr.error('  Failed to deactivate Admin.')
      setInterval(() => {
          window.open('admin/admin/','_self');
        }, 2000);
    
    
    
    });
  
                
  
  </script>"; 

}

}










/*
    * Admin Student Activation Model
*/


//Student Activate


if(isset($_POST['student_activate'])){
  $student = $_POST['student_id'];

  $update = $getFromAdmin->update('user', $student, array('statu'=>1));


    
if($update){ 

  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Student activated Successfully.')
     
       /* Toast.fire({
          type: 'success',
          title: ' Price Info Saved .'
        })*/
     
    });
   setInterval(() => {
      window.open('admin/student/','_self');
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
      toastr.error('  Failed to activate Student.')
      setInterval(() => {
          window.open('admin/student/','_self');
        }, 2000);
    
    
    
    });
  
                
  
  </script>"; 

}

}

//Student De-Activated

if(isset($_POST['student_deactivate'])){
  $student = $_POST['student_id'];

  $update = $getFromAdmin->update('user', $student, array('statu'=>0));

  
if($update){ 

  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Student Deactivated.')
     
       /* Toast.fire({
          type: 'success',
          title: ' Price Info Saved .'
        })*/
     
    });
   setInterval(() => {
      window.open('admin/student/','_self');
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
      toastr.error('  Failed to deactivate Student.')
      setInterval(() => {
          window.open('admin/student/','_self');
        }, 2000);
    
    
    
    });
  
                
  
  </script>"; 

}

}














//Blog Post Activate


if(isset($_POST['news_activate'])){
  $blog = $_POST['news_id'];

  $update = $getFromBlog->update('blog_post', $blog, array('post_status'=>1));


    
if($update){ 

  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Blog Post Published Successfully.')
     
   
     
    });
   setInterval(() => {
      window.open('admin/news/','_self');
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
      toastr.error('  Failed to Publish blog post.')
      setInterval(() => {
          window.open('admin/news/','_self');
        }, 2000);
    
    
    
    });
  
                
  
  </script>"; 

}

}

//blog De-Activated

if(isset($_POST['news_deactivate'])){
  $blog = $_POST['news_id'];

  $update = $getFromBlog->update('blog_post', $blog, array('post_status'=>0));

  
if($update){ 

  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Blog Post Unpublished.')
     
     
    });
   setInterval(() => {
      window.open('admin/news/','_self');
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
      toastr.error('  Failed to upublish blog post.')
      setInterval(() => {
          window.open('admin/news/','_self');
        }, 2000);
    
    
    
    });
  
                
  
  </script>"; 

}

}








/*
    * Admin Admin Registration Model
*/


//Admin Bio Data

if(isset($_POST['admin_bio_data'])){

  $title = $_POST['title'];
  $surname = $_POST['surname'];
  $firstname = $_POST['firstname'];
  $gender = $_POST['gender'];
 /* $middlename = $_POST['middlename'];
  $dob = $_POST['dob'];
 
  $country = $_POST['country'];
  $address = $_POST['address'];*/
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  $password = MD5($_POST['password']);
  $id_post = @$_POST['id_post'];

  /*if(isset($_FILES['profileimage']) ){
    if(!empty($_FILES['profileimage']['name'][0])){
            $fileRoot = $getFromCourse->uploadImage($_FILES['profileimage']);
    }
  }*/

  if($_POST['type_act']  == 'update'){

      
  $admin_bio = $getFromCourse->update('user', $id_post, array('surname'=>$surname,'title'=>$title,'firstname'=>$firstname,'gender'=>$gender,'email'=>$email,'tel'=>$tel,'password'=>$password,'type'=>'teacher'));
  
  if($admin_bio){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Admin Bio Data Updated.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/manage-admin/".$id_post."','_self');
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
        toastr.error('  Failed to Update Admin Data.')
      
      
      
      });
    
                  
    
    </script>"; 

  }



  }else{
    
  $admin_bio = $getFromCourse->create('user', array('surname'=>$surname,'title'=>$title,'firstname'=>$firstname,'gender'=>$gender,'email'=>$email,'tel'=>$tel,'password'=>$password,'type'=>'teacher'));
  
  if($admin_bio){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Admin Bio Data Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/manage-admin/".$admin_bio."','_self');
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
        toastr.error('  Failed to Create Admin Data.')
      
      
      
      });
    
                  
    
    </script>"; 

  }




  }
  
 


}








/*
    * Admin Student Registration Model
*/


//Student Bio Data

if(isset($_POST['student_bio_data'])){

  $title = $_POST['title'];
  $surname = $_POST['surname'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $country = $_POST['country'];
  $address = $_POST['address'];
  $tel = $_POST['tel'];
   $password = MD5($_POST['password']);
   $pass = $_POST['password'];
  $email = $_POST['email'];
  $id_post = @$_POST['id_post'];

  if(isset($_FILES['profileimage']) ){
    if(!empty($_FILES['profileimage']['name'][0])){
            $fileRoot = $getFromCourse->uploadImage($_FILES['profileimage']);
            $student_bio = $getFromCourse->update('user', $id_post, array('surname'=>$surname,'password'=>$password,'title'=>$title,'firstname'=>$firstname,'middle_name'=>$middlename,'dob'=>$dob,'gender'=>$gender,'email'=>$email,'tel'=>$tel,'nationality'=>$country,'address'=>$address, 'type'=>'student', 'profileimage'=>$fileRoot));
    }else{
       
            $student_bio = $getFromCourse->update('user', $id_post, array('surname'=>$surname,'password'=>$password,'title'=>$title,'firstname'=>$firstname,'middle_name'=>$middlename,'dob'=>$dob,'gender'=>$gender,'email'=>$email,'tel'=>$tel,'nationality'=>$country,'address'=>$address, 'type'=>'student'));
            
          }
          
  }
       
  
 
  if($_POST['type_act']  == 'update'){

   
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
        window.open('admin/student_reg/".$id_post."','_self');
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
    
                  
    
    </script>"; 

  }



  }else{
    
    $subject = "Global Trade Tutor";
        
    $body = "
    <html>
    <head>
    <title>Global Trade Tutor Login Details</title>
    </head>
    <body>
    <h2>Welcome <strong>".$firstname."</strong> to Global Trade Tutor</h2>
    <p> Click here to login to you <a href='http://globaltradetutor.com/auth'>Portal</a> </p>
    <table>
    <tr>
    <th>Email</th>
    
    <th></th>
    <th>Password</th>
    </tr>
    <tr>
    <td>".$email."</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>".$pass."</td>
    </tr>
    </table>
    </body>
    </html>
    ";
    


  $student_bio = $getFromGeneric->create('user', array('surname'=>$surname,'password'=>$password,'title'=>$title,'firstname'=>$firstname,'middle_name'=>$middlename,'dob'=>$dob,'gender'=>$gender,'email'=>$email,'tel'=>$tel,'nationality'=>$country,'address'=>$address, 'type'=>'student', 'profileimage'=>$fileRoot));
  $send_mail = $getFromGeneric->sendmail($email,$subject,$body);

  if($student_bio &&  $send_mail){ 
  

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
        window.open('admin/student_reg/".$student_bio."','_self');
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
    
                  
    
    </script>"; 

  }




  }
  
 


}






if(isset($_POST['reactivate_registered_student_course'])){
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];

  
  $delete_course = $getFromGeneric->update('student_courses', $course_id, array('status'=> 1));

  
  if($delete_course){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Course Reactivated Successfully.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
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
        toastr.error('  Failed to  Reactivate Course.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
}





//Delete Student Course Registration By Admin 

if(isset($_POST['delete_registered_student_course'])){
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];

  
  $delete_course = $getFromGeneric->update('student_courses', $course_id, array('status'=> 0));

  
  if($delete_course){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Course Removed Successfully.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
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
        toastr.error('  Failed to  Remove Course.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
}







//Student Course Registration By Admin 

if(isset($_POST['register_course_for_student1'])){
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  $pay_status = $_POST['pay_status'];
  $amount = $getFromGeneric->get_single('courses', $course_id)->disc_price;
  
  $check = $getFromStudent->check_std_courses($course_id, $student_id);
  if(!empty($check)){
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.warning('Student Already Subcribed to this Course.')
     
     
     
    });
   setInterval(() => {
      window.open('admin/register-course/','_self');
    }, 2000);
  
  </script>";
 
  }else{
  $student_course_reg = $getFromCourse->create('student_courses', array('student_id'=>$student_id, 'course_id'=>$course_id));
  
  if($student_course_reg){ 
    
  $save_payment = $getFromCourse->create('payment', array('user_id'=>$student_id,'status'=>$pay_status,'amount'=>$amount, 'course_id'=>$course_id, 'staff_id'=>$admin_id));
  $invoice = '#'.$save_payment;  
  $invoice = $getFromStudent->update('payment', $save_payment, array('invoice_no'=>$invoice));
  if($save_payment){
    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Course Registration Successsfull.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/register-course/','_self');
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
        toastr.error('  Failed to  Register Course.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/register-course/','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
  }


}


}

//Student Course Registration By Admin 

if(isset($_POST['register_course_for_student'])){
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  $amount = $_POST['amount'];
  $status = $_POST['pay_status'];
  

  //$amount = $getFromGeneric->get_single('courses', $course_id)->disc_price;
  


  $check = $getFromStudent->check_std_courses($course_id, $student_id);
  if(!empty($check)){
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.warning('Student Already Subcribed to this Course.')
     
     
     
    });
   setInterval(() => {
      window.open('admin/student_reg/".$student_id."','_self');
    }, 2000);
  
  </script>";
 
  }else{
  $student_course_reg = $getFromCourse->create('student_courses', array('student_id'=>$student_id, 'course_id'=>$course_id));
  
      if($student_course_reg){ 
        
     // $save_payment = $getFromCourse->create('payment', array('user_id'=>$student_id,'status'=>$pay_status,'amount'=>$amount, 'course_id'=>$course_id, 'staff_id'=>$admin_id));
        
    if($status == 'tranche_1')
    {
      $save_payment = $getFromCourse->create('payment', array('staff_id'=>$admin_id,'user_id'=>$student_id,'course_id'=>$course_id,'tranche_1'=>$amount, 'status'=>'tranche_1'));

    }elseif($status == 'free_access')
    {
      $save_payment = $getFromCourse->create('payment', array('staff_id'=>$admin_id,'user_id'=>$student_id,'course_id'=>$course_id, 'status'=>'free_access'));

    }elseif($status == 'tranche_2')
    {
      $save_payment = $getFromCourse->create('payment', array('staff_id'=>$admin_id,'user_id'=>$student_id,'course_id'=>$course_id,'tranche_2'=>$amount, 'status'=>'tranche_2'));

    }elseif($status == 'tranche_3')
    {
      $save_payment = $getFromCourse->create('payment', array('staff_id'=>$admin_id,'user_id'=>$student_id,'course_id'=>$course_id,'tranche_3'=>$amount, 'status'=>'tranche_3'));

    }
  
  //$invoice = '#'.$save_payment;  
 // $invoice = $getFromStudent->update('payment', $save_payment, array('invoice_no'=>$invoice));
  if($save_payment){
    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Course Registration Successsfull.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
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
        toastr.error('  Failed to  Register Course.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
  }


}

/*




  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  

  $student_course_reg = $getFromCourse->create('student_courses', array('student_id'=>$student_id, 'course_id'=>$course_id));
  
  if($student_course_reg){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Course Registration Successsfull.')
       
       
       
      });
     setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
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
        toastr.error('  Failed to  Register Course.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
*/


}



//Student Employment Data

if(isset($_POST['student_employment_data'])){

  $company = $_POST['company'];
  $position = $_POST['position'];
  $dept = $_POST['dept'];
  $town = $_POST['town'];
  $company_address = $_POST['company_address'];
  $country = $_POST['country'];
  $id = $_GET['student_reg'];
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
          window.open('admin/student_reg/".$col_id."','_self');
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
        setInterval(() => {
          window.open('admin/student_reg/".$col_id."','_self');
        }, 2000);
      
                    
      
      </script>"; 

    }


}





/*
    * Admin Course Creation Model
*/


// Modal Post
if(isset($_POST['new_course_section'])){
    $title = $_POST['title'];
    $link = $_POST['link'];
    $duration = $_POST['duration'];
    $type = $_POST['type'];
    //$course_id = $_POST['course_id'];

    $section = $getFromCourse->create('course_content', array('course_id'=>$id,'title'=>$title,'link'=>$link,'duration'=>$duration,'type'=>$type));
  
    if($section){ 

      echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.success(' Section Created Successfully.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Price Info Saved .'
            })*/
         
        });
       setInterval(() => {
          window.open('admin/new_course/".$id."','_self');
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
          toastr.error('  Failed to Create New Section.')
        
        
        
        });
        setInterval(() => {
          window.open('admin/new_course/".$id."','_self');
        }, 2000);
      
      
                    
      
      </script>"; 

    }
}






/// Publish Blog Post
if(isset($_POST['publish_blog'])){
  
  $blog_id = $_POST['blog_id'];
  $status = $_POST['status'];

if($status == 'publish'){
  $section = $getFromCourse->update('blog_post', $blog_id, array('post_status'=>'1'));

  if($section){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
       
         Toast.fire({
            type: 'success',
            title: ' The Blog News has been Published ! .'
          })
       
      });
     setInterval(() => {
        window.open('admin/create_post/".$blog_id."','_self');
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
        toastr.error('  Failed to Publish this News Try again!!.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/create_post/".$blog_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }

}elseif($status == 'unpublish'){
  $section = $getFromCourse->update('blog_post', $blog_id, array('post_status'=>'0'));

  if($section){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
          Toast.fire({
            type: 'success',
            title: ' The Blog News has been Unpublished! .'
          })
       
      });
     setInterval(() => {
        window.open('admin/create_post/".$blog_id."','_self');
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
        toastr.error('  Failed to Unpublish this News Try again!!.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/create_post/".$blog_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
}
  
}








/// Publish Course publish_course
if(isset($_POST['publish_course'])){
  
  $course_id = $_POST['course_id'];
  $status = $_POST['status'];

if($status == 'publish'){
  $section = $getFromCourse->update('courses', $course_id, array('publish'=>'1'));

  if($section){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
      //  toastr.success(' Section Deleted Successfully.')
       
         Toast.fire({
            type: 'success',
            title: ' The Course has been Published! .'
          })
       
      });
     setInterval(() => {
        window.open('admin/new_course/".$course_id."','_self');
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
        toastr.error('  Failed to Publish this Course Try again!!.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/new_course/".$course_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }

}elseif($status == 'unpublish'){
  $section = $getFromCourse->update('courses', $course_id, array('publish'=>'0'));

  if($section){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
      //  toastr.success(' Section Deleted Successfully.')
       
         Toast.fire({
            type: 'success',
            title: ' The Course has been Unpublished! .'
          })
       
      });
     setInterval(() => {
        window.open('admin/new_course/".$course_id."','_self');
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
        toastr.error('  Failed to Unpublish this Course Try again!!.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/new_course/".$course_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
}
  
}

// Delete Course Content 
if(isset($_POST['delete_course_content'])){
    $video_link = $_POST['link'];
    $section_id = $_POST['section_id'];


    $section = $getFromCourse->update('course_content', $section_id, array('deleted'=>'1'));
  
    if($section){ 

      echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.success(' Section Deleted Successfully.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Price Info Saved .'
            })*/
         
        });
       setInterval(() => {
          window.open('admin/new_course/".$section_id."','_self');
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
          toastr.error('  Failed to delete Section.')
        
        
        
        });
        setInterval(() => {
          window.open('admin/new_course/".$section_id."','_self');
        }, 2000);
      
                    
      
      </script>"; 

    }
}









// Audio Post
if(isset($_POST['section_audio'])){
    $audio_link = $_POST['link'];
    $section_id = $_POST['section_id'];


    $section = $getFromCourse->update('course_content',  $section_id, array('audio_link'=>$audio_link));
  
    if($section){ 

      echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.success(' Section Audio Added.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Price Info Saved .'
            })*/
         
        });
       setInterval(() => {
          window.open('admin/new_course/".$id."','_self');
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
          toastr.error('  Failed to Add Section Audio.')
        
        
        
        });
        setInterval(() => {
          window.open('admin/new_course/".$id."','_self');
        }, 2000);
      
                    
      
      </script>"; 

    }
}





// Course Info Post
    if(isset($_POST['price_info'])){
        $price = $_POST['price'];
        $disc_price = $_POST['discount'];
        $id = $_POST['id'];      
    $create_course = $getFromCourse->update('courses', $id, array('price'=>$price, 'disc_price'=>$disc_price));
  
    if($create_course){ 

      echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.success(' Price Info Saved.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Price Info Saved .'
            })*/
         
        });
        setInterval(() => {
          window.open('admin/new_course/".$id."','_self');
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
          toastr.error('  Failed to Save Price Info.')
        
        
        
        });
        setInterval(() => {
          window.open('admin/new_course/".$id."','_self');
        }, 2000);
      
                    
      
      </script>"; 

    }


    }

    



     // Course Creating/ Updating Post
     if(isset($_POST['create_blog_post'])){


      $title = $_POST['blog_title'];
      $full = $_POST['full_desc'];
      $short = $_POST['short_desc'];
      $category = $_POST['post_cat'];
      $det = $_POST['det'];
      $user = $_SESSION['admin_id'];
      $url_slug = $getFromBlog->url_slug($_POST['blog_title']);

    if($det == 'save'){
      $post_blog = $getFromBlog->create('blog_post',  array('title'=>$title, 'url_slug'=>$url_slug, 'body'=>$full, 'descs'=>$short, 'category'=>$category, 'author'=>$user));

      if($post_blog){ 

     
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
       toastr.success('Post Details Saved.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Course Details Saved .'
            })*/
         
        });
        setInterval(() => {
          window.open('admin/create_post/".$post_blog."','_self');
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
          toastr.error('Failed to Save Post Details.')
        
        
        
        });
      
                    
      
      </script>"; 

  
          }
      

    }else{
      $ids = $_POST['ids'];
      $blog_post = $getFromBlog->update('blog_post',  $ids, array('title'=>$title,'url_slug'=>$url_slug, 'body'=>$full, 'descs'=>$short, 'category'=>$category, 'author'=>$user));

      if($blog_post){ 

     
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
       toastr.success('Post Details Saved.')
         
       
         
        });
        setInterval(() => {
          window.open('admin/create_post/".$ids."','_self');
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
          toastr.error('  Failed to Update Post Details.')
        
        
        
        });
        setInterval(() => {
          window.open('admin/create_post/".$ids."','_self');
        }, 2000);
      
                    
      
      </script>"; 

  
          }
      

    }
     
     


  }


    // Course Creating/ Updating Post
    if(isset($_POST['details'])){


        $abrev = $_POST['course_abrev'];
        $name = $_POST['course_name'];
        $desc = $_POST['course_disc'];
        $short = $_POST['short_disc'];
        $category = $_POST['course_cat'];
        $level = $_POST['course_level'];
        $det = $_POST['det'];
      //  $files = $_FILES['upload'];

      if($det == 'save'){
        $create_course = $getFromCourse->create('courses',  array('course_abrev'=>$abrev, 'course_name'=>$name, 'cat_id'=>$category, 'level'=>$level, 'long_desc'=>$desc, 'descs'=>$short));

        if($create_course){ 

       
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
         toastr.success('Course Details Saved.')
           
             /* Toast.fire({
                type: 'success',
                title: ' Course Details Saved .'
              })*/
           
          });
          setInterval(() => {
            window.open('admin/new_course/".$create_course."','_self');
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
            toastr.error('  Failed to Save Course Details.')
          
          
          
          });
        
                      
        
        </script>"; 

    
            }
        

      }else{
        $ids = $_POST['ids'];
        $create_course = $getFromCourse->update('courses',  $ids, array('course_abrev'=>$abrev, 'course_name'=>$name, 'cat_id'=>$category, 'level'=>$level, 'long_desc'=>$desc, 'descs'=>$short));

        if($create_course){ 

       
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
         toastr.success('Course Details Saved.')
           
             /* Toast.fire({
                type: 'success',
                title: ' Course Details Updated .'
              })*/
           
          });
          setInterval(() => {
            window.open('admin/new_course/".$ids."','_self');
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
            toastr.error('  Failed to Update Course Details.')
          
          
          
          });
          setInterval(() => {
            window.open('admin/new_course/".$ids."','_self');
          }, 2000);
        
                      
        
        </script>"; 

    
            }
        

      }
       
       


    }




    // Update Course Image

    if(isset($_POST['update_blog_image'])){
      $id = $_POST['id'];
      if(isset($_FILES['img_preview'])){
        if(!empty($_FILES['img_preview']['name'][0])){
                $fileRoot = $getFromCourse->uploadImage($_FILES['img_preview']);
               // $fileRoots = $getFromCourse->uploadImage($_FILES['avatar']);
              $up_img =  $getFromCourse->update('blog_post', $id, array('img_url' => $fileRoot));
                if(!empty($up_img)){
                  
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
     toastr.success('Image Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Post Details Saved .'
          })*/
       
      });
      setInterval(() => {
        window.open('admin/create_post/".$id."','_self');
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
        toastr.error('  Failed to Save Image.')
      
      
      
      });
    
      setInterval(() => {
        window.open('admin/create_post/".$id."','_self');
      }, 2000);         
    
    </script>"; 

  }
}

                }
 
    }






    // Update Course Image

    if(isset($_POST['update_course_image'])){
      $id = $_POST['id'];
      if(isset($_FILES['img_preview']) && ($_FILES['avatar']) ){
        if(!empty($_FILES['img_preview']['name'][0])){
                $fileRoot = $getFromCourse->uploadImage($_FILES['img_preview']);
                $fileRoots = $getFromCourse->uploadImage($_FILES['avatar']);
              $up_img =  $getFromCourse->update('courses', $id, array('img_preview' => $fileRoot, 'avatar' => $fileRoots));
              
        }elseif(isset($_FILES['img_preview'])){      
              
          $fileRoot = $getFromCourse->uploadImage($_FILES['img_preview']);
       //   $fileRoots = $getFromCourse->uploadImage($_FILES['avatar']);
        $up_img =  $getFromCourse->update('courses', $id, array('img_preview' => $fileRoot));
      
      }elseif(isset($_FILES['avatar'])){      
        $fileRoots = $getFromCourse->uploadImage($_FILES['avatar']);
        $up_img =  $getFromCourse->update('courses', $id, array('avatar' => $fileRoots));
      
       }
       
       if(!empty($up_img)){
                  
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
     toastr.success('Image Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Course Details Saved .'
          })*/
       
      });
      setInterval(() => {
        window.open('admin/new_course/".$id."','_self');
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
        toastr.error('  Failed to Save Image.')
      
      
      
      });
    
      setInterval(() => {
        window.open('admin/new_course/".$id."','_self');
      }, 2000);         
    
    </script>"; 

  }

                }
 
    }



    
/*
    * Admin Student Registration Model
*/


//Student Profile  Data Update

if(isset($_POST['edit_student_profile'])){

  $title = $_POST['title'];
  $surname = $_POST['surname'];
   $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];  
  $opass = $_POST['opass'];
  $npass = MD5($_POST['npass']); 
  $id = $_POST['id'];
  $subscribe = $_POST['subscribe'];
  $bio = $_POST['bio'];
  $country = $_POST['country']; 
  $profileimage = $_POST['profileimage'];
  $address = $_POST['address'];
  $instagram = $_POST['instagram'];
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $tel = $_POST['tel'];
  $freelance = $_POST['freelance'];



  $student_bio = $getFromCourse->update('user', $id, array('surname'=>$surname,'title'=>$title,'firstname'=>$firstname,'middle_name'=>$middlename,'password'=>$npass,'newsletter'=>$subscribe,'email'=>$email,'tel'=>$tel,'nationality'=>$country,'address'=>$address, 'bio'=>$bio,'profileimage'=>$profileimage, 'twitter'=>$twitter,'instagram'=>$instagram, 'facebook'=>$facebook,'freelance'=>$freelance));
  

  
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
          window.open('student/edit-account/','_self');
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
      
                    
      
      </script>"; 

    }



}

?>