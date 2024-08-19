<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeterinaryController extends Controller
{
    public function schedules()
    {
        return view('add-vac-schedule');
    }


    public function addSchedule(Request $request): RedirectResponse
    {
        // Validation
        $validatedData = $request->validate([
            'disease' => 'required|string',
            'next_vaccine' => 'required|date',
            'serial_code' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'dob' => 'required|date',
            'purpose' => 'required|string|max:255',
            // 'vaccination_health_records' => 'nullable|string',
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
            // 'vaccination_health_records' => $validatedData['vaccination_health_records'],
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

    public function generateCowQRCode($cow)
    {
        $data = [
            'disease' => $cow->disease,
            'next_vaccine' => $cow->next_vaccine,
            'serial_code' => $cow->serial_code,
            'breed' => $cow->breed,
            'date_of_birth' => $cow->date_of_birth,
            'purpose' => $cow->purpose,
            'vaccination_records' => $cow->vaccination_records,
            'health_records' => $cow->health_records,
            'gender' => $cow->gender,
            // 'picture_url' => $cow->picture_url,
        ];


        $qrCode = QrCode::size(300)
            ->generate(json_encode($data));

        return $qrCode; // SVG by default
    }
}