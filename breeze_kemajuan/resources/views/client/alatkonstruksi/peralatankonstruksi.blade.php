@extends('client.layouts.nav')
@section('title','User | Peralatan Konstruksi')
@section('content')
@php
  $peralatankonstruksis = DB::table('peralatankonstruksis')->get();
  @endphp

  <div id="carouselExampleCaptions" class="carousel slide shadow bg-dark" data-bs-ride="carousel">
      <div class="carousel-inner ">
        @foreach($peralatankonstruksis as $item)
          <div class="carousel-item @if($loop->first) active @endif">
          <br><br>
            <div class="slider-image text-center">
               <img src="{{  asset('images/alatkonstruksi/'.$item->image) }}" class="d-inline-block border text-center rounded" alt="...">
            </div>
          </div>
         @endforeach
      </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
      </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    <br><br>
</div>

<div class="container">
<h2>Peralatan Konstruksi</h2>
<div class="row row-cols-1 row-cols-md-4 g-4 mt-2 shadow"> 
  @foreach($peralatankonstruksis as $item)
  <div class="col">
    <div class="card h-100">
      <img src=" {{ asset('images/alatkonstruksi/'.$item->image) }}" width="100%" height="150px" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$item->name}}</h5>
        <p class="card-text">{{$item->description}}</p>
        <a href="{{ route('client.alatkonstruksi.show', $item->id) }}" class="btn btn-primary">View Detail</a>
      </div>
    </div>
  </div>
@endforeach
</div>
@endsection