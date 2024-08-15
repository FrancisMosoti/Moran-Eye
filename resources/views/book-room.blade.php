@extends('layouts.app2')

@section('content')


<div class="card mx-auto mt-5" style="width: 30rem;">
  <div class="card-header">
    Book A Room
  </div>
  <div class="card-body">
    <form action="{{route('pay')}}" method="post">
      @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Room Number</label>
    <input type="text" name="room_no" class="form-control" value="{{$room->room_no}}" id="exampleFormControlInput1" placeholder="Room Number" disabled>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Room Price</label>
    <input type="text" name="amount" class="form-control" value="{{$room->price}}" id="exampleFormControlInput1" placeholder="Room Price" disabled>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
    <input type="number" class="form-control" name="phone_number" id="exampleFormControlInput1" placeholder="Phone Number">
    </div>
    <button type="submit" class="btn btn-primary">Pay</button>
    
    </form>
  </div>
  <div class="card-footer">
    footer
  </div>
</div>

@endsection