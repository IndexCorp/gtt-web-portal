  /* 

// This calls the paystack form
function buy() {
    var email = '<?=$email?>';
    
    var amount = $('#amount').val();
    var course_id = $('#course_id').val();
   
    
   // var amountInKobo = amount * 100;

    var handler = PaystackPop.setup({
        key: 'pk_live_fc4ea9275855c558136c924bcd3813830404b851',
        email: email,
        currency: 'USD',
        amount: amount,
        ref: 'GTT'+Math.floor((Math.random() * 1000000000) + 1),
        callback: function(response){
            confirmPayment(response.reference,course_id,amount, email);
        },
        onClose: function(){
            window.location('https://globaltradetutor.com/student/subscribe/'+course_id);
        }
    });
    handler.openIframe();
}

//Do ajax post to the php url that will confirm the payment
function confirmPayment(ref, course_id,amount) {
    var student_id = "<?=$std_id?>";
   
    var data = {
        'ref': ref,
        'url': 'https://globaltradetutor.com/student/includes/payment.php',
        'course_id': course_id,
        'amount': amount,
         'student_id': student_id,
       
       
    };
    dataS = JSON.stringify(data);
    $.ajax({
        method: "POST",
        url: url,
        data: dataS,
        error: function(xhr,status,error){
            alert("An Error ocurred! Check Internet Connection.");
        },
        success: function(result, status, xhr) {
            jsonResult = JSON.parse(result);
            if (jsonResult.result.success) {
               alert('Your payment was made Successfully!');
               window.location('https://globaltradetutor.com/student/billing/');   
            } else {
               alert('Operation Failed! An Error was encounterd while making your payment!');
            }
        }
    });
}



  $(document).ready(function(){
  // event.preventDefault();
     

      var id = 12;
        var rating = 4;
        var comment = 'Yellow';
        alert('how far');

       $.ajax({

            url:"http://localhost/gtt/student_portal/includes/processing.php",
            method:"POST",
            data:{std_id:id, rating:rating, comment:comment},
            dataType:"json",


        
          })
            .done(function(data) {
                alert( "second success" );
                if(data){

                    alert(data.result);

                }else{
                    alert('failed');
                }
                    
            })
            .fail(function(errorData) {
                alert( errorData );
            })
            .always(function(alwaysData) {
                alert( alwaysData );
            });
 

   });



   $(document).ready(function(){
    $('#submit_rating').submit(function(event){
      event.preventDefault();
     
     var star1 =  $('#star1').val();
     var star2 =  $('#star2').val();
     var star3 =  $('#star3').val();
     var star4 =  $('#star4').val();
     var star5 =  $('#star5').val();
  //alert(star5);

     var comment =  $('#comments').val();

     if(star1 != 0) {
     var rating = star1;

     }else if(star2 != 0){
     var rating = star2;

     }else if(star3 != 0){

     var rating = star3;

     }else if(star4 != 0){

     var rating = star4;

     }else if(star5 != 0){

     var rating = star5;
      }
      var id = "<?=@$_SESSION['login_id'];?>";
     // alert(id);

     
     $.ajax({

          url:"http://localhost/gtt/student_portal/includes/processing.php",
          method:"POST",
          data:{std_id:id, rating:rating, comment:comment},
          dataType:"json",



          })
          .done(function(data) {
              alert( "second success" );
              if(data){

                  alert(data.result);

              }else{
                  alert('failed');
              }
                  
          })
          .fail(function(errorData) {
              alert( errorData );
          })
          .always(function(alwaysData) {
              alert( alwaysData );
          });


    });

   });
   */