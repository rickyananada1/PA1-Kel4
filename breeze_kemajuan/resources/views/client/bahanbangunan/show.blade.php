@extends('client.layouts.nav')
@section('title', 'Detail Bahan Bangunan')

@section('content')
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('images/bahanbangunan/'.$bahanbangunan->image) }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title">{{ $bahanbangunan->name }}</h3>
        <p class="card-text">Rp. {{ number_format($bahanbangunan->harga) }}</p>
        <br>
        <p class="card-text">Stok : {{ $bahanbangunan->stok }}</p>
        <p class="card-text">{{ $bahanbangunan->description }}</p>
        <p class="card-text"><small class="text-muted">{{$bahanbangunan->updated_at}}</small></p>
      </div>
    </div>
  </div>
</div>
@endsection

