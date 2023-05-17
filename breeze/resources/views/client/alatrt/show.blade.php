@extends('client.layouts.nav')
@section('title', 'Detail Peralatan Rumah Tangga')

@section('content')
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('images/alatrt/'.$rumahtangga->image) }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title">{{ $rumahtangga->name }}</h3>
        <p class="card-text">Rp. {{ number_format($rumahtangga->harga) }}</p>
        <br>
        <p class="card-text">Stok : {{ $rumahtangga->stok }}</p>
        <p class="card-text">{{ $rumahtangga->description }}</p>
        <p class="card-text"><small class="text-muted">{{$rumahtangga->updated_at}}</small></p>
      </div>
    </div>
  </div>
</div>
@endsection

