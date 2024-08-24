@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Show Symptoms for Cow: {{ $cow->cow_serial_code }}</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cow Serial Code</th>
                <th>Symptoms</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($symptoms as $symptom)
                <tr>
                    <td>{{ $cow->cow_serial_code }}</td> <!-- Use $cow->cow_serial_code here -->
                    <td>{{ $symptom->symptoms }}</td>
                    <td><a href="{{ route('diagnosis.create', ['id' => $symptom->id]) }}" class="btn btn-primary">Make Diagnosis</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
