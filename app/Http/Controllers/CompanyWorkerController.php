<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyWorkerController extends Controller
{
    //
    public function companyWorker(){
        return view('company_worker');
    }
    // app/Http/Controllers/CompanyWorkerController.php

public function storeDataEntry(Request $request)
{
    // Validate the form data
    $request->validate([
        'date_time' => 'required|date',
        'task_description' => 'required|string|max:255',
        'animal_id' => 'required|exists:animals,id',
        'quantity' => 'required|string|max:100',
        'worker_notes' => 'nullable|string|max:500',
    ]);

    // Save the data to the database
    DataEntry::create([
        'date_time' => $request->input('date_time'),
        'task_description' => $request->input('task_description'),
        'animal_id' => $request->input('animal_id'),
        'quantity' => $request->input('quantity'),
        'worker_notes' => $request->input('worker_notes'),
        'worker_id' => auth()->id(), // Assuming the worker is logged in
    ]);

    // Redirect or return a response
    return redirect()->back()->with('success', 'Data entry submitted successfully!');
}

    
}
