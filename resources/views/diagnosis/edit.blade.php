@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Diagnosis for Cow Serial Code: {{ $diagnosis->cow_serial_code }}</h2>
    
    <form action="{{ route('diagnosis.update', $diagnosis->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <textarea id="diagnosis" name="diagnosis" class="form-control" required>{{ $diagnosis->diagnosis }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="medication">Prescribed Medication</label>
            <textarea id="medication" name="medication" class="form-control" required>{{ $diagnosis->medication }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Update Diagnosis</button>
    </form>
</div>
@endsection
