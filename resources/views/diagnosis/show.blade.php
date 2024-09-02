@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Diagnosis for Cow Serial Code: {{ $diagnosis->cow_serial_code }}</h2>
    
    <div class="form-group">
        <label for="diagnosis">Diagnosis</label>
        <textarea id="diagnosis" class="form-control" disabled>{{ $diagnosis->diagnosis }}</textarea>
    </div>
    
    <div class="form-group">
        <label for="medication">Prescribed Medication</label>
        <textarea id="medication" class="form-control" disabled>{{ $diagnosis->medication }}</textarea>
    </div>
    
    <a href="{{ route('diagnosis.edit', $diagnosis->id) }}" class="btn btn-primary">Edit Diagnosis</a>
</div>
@endsection
