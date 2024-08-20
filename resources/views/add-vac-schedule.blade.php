@extends('layouts.vet-app')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <!-- <div class="row">

    Earnings (Monthly) Card Example
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    Earnings (Monthly) Card Example
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    Earnings (Monthly) Card Example
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    Pending Requests Card Example
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-8 mx-auto ">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ADD Vaccination Schedule</h6>
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
                    <form class="user mx-3" action="{{route('add-cow')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Serial Code </label>
                            <input type="text" name="serial_code"
                                value="{{ old('serial_code') ? old('serial_code') : '' }}"
                                class="form-control form-control-user @error('serial_code') is-invalid @enderror"
                                id="serialCode" placeholder="Serial Code">
                            @error('serial_code')
                            <div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Vaccine Name</label>
                            <input type="text" name="vaccine" value="{{ old('vaccine') ? old('vaccine') : '' }}"
                                class="form-control form-control-user @error('vaccine') is-invalid @enderror" id="breed"
                                placeholder="Vaccine Name">
                            @error('vaccine')
                            <div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Date For Next Vaccine</label>
                            <input type="date" name="next_vaccine" value="{{ old('next_vaccine') ? old('next_vaccine') : '' }}"
                                class="form-control form-control-user @error('next_vaccine') is-invalid @enderror"
                                id="dateOfBirth" placeholder="Date of Birth">
                            @error('next_vaccine')<
                            div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Purpose(Dairy / Beef)</label>
                            <input type="text" name="purpose" value="{{ old('purpose') ? old('purpose') : '' }}"
                                class="form-control form-control-user @error('purpose') is-invalid @enderror"
                                id="purpose" placeholder="Purpose (e.g., Dairy, Beef)">
                            @error('purpose')
                            <div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <!-- <div class="mb-3">
                            <textarea name="vaccination_health_records"
                                class="form-control form-control-user @error('vaccination_health_records') is-invalid @enderror"
                                id="vaccinationHealthRecords"
                                placeholder="Vaccination and Health Records">{{ old('vaccination_health_records') ? old('vaccination_health_records') : '' }}</textarea>
                            @error('vaccination_health_records')
                            <div class="text-danger">{{ $message }}</div>@enderror
                        </div> -->
                        <div class="mb-3">
                            <label for=""> Select Gender</label>
                            <select name="gender"
                            {{-- form-control-user --}}
                                class="form-control  @error('gender') is-invalid @enderror"
                                id="gender">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
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
                        <button type="submit" class="btn btn-primary btn-user btn-block">Add Cow</button>
                    </form>
                </div>
            </div>


        </div>


    </div>

</div>
<script>
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 10000); // 3 seconds
</script>



@endsection