<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cow; // Correct way to use the Cow model
use App\Models\Symptom; // Correct way to use the Symptom model
use App\Models\Diagnosis; // Correct way to use the Diagnosis model

class DiseasesController extends Controller
{
    public function addDisease()
    {
        return view('add-disease');
    }

    public function showForm()
    {
        // Fetch all cows from the database
        $cows = Cow::all();

        // Pass the cows to the view
        return view('add-disease', ['cows' => $cows]);
    }

    public function submitForm(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'serial_code' => 'required|exists:cows,serial_code',
            'symptoms' => 'required|string',
        ]);

        // Here you would save the disease and symptoms to the database

        return redirect()->back()->with('success', 'Disease added successfully!');
    }

    public function viewSymptoms($serial_code)
    {
        // Get the cow based on the serial code
        $cow = Cow::where('serial_code', $serial_code)->firstOrFail();

        // Get the symptoms associated with this cow
        $symptoms = Symptom::where('serial_code', $serial_code)->get();

        // Return the view with cow and symptoms
        return view('diagnosis', ['cow' => $cow, 'symptoms' => $symptoms]);
    }

    public function submitDiagnosis(Request $request, $serial_code)
    {
        // Validate the input
        $validatedData = $request->validate([
            'diagnosis' => 'required|string',
            'medication' => 'required|string',
        ]);

        // Store the diagnosis and medication
        $diagnosis = new Diagnosis();
        $diagnosis->serial_code = $serial_code;
        $diagnosis->diagnosis = $validatedData['diagnosis'];
        $diagnosis->medication = $validatedData['medication'];
        $diagnosis->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Diagnosis and medication added successfully!');
    }
}
