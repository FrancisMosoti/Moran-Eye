<?php

namespace App\Services;

use GuzzleHttp\Client;

class DarajaService
{
    protected $client;
    protected $baseUri;
    protected $consumerKey;
    protected $consumerSecret;
    protected $shortcode;
    protected $passkey;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUri = 'https://api.safaricom.co.ke';
        $this->consumerKey = config('daraja.consumer_key');
        $this->consumerSecret = config('daraja.consumer_secret');
        $this->shortcode = config('daraja.shortcode');
        $this->passkey = config('daraja.passkey');
    }

    public function initiatePayment($amount, $phoneNumber)
    {
        $accessToken = $this->generateAccessToken();
        echo $accessToken;

        // Payment Request
        $paymentUrl = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $paymentUrl);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $accessToken));

        $curl_post_data = array(
            'BusinessShortCode' => $this->shortcode,
            'Password' => base64_encode($this->shortcode . $this->passkey . date('YmdHis')),
            'Timestamp' => date('YmdHis'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => '10', // Amount to be paid
            'PartyA' => '254712514102', // Customer phone number
            'PartyB' => $this->shortcode,
            'PhoneNumber' => '254712514102', // Customer phone number
            'CallBackURL' => 'https://sandbox.safaricom.co.ke/mpesa/',
            'AccountReference' => 'Test',
            'TransactionDesc' => 'Test Payment'
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $result = curl_exec($curl);
        curl_close($curl);

        echo $result;



    }

    protected function generateAccessToken()
    {
        // *** Authorization Request in PHP ***|

        $ch = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Basic ' . base64_encode(env('MPESA_CONSUMER_KEY') . ':' . env('MPESA_CONSUMER_SECRET'))
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
        $response = curl_exec($ch);
        if($response === false) {
            echo 'Curl error: ' . curl_error($ch);
        }
        else {
            $responseData = json_decode($response, true); // Decode JSON response as an associative array
            // dd($responseData);
            if (isset($responseData['access_token'])) {
                $accessToken = $responseData['access_token'];
                return $accessToken;
            } else {
                echo 'Error: Unable to retrieve access token.';
            }
        }
        curl_close($ch);
    }

    protected function generatePassword()
    {
        return base64_encode($this->shortcode.$this->passkey.now()->format('YmdHis'));
    }
}
