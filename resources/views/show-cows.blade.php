@extends('layouts.app')

@section('content')
    <!-- Search and Filter Form -->
    <div class="container mt-4">
        <form action="{{ route('search-cows') }}" method="GET">
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by serial code" aria-label="Search" value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="breed" class="form-select">
                        <option value="">Select Breed</option>
                        <option value="all" {{ request('breed') == 'all' ? 'selected' : '' }}>All Breeds</option>
                        @foreach($breeds as $breed)
                            <option value="{{ $breed }}" {{ request('breed') == $breed ? 'selected' : '' }}>{{ $breed }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="purpose" class="form-select">
                        <option value="">Select Purpose</option>
                        <option value="all" {{ request('purpose') == 'all' ? 'selected' : '' }}>All purpose</option>
                        @foreach($purpose as $purpose)
                            <option value="{{ $purpose }}" {{ request('purpose') == $purpose ? 'selected' : '' }}>{{ $purpose }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-secondary w-100" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Display Results -->
    @if($cows->isEmpty())
        <h1 class="text-center bg-info mt-5 mx-auto p-3" style="width: 15rem;">No Records found!</h1>
    @else
        <div class="table-responsive mx-3">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Serial Code</th>
                        <th scope="col">Breed</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Vaccination & Health Records</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Image</th>
                        <th scope="col">QR Code</th>
                        @if(Auth::user()->role === 'admin')
                        <th scope="col">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($cows as $cow)
                        <tr>
                            <td>{{ $cow->serial_code }}</td>
                            <td>{{ $cow->breed }}</td>
                            <td>{{ $cow->dob }}</td>
                            <td>{{ $cow->purpose }}</td>
                            <td>{{ $cow->vaccination_health_records }}</td>
                            <td>{{ $cow->gender }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$cow->image) }}" class="img-thumbnail" style="width: 100px;" alt="Cow Image">
                            </td>
                            <td>
                                @if($cow->qr_code_path)
                                <embed src="{{ asset("storage/". $cow->qr_code_path) }}" width="300" height="300" type="image/svg+xml">
                                @else
                                    <span class="text-muted">No QR Code</span>
                                @endif
                            </td>
                            @if(Auth::user()->role === 'admin')
                            <td>
                                    <a href="{{ route('edit-cow', ['id' => $cow->id]) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('delete-cow', ['id' => $cow->id]) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this cow?')">Delete</button>
                                    </form>
                                </td>
                                @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
