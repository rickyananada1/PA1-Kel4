@extends('client.layouts.nav')
@section('title','User | All Product')
@section('content')
@php
$products = DB::table('bahanbangunan')
    ->unionAll(DB::table('peralatankonstruksi'))
    ->unionAll(DB::table('peralaantlistrik'))
    ->unionAll(DB::table('peralatantanamen'))
    ->unionAll(DB::table('peralatankeamanan'))
    ->unionAll(DB::table('arumahtangga'))
    ->get();

return view('products.index', ['products' => $products]);

@endphp


<section class="topics-section section-padding pb-0" id="section_3">
            <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-12">
                    <div class="section-title-wrap mb-5">
                      <h4 class="section-title">All Products</h4>
                    </div>
                  </div>
                  
                  @foreach($products as $product)  
                  <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block custom-block-overlay">
                      <a href="{{route('client.bahanbangunan.show', $item->id)}}" class="custom-block-image-wrap">
                                <img src="{{  asset('images/bahanbangunan/'.$product->image) }}"
                                    class="custom-block-image img-fluid" alt="">
                            </a>

                            <div class="custom-block-info custom-block-overlay-info">
                                <h5 class="mb-1">
                                    <a href="{{route('client.bahanbangunan.show', $item->id)}}">
                                    {{ $product->nama }}
                                    Rp. {{ number_format($product->harga) }}
                                    </a>
                                </h5>

                                <p class="badge mb-0">Stok: {{$product->stok}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
<!-- <div id="carouselExampleCaptions" class="carousel slide shadow bg-dark" data-bs-ride="carousel">
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
</div> -->
@endsection
