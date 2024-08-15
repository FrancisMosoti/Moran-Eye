@extends('layouts.app')


@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Apartment Name</th>
      <th scope="col">Apartment Location </th>
      <th scope="col">Till Number</th>
      <th scope="col">No. of Rooms</th>
    </tr>
  </thead>
  <tbody>
@forelse ($apartments as $apartment)
    <tr>
      <th scope="row">{{ $apartment->id }}</th>
      <td>{{ $apartment->name }}</td>
      <td>{{ $apartment->location }}</td>
      <td>{{ $apartment->Till_Number }}</td>
      <td>{{ $apartment->rooms }}</td>
    </tr>
@empty
<tr>
    <td colspan="5">No Apartment</td>
</tr>
    <p>No users</p>
@endforelse
  </tbody>
</table>



@endsection
