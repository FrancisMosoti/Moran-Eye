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
                <h6 class="m-0 font-weight-bold text-primary">ADD ROOM DETAILS</h6>
            </div>
            <div class="card-body">
            <form class="user mx-3" action="{{route('add-room')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                    <label class="form-label" for="">Room Number</label>
                    <select class="form-control form-control-user @error('room') is-invalid @enderror" name="room" placeholder="room number" aria-label="Default select example">
                    <option value="" selected>Select A room</option>
                    @for ($i = 1; $i <= $rooms; $i++)
                    <option value="{{ $i }}">{{ $i }}</option> 
                    @endfor
                    
                    </select>
                    @error('room')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                
                    <div class="mb-3">
                    <label class="form-label" for="">Room Price</label>
                        <input type="text" name="price" value="{{ old('price')?old('price'):'' }}"  class="form-control form-control-user  @error('price') is-invalid @enderror" id="exampleFirstName"
                            placeholder="Room Price">
                            @error('price')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                    <label class="form-label" for="">Room Pic 1</label>
                        <input type="file" name="pic1" value="{{ old('pic1')?old('pic1'):'' }}" class="form-control form-control-user  @error('pic1') is-invalid @enderror" id="exampleLastName"
                            placeholder="Room pic1">
                            @error('pic1')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="">Room Pic 2</label>
                        <input type="file" name="pic2" value="{{ old('pic2')?old('pic2'):'' }}" class="form-control form-control-user  @error('pic2') is-invalid @enderror" id="exampleLastName"
                            placeholder="Room pic2">
                            @error('pic2')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="">Room Pic 3</label>
                        <input type="file" name="pic3" value="{{ old('pic3')?old('pic3'):'' }}" class="form-control form-control-user  @error('pic3') is-invalid @enderror" id="exampleLastName"
                            placeholder="Apartment pic3">
                            @error('pic3')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="">Room Pic 4</label>
                        <input type="file" name="pic4" value="{{ old('pic4')?old('pic4'):'' }}" class="form-control form-control-user  @error('pic4') is-invalid @enderror" id="exampleLastName"
                            placeholder="Apartment pic4">
                            @error('pic4')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    


                <button type="submit" class="btn btn-primary btn-user btn-block">Add Room Details</button>
                
            </form>
            </div>
        </div>

    </div>


</div>

</div>
@endsection