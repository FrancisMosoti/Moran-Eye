@extends('layouts.app')

@section('content')
<div class="container">
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
                    <td>{{ $symptom->cow_serial_code }}</td> <!-- Corrected to use $symptom -->
                    <td>{{ $symptom->symptoms }}</td>
                    <td><a href="#" class="btn btn-primary">Make Diagnosis</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
