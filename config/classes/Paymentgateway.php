<?php

class Paymentgateway {

    public function ConfirmPaystackPayment($ExpectedAmountInNaira,$ReferenceNo,$PrivateKey){
        $result = array();
        //The parameter after verify/ is the transaction reference to be verified
        $url = 'https://api.paystack.co/transaction/verify/'.$ReferenceNo;
        $authorization = 'Authorization: Bearer ' . $PrivateKey;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, [
                    $authorization
                ]
        );
        $request = curl_exec($ch);
        curl_close($ch);

        if ($request) {
            $result = json_decode($request, true);
        }
       // $ExpectedAmount = $ExpectedAmountInNaira * 100;
        if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success') ) {
            
            if ( $result['data']['amount'] >= $ExpectedAmountInNaira  && $ExpectedAmountInNaira>0) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

}

