<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cow; // Correct way to use the Cow model
use App\Models\Symptom; // Correct way to use the Symptom model
use App\Models\Diagnosis; // Correct way to use the Diagnosis model

class DiseasesController extends Controller
{
    

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
    
        // Save the disease and symptoms to the database
        $symptom = new Symptom();
        $symptom->cow_serial_code = $validatedData['serial_code'];
        $symptom->symptoms = $validatedData['symptoms'];
        $symptom->save();
    
        return redirect()->back()->with('success', 'Symptoms recorded successfully awaiting veterinary diagnosis!');
    }
    
   
    public function diagnosis($cow_serial_code)
    {
        // Get the cow based on the serial code
        $cow = Cow::where('cow_serial_code', $cow_serial_code)->firstOrFail();

        // Get the symptoms associated with this cow
        $symptoms = Symptom::where('cow_serial_code', $cow_serial_code)->get();

        // Return the view with cow and symptoms
        return view('diagnosis', ['cow' => $cow, 'symptoms' => $symptoms]);
    }
    public function showSymptoms() {
        // Get all cows that have recorded symptoms
        $symptoms = symptom::all();
    
        // Return the view with cows
        return view('show-symptoms', ['symptoms' => $symptoms]);
    }
    
    
    
    
    

       public function create($id)
    {
        // Retrieve the symptom and cow details using the ID
        $symptoms = Symptom::findOrFail($id);
        return view('diagnosis.create', compact('symptoms'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'cow_serial_code' => 'required|string',
            'diagnosis' => 'required|string',
            'medication' => 'required|string',
        ]);

        // Store the diagnosis in the database
        Diagnosis::create([
            'cow_serial_code' => $request->input('cow_serial_code'),
            'diagnosis' => $request->input('diagnosis'),
            'medication' => $request->input('medication'),
        ]);

        // Redirect back with a success message
        return redirect()->route('show-symptoms')->with('success', 'Diagnosis recorded successfully.');
    }

    public function view(){
        $diagnoses = Diagnosis::all();
        return view('diagnosis.view', compact('diagnoses'));
    }

    public function show($id)
    {
        // Retrieve the diagnosis by ID
        $diagnosis = Diagnosis::findOrFail($id);
        return view('diagnosis.show', compact('diagnosis'));
    }

    public function edit($id)
    {
        // Retrieve the diagnosis by ID for editing
        $diagnosis = Diagnosis::findOrFail($id);
        return view('diagnosis.edit', compact('diagnosis'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'diagnosis' => 'required|string',
            'medication' => 'required|string',
        ]);

        // Find the diagnosis and update it
        $diagnosis = Diagnosis::findOrFail($id);
        $diagnosis->update([
            'diagnosis' => $request->input('diagnosis'),
            'medication' => $request->input('medication'),
        ]);

        // Redirect to the diagnosis view page with a success message
        return redirect()->route('diagnosis.show', $id)->with('success', 'Diagnosis updated successfully.');
    }
}
