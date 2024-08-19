@extends('layouts.app3')

@section('content')
    <div class="container">
        <h2>Update Vaccination Details for Cow: {{ $cow->serial_code }}</h2>

        <form action="{{ route('update-vaccination', ['id' => $cow->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="vaccination_health_records" class="form-label">Vaccination Health Records</label>
                <textarea 
                    class="form-control" 
                    id="vaccination_health_records" 
                    name="vaccination_health_records" 
                    rows="5" 
                    required>{{ old('vaccination_health_records', $cow->vaccination_health_records) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Vaccination Details</button>
        </form>
    </div>
@endsection
