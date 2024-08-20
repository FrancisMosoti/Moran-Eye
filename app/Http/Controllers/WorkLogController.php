<?php
namespace App\Http\Controllers;

use App\Models\WorkLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkLogController extends Controller
{
    // Show the form to log daily work
    public function create()
    {
        return view('worklogs.create');
    }

    // Store the daily work log
    public function store(Request $request)
    {
        $request->validate([
            'work_description' => 'required|string',
            'log_date' => 'required|date',
        ]);

        WorkLog::create([
            'worker_id' => Auth::id(),
            'work_description' => $request->work_description,
            'log_date' => $request->log_date,
        ]);

        return redirect()->route('worklogs.index')->with('success', 'Work log added successfully');
    }

    // Display the logs
    public function index()
    {
        $logs = WorkLog::where('worker_id', Auth::id())->orderBy('log_date', 'desc')->get();
        return view('worklogs.index', compact('logs'));
    }
}
