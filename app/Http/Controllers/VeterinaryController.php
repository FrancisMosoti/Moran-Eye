<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\Vaccine;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

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
            'serial_code' => 'required|string|max:255',
            'disease' => 'required|string',
            'vaccine' => 'required|string',
            'next_vaccine' => 'required|date',
            // 'breed' => 'required|string|max:255',
            // 'dob' => 'required|date',
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
        $cow = Vaccine::create([
            'user_id' => $request->user()->id,
            'serial_code' => $validatedData['serial_code'],
            'disease' => $validatedData['disease'],
            'vaccine' => $validatedData['vaccine'],
            'next_vaccine' => $validatedData['next_vaccine'],
            'purpose' => $validatedData['purpose'],
            // 'vaccination_health_records' => $validatedData['vaccination_health_records'],
            'gender' => $validatedData['gender'],
            'image' => $imagePath,
            
        ]);

        // Generate the QR code
        $qrCode = $this->generateCowQRCode($cow);
        $path = 'uploads/qr-codes/' . $cow->serial_code;
        Storage::put('public/' . $path, $qrCode);

        // Save the QR code path to the cow record
        $cow->qr_code_path = $path;
        $cow->save();

        return redirect()->back()->with('success', 'Vaccination Scheduled Successfully');
    }

    public function generateCowQRCode($cow)
    {
        $data = [
            'disease' => $cow->disease,
            'next_vaccine' => $cow->next_vaccine,
            'serial_code' => $cow->serial_code,
            'breed' => $cow->breed,
            // 'date_of_birth' => $cow->date_of_birth,
            'purpose' => $cow->purpose,
            // 'vaccination_records' => $cow->vaccination_records,
            // 'health_records' => $cow->health_records,
            'gender' => $cow->gender,
            // 'picture_url' => $cow->picture_url,
        ];


        $qrCode = QrCode::size(300)
            ->generate(json_encode($data));

        return $qrCode; // SVG by default
    }
}