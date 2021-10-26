



<!--Confirmation for course content Deletion -->
<script>



$(document).ready(function(){

$('a[name="modal_edit_question"]').click(function(){
   event.preventDefault();

   var question_id =  $(this).attr('question_id');
   var exam_id =  $(this).attr('exam_id');
  var edit_question = 'edit_question';
  
          $.ajax({

      url:"<?=BASE_URL?>student_portal/includes/processing.php",
      method:"POST",
      data:{ question_id : question_id, exam_id : exam_id, edit_question_admin : edit_question  },
      dataType:"json",



      })
      .done(function(data) {
        //  alert( "second success" );
        setVideoSource(link);
              
      })
      .fail(function(errorData) {
          alert( 'Failed Contact Administrator' );
      })

  

  }); 
  
  });


$('#question_ids_edit_quest').click(function(){
  //var check = event.preventDefault();
  
  var edit_question_id = $('#edit_question_id').val();

            $.ajax({

            url:"<?=BASE_URL?>student_portal/includes/processing.php",
            method:"POST",
            data:{ edit_question_id : edit_question_id },
            dataType:"json",



            })
            .done(function(data) {
            //  alert( "second success" );
            setAudioSource(link);
                    
            })
            .fail(function(errorData) {
                alert( 'Failed Contact Administrator' );
            })



});




$('#delete_course_content').click(function(){
  //var check = event.preventDefault();
  var conf = confirm('Are you Sure you want to Delete this Section !!');
  if(conf == true){
    return true;
  }else{
    return false;
  }
});
</script>


<!--Admin Course Search -->
<script>

$(document).ready(function(){
    $('#admin_course_search_form').submit(function(e){
        e.preventDefault();
        var search = $('#search_course').val();
      
            window.open('admin/courses_search/'+search+'','_self');
      
        

    }); 
    });

    $(document).ready(function(){
    $('#admin_billing_search_form').submit(function(e){
        e.preventDefault();
        var search = $('#search_billing').val();
      
            window.open('admin/billing_search/'+search+'','_self');
      
        

    }); 
    });


    $(document).ready(function(){
    $('#search_course_admin').click(function(){
       // e.preventDefault();
        var search = $('#search_course').val();
      
            window.open('admin/courses_search/'+search+'','_self');
      
        

    }); 
    });

    
    $(document).ready(function(){
    $('#search_billing_admin').click(function(){
       // e.preventDefault();
        var search = $('#search_billing').val();
      
            window.open('admin/billing_search/'+search+'','_self');
      
        

    }); 
    });
</script>



<!-- Admin Course  Search By Category-->
<script>

    $(document).ready(function(){
    $('#cat_search_admin').change(function(){
        var cat_id = $('#cat_search_admin').val();
      
            window.open('admin/courses_cat/'+cat_id+'','_self');
      
        

    }); 
    });
</script>


<!-- Admin Course  filter By Publish-->
<script>

    $(document).ready(function(){
    $('#publish_search').change(function(){
        var cat_id = $('#publish_search').val();
      
            window.open('admin/courses_pub/'+cat_id+'','_self');
      
        

    }); 
    });



    $(document).ready(function(){
    $('#billing_search').change(function(){
        var billing_id = $('#billing_search').val();
      
            window.open('admin/course_billing/'+billing_id+'','_self');
      
        

    }); 
    });




    $(document).ready(function(){
    $('#publish_search_billing').change(function(){
        var bil_id = $('#publish_search_billing').val();
      //alert(bil_id);
      if(bil_id == 'out')
      {

        window.open('admin/billing_outstanding/','_self');
      
      }
      
      
      if(bil_id == 'all')
      {
        window.open('admin/billing/','_self');
      
      }
      if(bil_id == 'full')
      {
        window.open('admin/billing_full/','_self');
      
      }
         
        

    }); 
    });
</script>








<!-- Admin Student  Search Course By Category-->
<script>

    $(document).ready(function(){
    $('#category_search').change(function(){
        var cat_id = $('#category_search').val();
      
            window.open('admin/student_search_cat/'+cat_id+'','_self');
      
        

    }); 
    });
</script>
<!-- Admin Student  Search Student By School-->
<script>

    $(document).ready(function(){
    $('#school_search').change(function(){
        var sch_id = $('#school_search').val();
      
            window.open('admin/student_school/'+sch_id+'','_self');
      
        

    }); 
    });
