@extends('layouts.app2')

@section('content')
<form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Logout</button>
                                    </form>
   
@foreach ($apartments as $apartment)
<div class="card mx-auto mt-5" style="width: 50%;">
  <div class="card-header">
  {{ $apartment->name}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{ $apartment->location}}</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="{{route('show-apartment', ['apart' => $apartment->id])}}" class="btn btn-primary stretched-link">View Apartment</a>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
@endforeach


@endsection