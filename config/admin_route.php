
<?php

    
// Admin Portal Routes   


if(isset($_GET['new_exam'])){
  include('../admin/new_exam.php');
}  

elseif(isset($_GET['profile'])){
    include('../admin/student/profile.php');
} 

elseif(isset($_GET['schedule_exam'])){
    include('../admin/schedule_exam.php');
} 

 elseif(isset($_GET['dashboard'])){
     include('../admin/dashboard.php');
     }
     elseif(isset($_GET['outstanding'])){

         include('../admin/outstanding.php');

         }
         elseif(isset($_GET['student_school'])){

             include('../admin/student/student_by_school.php');
 
             }
         elseif(isset($_GET['billing'])){
         include('../admin/billing.php');
         }
           

         elseif(isset($_GET['courses_search'])){
             include('../admin/student/courses_search.php');
         } 
          elseif(isset($_GET['billing_search'])){
             include('../admin/student/billing_search.php');
         }



         elseif(isset($_GET['chat'])){
             include('../admin/student/chats.php');
         }

         elseif(isset($_GET['setting'])){
             include('../admin/settings.php');
         } 
          elseif(isset($_GET['export_student'])){
             include('../admin/export.php');
         }
         elseif(isset($_GET['prospectus'])){
             include('../admin/prospectus.php');
         }
         elseif(isset($_GET['prospectus_create'])){
             include('../admin/prospectus_create.php');
         }
             

 elseif(isset($_GET['role'])){
     include('../admin/admin_role.php');
 }
       

 elseif(isset($_GET['message'])){
     include('../admin/messages.php');
 }

 elseif(isset($_GET['assignment'])){
     include('../admin/assignment.php');
 } 
  elseif(isset($_GET['assignment-menu'])){
     include('../admin/assignment_menu.php');
 }


 elseif(isset($_GET['message'])){
     include('../admin/messages.php');
 }


  elseif(isset($_GET['delete_course_content'])){
     include('../admin/includes/delete_folder/delete_course_content.php');
 }



  elseif(isset($_GET['courses_cat'])){
      include('../admin/student/courses_cat.php');
  }
  elseif(isset($_GET['courses_pub'])){
      include('../admin/student/courses_pub.php');
  }

  elseif(isset($_GET['billing_outstanding'])){
     include('../admin/student/billing_pub_out.php');
 }

 elseif(isset($_GET['billing_full'])){
     include('../admin/student/billing_pub.php');
 }

 elseif(isset($_GET['course_billing'])){
     include('../admin/student/billing_course.php');
 }


  elseif(isset($_GET['courses'])){
      include('../admin/student/courses.php');
  }
  elseif(isset($_GET['new_course'])){
      include('../admin/student/new_course.php');
  }
   elseif(isset($_GET['student_reg'])){
      include('../admin/student/student_reg.php');
  }





  
 elseif(isset($_GET['aies_upload'])){
     include('../admin/student/aies_upload.php');
 }

 elseif(isset($_GET['manage_aies'])){
     include('../admin/student/manage_aies.php');
 }
 elseif(isset($_GET['result_upload'])){
     include('../admin/student/result_upload.php');
 } 
 elseif(isset($_GET['manage_result'])){
     include('../admin/student/manage_result.php');
 } 
 elseif(isset($_GET['cert_upload'])){
     include('../admin/student/cert_upload.php');
 } 


  
 elseif(isset($_GET['manage_cert'])){
     include('../admin/student/manage_cert.php');
 } 






 elseif(isset($_GET['student'])){
     include('../admin/student/student.php');
 }
  elseif(isset($_GET['payment-mgt'])){
     include('../admin/payment_update.php');
 }
 elseif(isset($_GET['edit_content'])){
     include('../admin/student/edit_course_content.php');
 } 
 elseif(isset($_GET['register-course'])){
     include('../admin/student/register_course_st.php');
 } 
 elseif(isset($_GET['admin'])){
     include('../admin/student/admin.php');
 } 
 elseif(isset($_GET['manage-admin'])){
     include('../admin/student/admin_mgt.php');
 } 




  elseif(isset($_GET['result'])){
      include('../admin/result.php');
  } 


  elseif(isset($_GET['assessment'])){
      include('../admin/assessment.php');
  } 


  elseif(isset($_GET['exam'])){
      include('../admin/exam.php');
  } 



  elseif(isset($_GET['student_search'])){
      include('../admin/student/student_search.php');
  }

  elseif(isset($_GET['student_search_cat'])){
      include('../admin/student/student_search_cat.php');
  } 
  elseif(isset($_GET['chats'])){
      include('../admin/student/chats.php');
  } 

       elseif(isset($_GET['edit-account'])){
          include('../admin/edit_account.php');
      } 

      elseif(isset($_GET['category'])){
         include('../admin/student/category.php');
     } 

     elseif(isset($_GET['create_category'])){
         include('../admin/student/create_category.php');
     } 
     

     elseif(isset($_GET['school'])){
         include('../admin/student/school.php');
     } 

     elseif(isset($_GET['create_school'])){
         include('../admin/student/create_school.php');
     } 
     elseif(isset($_GET['edit_question'])){
         include('../admin/edit_question.php');
     } 

     elseif(isset($_GET['schedule_list'])){
         include('../admin/schedule_list.php');
     } 

     elseif(isset($_GET['search_schedule_list'])){
         include('../admin/search_schedule_list.php');
     } 


     elseif(isset($_GET['schedule_for_student'])){
         include('../admin/schedule_for_student.php');
     } 

      elseif(isset($_GET['logout'])){
          include('../auth/logout.php');
      } 


      


      // Blog Route 
      elseif(isset($_GET['news']))
      {
         include('../admin/blog/post.php');
     }
     elseif(isset($_GET['create_post']))
     {
         include('../admin/blog/create_post.php');
     }
     elseif(isset($_GET['blog-category']))
     {
        include('../admin/blog/category.php');
    }


    elseif(isset($_GET['blog_search']))
    {
       include('../admin/blog/blog_search.php');
   }

   elseif(isset($_GET['download']))
   {
      include('../admin/download.php');
  }




    elseif(isset($_GET['create-blog-category']))
    {
        include('../admin/blog/create_category.php');
    }

























      // Product Route  assignment_list
      elseif(isset($_GET['assignment_list']))
      {
         include('../admin/assignment_list.php');
     }
     elseif(isset($_GET['products']))
     {
        include('../admin/product/product.php');
    }
     elseif(isset($_GET['create_product']))
     {
         include('../admin/product/create_product.php');
     }
     elseif(isset($_GET['product-category']))
     {
        include('../admin/product/product_category.php');
    }


    elseif(isset($_GET['product_search']))
    {
       include('../admin/product/product_search.php');
   }

 



    elseif(isset($_GET['create-product-category']))
    {
        include('../admin/product/create_product_category.php');
    }







 /*   else{
         include('../admin/dashboard.php');
     } 
     */

?>