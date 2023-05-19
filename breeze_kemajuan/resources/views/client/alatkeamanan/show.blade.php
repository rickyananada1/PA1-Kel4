@extends('client.layouts.nav')
@section('title', 'Detail Peralatan Keamanan')

@section('content')
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('images/alatkeamanan/'.$peralatankeamanan->image) }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title">{{ $peralatankeamanan->name }}</h3>
        <p class="card-text">Rp. {{ number_format($peralatankeamanan->harga) }}</p>
        <br>
        <p class="card-text">Stok : {{ $peralatankeamanan->stok }}</p>
        <p class="card-text">{{ $peralatankeamanan->description }}</p>
        <p class="card-text"><small class="text-muted">{{$peralatankeamanan->updated_at}}</small></p>
      </div>
    </div>
  </div>
</div>
@endsection

