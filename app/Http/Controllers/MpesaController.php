<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MpesaController extends Controller
{
    public function initiateStkPush(Request $request)
    {
        $phone_number = $request->phone_number;
        $amount = $request->amount;

        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $timestamp = date('YmdHis');
        $shortcode = '174379';
        $passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $consumer_key = 'mifOL8A43PFZ55GZ2QmfN2X0t6xCBE1kGQeLzqxnAtEwTWst';
        $consumer_secret = 'UGo6ke7gjwuP2Qqfc276hzKYXbzTfLa3YsZrtRJJmJMhXXaGSt8IzUVKdEoZumwW';

        $password = base64_encode($shortcode.$passkey.$timestamp);
        // dd($this->generateAccessToken($consumer_key, $consumer_secret));

        $headers = [
            'Authorization' => 'Bearer ' . $this->generateAccessToken($consumer_key, $consumer_secret),
            'Content-Type' => 'application/json',
        ];

        $body = [
            'BusinessShortCode' => $shortcode,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phone_number,
            'PartyB' => $shortcode,
            'PhoneNumber' => $phone_number,
            'CallBackURL' => 'YOUR_CALLBACK_URL',
            'AccountReference' => 'YOUR_ACCOUNT_REFERENCE',
            'TransactionDesc' => 'Payment for goods and services',
        ];

        $client = new Client();
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $body,
        ]);

        dd($response);


        return $response->getBody()->getContents();
    }

    private function generateAccessToken($consumer_key, $consumer_secret)
    {
        $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $client = new Client();
        $response = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Basic ' . $credentials,
                'Content-Type' => 'application/json',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents());

        return $data->access_token;
    }
}
