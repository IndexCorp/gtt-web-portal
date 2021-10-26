
<!--Star Rating  -->
<script>

$('#star1').click(function(){
    event.preventDefault();
   // alert('hi');
    $('#star1').addClass('rating-link active');
    $('#star2').val(0);
   $('#star1').val(1);
   $('#star3').val(0);
   $('#star4').val(0);
   $('#star5').val(0);
    

    $('#star2').removeClass('rating-link active');
    $('#star3').removeClass('rating-link active');
   $('#star4').removeClass('rating-link active');
   $('#star5').removeClass('rating-link active');
    
});



$('#star2').click(function(){
    event.preventDefault();
   // alert('hi');
   $('#star1').addClass('rating-link active');
   $('#star2').addClass('rating-link active');

   $('#star2').val(2);
   $('#star1').val(0);
   $('#star3').val(0);
   $('#star4').val(0);
   $('#star5').val(0);

  
   $('#star3').removeClass('rating-link active');
   $('#star4').removeClass('rating-link active');
   $('#star5').removeClass('rating-link active');
    

    
});




$('#star3').click(function(){
    event.preventDefault();
   // alert('hi');
   $('#star1').addClass('rating-link active');
   $('#star2').addClass('rating-link active');
   $('#star3').addClass('rating-link active');
   $('#star2').val(0);
   $('#star1').val(0);
   $('#star3').val(3);
   $('#star4').val(0);
   $('#star5').val(0);

   $('#star4').removeClass('rating-link active');
   $('#star5').removeClass('rating-link active');
    

    
});




$('#star4').click(function(){
    event.preventDefault();
   // alert('hi');
   $('#star1').addClass('rating-link active');
   $('#star2').addClass('rating-link active');
   $('#star3').addClass('rating-link active');
   $('#star4').addClass('rating-link active');
   $('#star2').val(0);
   $('#star1').val();
   $('#star3').val(0);
   $('#star4').val(4);
   $('#star5').val(0);

   $('#star5').removeClass('rating-link active');
    

    
});




$('#star5').click(function(){
    event.preventDefault();
   // alert('hi');
   $('#star1').addClass('rating-link active');
   $('#star2').addClass('rating-link active');
   $('#star3').addClass('rating-link active');
   $('#star4').addClass('rating-link active');
   $('#star5').addClass('rating-link active');
   $('#star2').val(0);
   $('#star1').val(0);
   $('#star3').val(0);
   $('#star4').val(0);
   $('#star5').val(5);

    
});
</script>

<!--Confirmation for course content Deletion -->
<script>

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



<!-- Student General Search Course By Category-->
<script>

    $(document).ready(function(){
    $('#student_category_search').change(function(){
        var cat_id = $('#student_category_search').val();
      
            window.open('student/search_by_cat/'+cat_id+'','_self');
      
        

    }); 
    });
</script>


<!-- Student Search Course By Status-->
<script>

    $(document).ready(function(){
    $('#status').change(function(){
        var status = $('#status').val();
      
            window.open('student/search_by_status/'+status+'','_self');
      
        

    }); 
    });
</script>

<!-- Student General Search Course -->
<script>

    $(document).ready(function(){
    $('#student_general_search_form').submit(function(e){
        e.preventDefault();
        var search = $('#student_general_search').val();
      
            window.open('student/search_course/'+search+'','_self');
      
        

    }); 
    });


    $(document).ready(function(){
    $('#search_g_btn').click(function(){
       // e.preventDefault();
        var search = $('#student_general_search').val();
      
            window.open('student/search_course/'+search+'','_self');
      
        

    }); 
    });
</script>


<!-- Student Search Course By Category-->
<script>



$(document).ready(function(){
    $('#student_category').change(function(){
        var cat_id = $('#student_category').val();
      
            window.open('student/search_by_cat-stu/'+cat_id+'','_self');
      
        

    }); 
    });



    
    $(document).ready(function(){
    $('#student_search_form').submit(function(e){
        e.preventDefault();
        var search = $('#student_search').val();
      
            window.open('student/search_courses-stu/'+search+'','_self');
      
        

    }); 
    });


    $(document).ready(function(){
    $('#search_btn').click(function(){
       // e.preventDefault();
        var search = $('#student_search').val();
      
            window.open('student/search_courses-stu/'+search+'','_self');
      
        

    }); 
    });

</script>

<?php 

    if(isset($_POST['learning_content'])){
        $id = $_POST['learning_content'];
        $cont = $getFromCourse->get_single('course_content', $id);

        $varia = '  <div class="modal-dialog">
        <div class="modal-content" id="modals_content">
        <div class="modal-header">
        
           <h6 class="modal-title" id="header_title">'.$cont->title.'</h6>
           
         </div>
        
         <div class="modal-body">
         <video width="100%" height="100%" controls>
           <source src="'.$cont->link.'" type="video/mp4">
        </video>
        <!--<iframe width="100%" height="100%" src="https://www.youtube.com/embed/y43IwWMjRY0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
           -->
        
           </div>
       
    

         

      
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
        ';

        if($cont){
            $outputs = array(
                'success'	=>	true,    
               
                'varia' => $varia,
               
               
            );
        }

        echo json_encode($outputs);

      


    }




?>