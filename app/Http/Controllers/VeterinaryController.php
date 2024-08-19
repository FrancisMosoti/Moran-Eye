<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeterinaryController extends Controller
{
    public function schedules()
    {
        return view('add-vac-schedule');
    }
}