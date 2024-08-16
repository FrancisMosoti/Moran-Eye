<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Apartment;
use App\Models\User;
use App\Models\Rooms;
use Illuminate\Support\Facades\Auth;
use App\Models\Cow;


class DashboardController extends Controller
{
    //
    public function dashboard(){
        return view('dashboard',['apartments' => Apartment::where('user_id' , Auth::User()->id)->get()]);
    }

    public function viewApartment(){
        return view('add-apartment');
    }

    public function addApartment(Request $request):RedirectResponse
    {

        // validation
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'location' => ['required','string'],
            'rooms' => ['required','numeric'],
            'till' => ['required','numeric'],
        ]);

        Apartment::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'rooms' => $request->input('rooms'),
            'Till_Number' => $request->input('till'),
            'user_id' => $request->User()->id
        ]);

        // Notification::route('slack', config('notification.register'))->notify(new RegisterSuccess());

        return redirect('/add-apartment')->with('success', 'Apartment Registered Successfully');

    } 

    //add cows
    public function viewCow(){
        return view('add-cow');
    }

    public function addCow(Request $request): RedirectResponse
    {
        // Validation
        $request->validate([
            'serial_code' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'dob' => 'required|date',
            'purpose' => 'required|string|max:255',
            'vaccination_health_records' => 'nullable|string',
            'gender' => 'required|string|in:Male,Female',
            'cow_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = '';
        if($request->hasFile('cow_image')){
            $imagePath = $request->file('cow_image')->store('uploads/cows', 'public');
        }

        Cow::create([
            'serial_code' => $request->input('serial_code'),
            'breed' => $request->input('breed'),
            'dob' => $request->input('dob'),
            'purpose' => $request->input('purpose'),
            'vaccination_health_records' => $request->input('vaccination_health_records'),
            'gender' => $request->input('gender'),
            'image' => $imagePath,
            'user_id' => $request->User()->id,
        ]);

        return redirect('/add-cow')->with('success', 'Cow Registered Successfully');
    }

    //show cows
    public function showcows()
    {
        $cows = Cow::all(); // Retrieve all cows from the database
        return view('show-cows', compact('cows')); // Pass the data to the view
    }


    // room details
    public function viewRoom(Request $request)
    {
        $user=  Auth::User()->id;
        $room = Apartment::where('user_id', $user)->first();
        // dd($room);
        return view('add-room-details',['rooms' => $room->rooms]);
        
    }
    public function addRoom(Request $request){

        // $user=  $request->User()->id;
        $room = Apartment::where('user_id' , Auth::User()->id)->first()->get();
        $apartment_id = $room[0]->id;
        // validation
        $request->validate([
            'room' => 'required|string',
            'price' => 'required|numeric|min:3',
            'pic1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pic2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pic3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pic4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath1 = $imagePath2 =  $imagePath3 = $imagePath4 = '';
        if($request->hasFile('pic1')){

            $imagePath1 = $request->file('pic1')->store('uploads', 'public');
        }

        if($request->hasFile('pic2')){

            $imagePath2 = $request->file('pic2')->store('uploads', 'public');
        }

        if($request->hasFile('pic3')){

            $imagePath3 = $request->file('pic3')->store('uploads', 'public');
        }

        if($request->hasFile('pic4')){

            $imagePath4 = $request->file('pic4')->store('uploads', 'public');
        }

        Rooms::create([
            'room_no' => $request->input('room'),
            'user_id' => $request->User()->id,
            'apartment_id' => $apartment_id,
            'price' => $request->input('price'),
            'pic_1' =>  $imagePath1,
            'pic_2' =>  $imagePath2,
            'pic_3' =>  $imagePath3,
            'pic_4' =>  $imagePath4,
        ]);

        // Notification::route('slack', config('notification.register'))->notify(new RegisterSuccess());

        return redirect('/add-room-details')->with('success', 'Room Details added Successfully');

    }

    // show room details
    public function showDetails(){
        return view('show-room-details',['rooms' => Rooms::all()]);
    }

}
