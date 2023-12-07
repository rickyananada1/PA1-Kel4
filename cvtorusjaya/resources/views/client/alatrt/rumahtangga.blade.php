@extends('client.layouts.nav')
@section('title','User | Peralatan Rumah Tangga')
@section('content')
@include('client.section')
@php
  $rumahtanggas = DB::table('rumahtanggas')->get();
  @endphp

  <section class="topics-section section-padding pb-0" id="section_3">
            <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-12">
                    <div class="section-title-wrap mb-5">
                      <h4 class="section-title">Peralatan Rumah Tangga</h4>
                    </div>
                  </div>
                  @foreach($rumahtanggas as $item)  
                  @guest
        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
            <div class="custom-block custom-block-overlay">
              <a href="{{ route('login') }}" class="custom-block-image-wrap">
    <img src="{{  asset('images/alatrt/'.$item->image) }}"
                            class="custom-block-image img-fluid" alt="">
                    </a>

                    <div class="custom-block-info custom-block-overlay-info">
                        <h5 class="mb-1">
                            <a href="{{ route('login') }}">
                            {{$item->name}}
                            Rp. {{ number_format($item->harga) }}
                            </a>
                        </h5>

                        <p class="badge mb-0">Stok: {{$item->stok}}</p>
                    </div>
                </div>
            </div>
            @else
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
                    @endif
                    @endforeach

                </div>
            </div>
        </section>
        @include('client.footer')

@endsection