@extends('client.layouts.nav')
@section('title','User | Bahan Bahan Bangunan')
@section('content')
@php
  $bahanbangunans = App\Models\bahanbangunan::latest()->get();
@endphp

<div id="carouselExampleCaptions" class="carousel slide shadow bg-dark" data-bs-ride="carousel">
      <div class="carousel-inner ">
        @foreach($bahanbangunans as $item)
          <div class="carousel-item @if($loop->first) active @endif">
          <br><br>
            <div class="slider-image text-center">
               <img src="{{  asset('images/bahanbangunan/'.$item->image) }}" class="d-inline-block border text-center rounded" alt="...">
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
 <br>
<div class="container">
  <h2>Bahan Bahan Bangunan</h2>
  <form action="#" method="GET">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search" name="query">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
  </form>
  <div class="row row-cols-1 row-cols-md-4 g-4 mt-2 shadow">
   @foreach($bahanbangunans as $item)
    <div class="col">
      <div class="card h-100">
        <img src=" {{ asset('images/bahanbangunan/'.$item->image) }}" width="100%" height="150px" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$item->name}}</h5>
          <p class="card-text">Rp. {{ number_format($item->harga) }}</p>
          <a href="{{ route('client.bahanbangunan.show', $item->id) }}" class="btn btn-primary">View Detail</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
