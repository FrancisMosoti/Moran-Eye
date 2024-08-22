@extends('layouts.app')

@section('content')
    <h1>Diagnosis for Cow: {{ $cow->serial_code }}</h1>

    <h3>Symptoms:</h3>
    <ul>
        @foreach($symptoms as $symptom)
            <li>{{ $symptom->description }}</li>
        @endforeach
    </ul>

    <h3>Enter Diagnosis and Medication:</h3>
    <form action="{{ route('cow.diagnosis', ['serial_code' => $cow->serial_code]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <input type="text" name="diagnosis" id="diagnosis" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="medication">Medication</label>
            <input type="text" name="medication" id="medication" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
