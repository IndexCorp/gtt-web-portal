
$(document).ready(function(){
    $('#modal-learning').on('show.bs.modal',setFirst(e));
  });

  function setFirst(e){
    var learning_content = $(e.relatedTarget).data('id');
    alert(learning_content);
    setVideoSource(learning_content);
 


}

function setVideoSource(src){
        $('#video_src').val(src);
      }


      
$(document).ready(function(){
    $('#rate_this_courses').click(function(){
      var learning_content = $('#rate_this_courses').val();
      
      $.ajax({
            method : 'POST',
            url : 'processing.php',
            data : dataS,
            error: function(xhr,status,error){
              alert("An Error Occured!");
            },
           // dataType : "json",
                success:function(results, status, xhr){
                  jsonResult = JSON.parse(results);
                  if(jsonResult.results.success){
                    alert('successful');
                  }else{
                    alert('Failed');
                  }
                 
                    //$('#modal-learning').html(data.varia);
                   //   console.log(data.result);
                            
                                        
                  }
          })
     
  
    });
  });