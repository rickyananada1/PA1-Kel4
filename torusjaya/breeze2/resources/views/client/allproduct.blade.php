@extends('client.layouts.nav')
@section('title','User | Semua Produk')
@section('content')
@php
  $bahanbangunans = App\Models\bahanbangunan::latest()->get();
@endphp
@php
  $peralatantanamen = DB::table('peralatantanamen')->get();
@endphp
@php
  $rumahtanggas = DB::table('rumahtanggas')->get();
@endphp
@php
  $peralatanlistriks = DB::table('peralatanlistriks')->get();
@endphp
@php
  $peralatankonstruksis = DB::table('peralatankonstruksis')->get();
@endphp
@php
  $peralatankeamanans = DB::table('peralatankeamanans')->get();
@endphp
@include('client.section')
<section class="topics-section section-padding pb-0" id="section_3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Semua Produk</h4>
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

            @foreach($peralatankonstruksis as $item)
            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-overlay">
                    <a href="{{route('client.alatkonstruksi.show', $item->id)}}" class="custom-block-image-wrap">
                        <img src="{{  asset('images/alatkonstruksi/'.$item->image) }}"
                            class="custom-block-image img-fluid" alt="">
                    </a>

                    <div class="custom-block-info custom-block-overlay-info">
                        <h5 class="mb-1">
                            <a href="{{route('client.alatkonstruksi.show', $item->id)}}">
                                {{$item->name}}
                                Rp. {{ number_format($item->harga) }}
                            </a>
                        </h5>
                        <p class="badge mb-0">Stok: {{$item->stok}}</p>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($peralatanlistriks as $item)
            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-overlay">
                    <a href="{{route('client.alatlistrik.show', $item->id)}}" class="custom-block-image-wrap">
                        <img src="{{  asset('images/alatlistrik/'.$item->image) }}"
                            class="custom-block-image img-fluid" alt="">
                    </a>
                    <div class="custom-block-info custom-block-overlay-info">
                        <h5 class="mb-1">
                            <a href="{{route('client.alatlistrik.show', $item->id)}}">
                                {{$item->name}}
                                Rp. {{ number_format($item->harga) }}
                            </a>
                        </h5>
                        <p class="badge mb-0">Stok: {{$item->stok}}</p>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($rumahtanggas as $item)
            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-overlay">
                    <a href="{{route('client.alatrt.show', $item->id)}}" class="custom-block-image-wrap">
                        <img src="{{  asset('images/alatrt/'.$item->image) }}"
                            class="custom-block-image img-fluid" alt="">
                    </a>

                    <div class="custom-block-info custom-block-overlay-info">
                        <h5 class="mb-1">
                            <a href="{{route('client.alatrt.show', $item->id)}}">
                                {{$item->name}}
                                Rp. {{ number_format($item->harga) }}
                            </a>
                        </h5>

                        <p class="badge mb-0">Stok: {{$item->stok}}</p>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($peralatantanamen as $item)
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

            @foreach($peralatankeamanans as $item)  
                  <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block custom-block-overlay">
                      <a href="{{route('client.alatkeamanan.show', $item->id)}}" class="custom-block-image-wrap">
                                <img src="{{  asset('images/alatkeamanan/'.$item->image) }}"
                                    class="custom-block-image img-fluid" alt="">
                            </a>

                            <div class="custom-block-info custom-block-overlay-info">
                                <h5 class="mb-1">
                                    <a href="{{route('client.alatkeamanan.show', $item->id)}}">
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
