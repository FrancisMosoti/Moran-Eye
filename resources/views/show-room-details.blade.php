@extends('layouts.app')


@section('content')
    <!-- Content Column -->
    <div class="col-lg-12 mx-auto ">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Room No</th>
      <th scope="col">Price</th>
      <th scope="col">Status 1</th>
      <th scope="col">Status 2</th>
      <!-- <th scope="col">No. of Rooms</th> -->
    </tr>
  </thead>
  <tbody>
@forelse ($rooms as $room)
    <tr>
      <th scope="row">{{ $room->room_no }}</th>
      <td>{{ $room->price }}</td>
      <td><button type="button" class="btn btn-danger">{{ $room->status1 }}</button></td>
      <td><button type="button" class="btn btn-danger">{{ $room->status2 }}</button></td>
    </tr>
@empty
<tr>
    <td colspan="5">No Apartment</td>
</tr>
    <p>No users</p>
@endforelse
<tr>
      <th scope="row">11</th>
      <td>5000</td>
      <td><button type="button" class="btn btn-success">Occupied</button></td>
      <td><button type="button" class="btn btn-success">Paid</button></td>
    </tr>

    <tr>
      <th scope="row">12</th>
      <td>5000</td>
      <td><button type="button" class="btn btn-warning">Booked</button></td>
      <td><button type="button" class="btn btn-success">Paid</button></td>
    </tr>

    <tr>
      <th scope="row">13</th>
      <td>5000</td>
      <td><button type="button" class="btn btn-warning">Booked</button></td>
      <td><button type="button" class="btn btn-danger">Not Paid</button></td>
    </tr>
  </tbody>
</table>


        </div>
    </div>


@endsection
