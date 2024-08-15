<?php

namespace App\Http\Controllers;

use App\Services\DarajaService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $darajaService;

    public function __construct(DarajaService $darajaService)
    {
        $this->darajaService = $darajaService;
    }

    public function initiatePayment(Request $request)
    {
        $amount = $request->input('amount');
        $phoneNumber = $request->input('phone_number');
        $response = $this->darajaService->initiatePayment($amount, $phoneNumber);

        // Handle response from Daraja API
        dd($response);
    }
}

