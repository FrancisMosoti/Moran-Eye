@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-8 mx-auto ">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">EDIT COW</h6>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form class="user mx-3" action="{{ route('update-cow', ['id' => $cow->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <input type="text" name="serial_code"
                                value="{{ old('serial_code', $cow->serial_code) }}"
                                class="form-control form-control-user @error('serial_code') is-invalid @enderror"
                                id="serialCode" placeholder="Serial Code">
                            @error('serial_code')
                            <div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" name="breed" value="{{ old('breed', $cow->breed) }}"
                                class="form-control form-control-user @error('breed') is-invalid @enderror" id="breed"
                                placeholder="Breed">
                            @error('breed')
                            <div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <input type="date" name="dob" value="{{ old('dob', $cow->date_of_birth) }}"
                                class="form-control form-control-user @error('dob') is-invalid @enderror"
                                id="dateOfBirth" placeholder="Date of Birth">
                            @error('dob')
                            <div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" name="purpose" value="{{ old('purpose', $cow->purpose) }}"
                                class="form-control form-control-user @error('purpose') is-invalid @enderror"
                                id="purpose" placeholder="Purpose (e.g., Dairy, Beef)">
                            @error('purpose')
                            <div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <textarea name="vaccination_health_records"
                                class="form-control form-control-user @error('vaccination_health_records') is-invalid @enderror"
                                id="vaccinationHealthRecords"
                                placeholder="Vaccination and Health Records">{{ old('vaccination_health_records', $cow->vaccination_health_records) }}</textarea>
                            @error('vaccination_health_records')
                            <div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <select name="gender"
                                class="form-control form-control-user @error('gender') is-invalid @enderror"
                                id="gender">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender', $cow->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $cow->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                            <div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <input type="file" name="cow_image"
                                class="form-control form-control-user @error('cow_image') is-invalid @enderror"
                                id="cowImage">
                            @error('cow_image')
                            <div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">Update Cow</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 10000); // 10 seconds
</script>
@endsection
