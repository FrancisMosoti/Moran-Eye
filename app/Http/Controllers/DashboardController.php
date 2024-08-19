<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Apartment;
use App\Models\User;
use App\Models\Rooms;
use Illuminate\Support\Facades\Auth;
use App\Models\Cow;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        return view('show-users');
    }

    public function viewApartment()
    {
        return view('add-apartment');
    }

    public function addApartment(Request $request): RedirectResponse
    {

        // validation
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'location' => ['required', 'string'],
            'rooms' => ['required', 'numeric'],
            'till' => ['required', 'numeric'],
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
    public function viewCow()
    {
        return view('add-cow');
    }
    public function addCow(Request $request): RedirectResponse
    {
        // Validation
        $validatedData = $request->validate([
            'serial_code' => 'required|string|max:255|unique:cows,serial_code',
            'breed' => 'required|string|max:255',
            'dob' => 'required|date',
            'purpose' => 'required|string|max:255',
            'vaccination_health_records' => 'nullable|string',
            'gender' => 'required|string|in:Male,Female',
            'cow_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $imagePath = '';
        if ($request->hasFile('cow_image')) {
            $imagePath = $request->file('cow_image')->store('uploads/cows', 'public');
        }

        // Create the cow record
        $cow = Cow::create([
            'serial_code' => $validatedData['serial_code'],
            'breed' => $validatedData['breed'],
            'dob' => $validatedData['dob'],
            'purpose' => $validatedData['purpose'],
            'vaccination_health_records' => $validatedData['vaccination_health_records'],
            'gender' => $validatedData['gender'],
            'image' => $imagePath,
            'user_id' => $request->user()->id,
        ]);

        // Generate the QR code
        $qrCode = $this->generateCowQRCode($cow);
        $path = 'uploads/qr-codes/' . $cow->serial_code;
        Storage::put('public/' . $path, $qrCode);

        // Save the QR code path to the cow record
        $cow->qr_code_path = $path;
        $cow->save();

        return redirect('/add-cow')->with('success', 'Cow Registered Successfully');
    }


    //show cows
    public function showcows()
    {
        $cows = Cow::all(); // Retrieve all cows from the database
        return view('show-cows', compact('cows')); // Pass the data to the view
    }


    //show qrcode

    public function show($serial_code)
    {
        $cow = Cow::where('serial_code', $serial_code)->firstOrFail();
        return view('cow.show', compact('cow'));
    }


    public function generateCowQRCode($cow)
    {
        $data = [
            'serial_code' => $cow->serial_code,
            'breed' => $cow->breed,
            'date_of_birth' => $cow->date_of_birth,
            'purpose' => $cow->purpose,
            'vaccination_records' => $cow->vaccination_records,
            'health_records' => $cow->health_records,
            'gender' => $cow->gender,
            'picture_url' => $cow->picture_url,
        ];


        $qrCode = QrCode::size(300)
            ->generate(json_encode($data));

        return $qrCode; // SVG by default
    }



    public function edit($id)
    {
        // Retrieve the cow by its ID
        $cow = Cow::find($id);

        // Check if the cow exists
        if (!$cow) {
            return redirect()->route('showCows')->with('error', 'Cow not found.');
        }

        // Pass the cow data to the edit-cow view
        return view('edit-cow', compact('cow'));
    }

    public function update(Request $request, $id)
    {
        // Retrieve the cow by its ID
        $cow = Cow::find($id);

        // Check if the cow exists
        if (!$cow) {
            return redirect()->route('cows.index')->with('error', 'Cow not found.');
        }

        // Validate the request data
        $request->validate([
            'serial_code' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'purpose' => 'required|string|max:255',
            // Add validation for more fields as needed
        ]);

        // Update the cow details
        $cow->serial_code = $request->input('serial_code');
        $cow->breed = $request->input('breed');
        $cow->date_of_birth = $request->input('date_of_birth');
        $cow->purpose = $request->input('purpose');
        // Update more fields as needed

        $cow->save();

        return redirect()->route('cows.index')->with('success', 'Cow details updated successfully.');
    }




    //delete cow
    public function destroy($id)
    {
        $cow = Cow::find($id);

        if ($cow) {
            $cow->delete();
            return redirect()->route('showCows')->with('success', 'Cow deleted successfully.');
        }

        return redirect()->route('showCows')->with('error', 'Cow not found.');
    }
    public function showUsers()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('show-users', compact('users'));
    }


    public function editUser($id)
    {
        // Retrieve the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return redirect()->route('showUsers')->with('error', 'User not found.');
        }

        // Check if the logged-in user is trying to edit their own role
        if (auth()->user()->id === $user->id && $user->role === 'admin') {
            return redirect()->route('showUsers')->with('error', 'You cannot edit your own role.');
        }

        // Pass the user data to the edit-user view
        return view('edit-user', compact('user'));
    }



    public function updateUser(Request $request, $id)
    {
        // Retrieve the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return redirect()->route('showUsers')->with('error', 'User not found.');
        }

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'role' => 'required|string|in:admin,veterinary,farmer,company_worker,user',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update the user details
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->email = $request->input('email');

        // Only update the password if it was provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('showUsers')->with('success', 'User details updated successfully.');
    }

    public function updateVaccination(Request $request, $id)
    {
        $request->validate([
            'vaccination_health_records' => 'required|string',
        ]);

        $cow = Cow::findOrFail($id);
        $cow->vaccination_health_records = $request->vaccination_health_records;
        $cow->save();

        return redirect()->route('show-cows')->with('success', 'Vaccination details updated successfully.');
    }

    public function customerDashboard()
    {
        return view('customerDashboard');
    }

    //SEARCH COWS
    public function search(Request $request)
    {
        $search = $request->input('search');
        $breed = $request->input('breed');
        $purpose = $request->input('purpose');
    
        // Build the query
        $query = Cow::query();
    
        if ($search) {
            $query->where('serial_code', 'LIKE', "%{$search}%");
        }
    
        if ($breed && $breed !== 'all') {
            $query->where('breed', $breed);
        }
    
        if ($purpose && $purpose !== 'all') {
            $query->where('purpose', $purpose);
        }
    
        // Get the filtered results
        $cows = $query->get();
    
        // Fetch the lists for filters
        $breeds = Cow::select('breed')->distinct()->get()->pluck('breed');
        $purpose = Cow::select('purpose')->distinct()->get()->pluck('purpose');
    
        return view('show-cows', compact('cows', 'breeds', 'purpose'));
    }
    

}