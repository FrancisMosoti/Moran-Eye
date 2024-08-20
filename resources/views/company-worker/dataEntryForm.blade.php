<!-- resources/views/companyWorker/dataEntryForm.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Entry Form for On-Site Data Collection</h2>

    <form action="{{ route('companyWorker.storeDataEntry') }}" method="POST">
        @csrf

        <!-- Date and Time -->
        <div class="form-group">
            <label for="date_time">Date and Time</label>
            <input type="datetime-local" id="date_time" name="date_time" class="form-control" required>
        </div>

        <!-- Task Description -->
        <div class="form-group">
            <label for="task_description">Task Description</label>
            <textarea id="task_description" name="task_description" class="form-control" required></textarea>
        </div>

        <!-- Animal Identification -->
        <div class="form-group">
            <label for="animal_id">Animal Identification</label>
            <select id="animal_id" name="animal_id" class="form-control" required>
                <!-- Assuming you have a list of animals -->
                @foreach($animals as $animal)
                    <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Quantity/Measurements -->
        <div class="form-group">
            <label for="quantity">Quantity/Measurements</label>
            <input type="text" id="quantity" name="quantity" class="form-control" required>
        </div>

        <!-- Worker Notes -->
        <div class="form-group">
            <label for="worker_notes">Worker Notes</label>
            <textarea id="worker_notes" name="worker_notes" class="form-control"></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