</script>



<!--Admin Student Search -->
<script>





$(document).ready(function(){
    $('#product_search_form').submit(function(e){
        e.preventDefault();
        var search = $('#product_search').val();
      
            window.open('admin/product_search/'+search+'','_self');
      
        

    }); 
    });


    $(document).ready(function(){
    $('#product_search').click(function(){
        e.preventDefault();
        var search = $('#product_search').val();
      
            window.open('admin/product_search/'+search+'','_self');
      
        

    }); 
    });









$(document).ready(function(){
    $('#blog_search_form').submit(function(e){
        e.preventDefault();
        var search = $('#blog_search').val();
      
            window.open('admin/blog_search/'+search+'','_self');
      
        

    }); 
    });


    $(document).ready(function(){
    $('#blog_search').click(function(){
        e.preventDefault();
        var search = $('#blog_search').val();
      
            window.open('admin/blog_search/'+search+'','_self');
      
        

    }); 
    });





    $(document).ready(function(){
    $('#student_search_form').submit(function(e){
        e.preventDefault();
        var search = $('#student_search').val();
      
            window.open('admin/student_search/'+search+'','_self');
      
        

    }); 
    });




    $(document).ready(function(){
    $('#schedule_search_form').submit(function(e){
        e.preventDefault();
        var search = $('#schedule_search').val();
      
            window.open('admin/search_schedule_list/'+search+'','_self');
      
        

    }); 
    });


    $(document).ready(function(){
    $('#search_btn').click(function(){
       // e.preventDefault();
        var search = $('#student_search').val();
      
            window.open('admin/student_search/'+search+'','_self');
      
        

    }); 
    });




    
    $(document).ready(function(){
    $('#search_btn_sch').click(function(){
       // e.preventDefault();
        var search = $('#schedule_search').val();
      
            window.open('admin/search_schedule_list/'+search+'','_self');
      
        

    }); 
    });
</script>








<!-- Student Search Course By Status-->
<script>

    $(document).ready(function(){
    $('#status').change(function(){
        var status = $('#status').val();
      
            window.open('admin/search_by_status/'+status+'','_self');
      
        

    }); 
    });
</script>


<!-- Student Search Course By Category-->
<script>




    
    $(document).ready(function(){
    $('#student_search_form').submit(function(e){
        e.preventDefault();
        var search = $('#student_search').val();
      
            window.open('admin/student_search/'+search+'','_self');
      
        

    }); 
    });


    $(document).ready(function(){
    $('#search_btn').click(function(){
       // e.preventDefault();
        var search = $('#student_search').val();
      
            window.open('admin/student_search/'+search+'','_self');
      
        

    }); 
    });

</script>






 <!-- Audio  Edit Question  -->
 <div class="modal fade" id="modal-edit_question">

        <div class="modal-dialog  modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">Edit Question</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST"   enctype="multipart/form-data">
          
            <div class="modal-body">
            <form method="post" action="admin/new_exam/" enctype="multipart/form-data">
            

            <div class="form-group col-12 " id="question_menu">
               </div>


            <div class="row" id="option_menu">
            
            
            
             <div class="form-group col-6">
                <label for="exampleInputEmail1">Correct Option</label>
                <input type="number" required class="form-control" name="correct"   id="correct_option"   placeholder="Correct Option ..">
            </div>
           </div>
           

       
                       
           
            </div>
           
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="update_set_question" value="Update Question" class="btn btn-outline-secondary btn-lg">
          
              </div>

           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



 <!-- Audio  Edit Question  -->
 <div class="modal fade" id="modal_message_id">

        <div class="modal-dialog  modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">Edit Question</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST"   enctype="multipart/form-data">
          
            <div class="modal-body">
            <form method="post" action="admin/new_exam/" enctype="multipart/form-data">
            

            <div class="form-group col-12 " id="question_menu">
               </div>


            <div class="row" id="option_menu">
            
            
            
             <div class="form-group col-6">
                <label for="exampleInputEmail1">Correct Option</label>
                <input type="number" required class="form-control" name="correct"   id="correct_option"   placeholder="Correct Option ..">
            </div>
           </div>
           

       
                       
           
            </div>
           
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="update_set_question" value="Update Question" class="btn btn-outline-secondary btn-lg">
          
              </div>

           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
