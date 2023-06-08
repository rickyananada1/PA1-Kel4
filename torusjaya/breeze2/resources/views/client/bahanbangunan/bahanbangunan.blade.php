@extends('client.layouts.nav')
@section('title','User | Bahan Bahan Bangunan')
@section('content')
@php
  $bahanbangunans = App\Models\bahanbangunan::latest()->get();
@endphp

@include('client.section')
<section class="topics-section section-padding pb-0" id="section_3">
  <div class="container">
    <form action="/search" method="GET" class="custom-form search-form flex-fill me" role="search">
      <div class="input-group input-group-lg">
        <input name="keyword" type="search" class="form-control" id="search" placeholder="Search "
        aria-label="Search">
        <button type="submit" class="form-control" id="submit">
          <i class="bi-search"></i>
        </button>
      </div>
    </form>
    <br><br>
    <div class="row">
      <div class="col-lg-12 col-12">
        <div class="section-title-wrap mb-5">
          <h4 class="section-title">Bahan Bahan Bangunan</h4>
        </div>
      </div>
      @foreach($bahanbangunans as $item)  
      <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
      <div class="custom-block custom-block-overlay">
        <a href="{{route('client.bahanbangunan.show', $item->id)}}" class="custom-block-image-wrap">
          <img src="{{  asset('images/bahanbangunan/'.$item->image) }}"
          class="custom-block-image img-fluid" alt="">
        </a>
        
        <div class="custom-block-info custom-block-overlay-info">
          <h5 class="mb-1">
            <a href="{{route('client.bahanbangunan.show', $item->id)}}">
              {{$item->name}}
              Rp. {{ number_format($item->harga) }}
            </a>
          </h5>
          <p class="badge mb-0">Stok: {{$item->stok}}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</section>
@include('client.footer')
@endsection

