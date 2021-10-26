// This calls the paystack form
function buy() {
    var owner_email = $('#owner_email').val();
    var tel = $('#tel').val();
    var quantity = $('#quantity').val();
    var owner = $('#owner').val();
    var amount = $('#amount').val();//setAmount();
    var referral = $('#referral').val();
    var address = $('#address').val();
    var product_id = $('#product_id').val();
    var url = $('#url').val();
    var success_url = $('#success_url').val();
    var state = $('#state').val();// add state
    var delivery_method = getDeliveryMethod();
    
    var amountInKobo = amount * 100;

    var handler = PaystackPop.setup({
        key: 'pk_live_b019e2ae8',
        email: owner_email,
        amount: amountInKobo,
        ref: ''+Math.floor((Math.random() * 1000000000) + 1),
        callback: function(response){
            confirmPayment(response.reference,product_id,quantity,amount,owner, owner_email, tel, address,referral,url,success_url,state,delivery_method);
        },
        onClose: function(){
            
        }
    });
    handler.openIframe();
}

//Do ajax post to the php url that will confirm the payment
function confirmPayment(ref, product_id,quantity,amount,owner, owner_email, tel, address,referral,url,success_url,state,delivery_method) {
    var data = {
        'ref': ref,
        'product_id': product_id,
        'quantity': quantity,
        'owner': owner,
        'owner_email': owner_email,
        'tel': tel,
        'address': address,
        'referral': referral,
        'url': url,
        'amount': amount,
        'state': state, 
        'delivery_method': delivery_method
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
               window.location.assign(success_url);    
            } else {
               alert('Operation Failed! An Error was encounterd while making your payment!');
            }
        }
    });
}
