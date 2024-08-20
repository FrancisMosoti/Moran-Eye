@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Log Daily Work</h2>
    <form action="{{ route('worklogs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="log_date" class="form-label">Date</label>
            <input type="date" class="form-control" id="log_date" name="log_date" required>
        </div>
        <div class="mb-3">
            <label for="work_description" class="form-label">Work Description</label>
            <textarea class="form-control" id="work_description" name="work_description" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
