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
                <h6 class="m-0 font-weight-bold text-primary">ADD APARTMENT</h6>
            </div>
            <div class="card-body">
            <form class="user mx-3" action="{{route('add-apartment')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <input type="text" name="name" value="{{ old('name')?old('name'):'' }}"  class="form-control form-control-user  @error('name') is-invalid @enderror" id="exampleFirstName"
                            placeholder="Apartment Name">
                            @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" name="location" value="{{ old('location')?old('location'):'' }}" class="form-control form-control-user  @error('location') is-invalid @enderror" id="exampleLastName"
                            placeholder="Apartment location">
                            @error('location')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <input type="number" name="rooms" value="{{ old('rooms')?old('rooms'):'' }}" class="form-control form-control-user  @error('rooms') is-invalid @enderror" id="exampleLastName"
                            placeholder="Apartment rooms">
                            @error('rooms')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <input type="number" name="till" value="{{ old('till')?old('till'):'' }}" class="form-control form-control-user  @error('till') is-invalid @enderror" id="exampleLastName"
                            placeholder="Apartment Till Number">
                            @error('till')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>


                <button type="submit" class="btn btn-primary btn-user btn-block">Add Apartment</button>
                
            </form>
            </div>
        </div>

    </div>


</div>

</div>
@endsection