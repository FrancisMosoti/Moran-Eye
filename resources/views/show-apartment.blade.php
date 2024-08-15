@extends('layouts.app2')

@section('content')
    <h1 class="text-center bg-primary">{{$apartment->name}} Apartment</h1>
    <!-- <p>{{$apartment->user_id}} Apartment</p> -->
    <a href="{{route('home')}}" class="btn btn-info">Home &rarr;</a>

    @forelse ($apartment->ap_rooms as $rooms)
    <div class="card mx-3" style="width: 25rem;">
<!-- carousels start -->

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="{{asset('storage/'.$rooms->pic_1)}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="{{asset('storage/'.$rooms->pic_2)}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('storage/'.$rooms->pic_3)}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('storage/'.$rooms->pic_4)}}" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- carousel end -->
    <div class="card-body">
        <h5 class="card-title">Room Number {{$rooms->room_no}}</h5>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        <a href="#" class="btn btn-danger">{{$rooms->status1}}</a>
        <a href="#" class="btn btn-danger">{{$rooms->status2}}</a>
        <a href="{{route('book', ['bk' => $rooms->id])}}" class="btn btn-info">Book&rarr;</a>
    </div>
    </div>
    @empty
    <h1 class="text-center bg-info mt-5 mx-auto p-3" style="width: 15rem;">No Records found!</h1>
        <p></p>
    @endforelse



@endsection