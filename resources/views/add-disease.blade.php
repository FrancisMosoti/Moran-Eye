@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Disease Symptoms</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('/add-disease') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="serial_code">Select Cow Serial Code:</label>
            <select id="serial_code" name="serial_code" class="form-control" required>
                <option value="" disabled selected>Select a cow</option>
                @foreach($cows as $cow)
                    <option value="{{ $cow->serial_code }}">{{ $cow->serial_code }} - {{ $cow->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="symptoms">Symptoms:</label>
            <textarea id="symptoms" name="symptoms" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
