<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Rooms;

class HomeController extends Controller
{
    //
    public function index(){
        // dd(Apartment::with('rooms'));
        return view('welcome');
    }

    public function show($id){
        $apartment = Apartment::with('Ap_Rooms')->findOrFail($id);
        // dd($apartment);
        return view('show-apartment',['apartment' => $apartment]);
    }

    public function book($id){
        $room = Rooms::findOrFail($id);
        // dd($room);
        return view('book-room',['room' => $room]);
    }
}