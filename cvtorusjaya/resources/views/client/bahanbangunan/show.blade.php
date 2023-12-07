@extends('client.layouts.nav')
@section('title', 'Detail Bahan Bangunan')
@section('content')
    @include('client.section')
    <section class="latest-podcast-section section-padding pb-0" id="section_2">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-10 col-12">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">Detail Page</h4>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="custom-block-icon-wrap">
                                <div class="custom-block-image-wrap custom-block-image-detail-page">
                                    <img src="{{ asset('images/bahanbangunan/' . $bahanbangunan->image) }}"
                                        class="custom-block-image img-fluid" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-12">
                            <div class="custom-block-info">
                                <div class="custom-block-top d-flex mb-1">
                                    <small class="ms-auto">Stok <span
                                            class="badge">{{ $bahanbangunan->stok }}</span></small>
                                </div>

                                <h2 class="mb-2">{{ $bahanbangunan->name }}</h2>

                                <p>{{ $bahanbangunan->description }}</p>

                                <div class="col-lg-9 col-12">
                                    <div class="custom-block-info">
                                        <ul class="social-icon ms-lg-auto ms-md-auto">
                                            <li class="social-icon-item">
                                                Order via chat : <a href="https://wa.me/081265569506" class="social-icon-link bi-whatsapp"></a>
                                            </li>
                                        </ul>
    
                                        <div class="profile-block profile-detail-block d-flex flex-wrap align-items-center mt-5">
                                            <div class="d-flex mb-3 mb-lg-0 mb-md-0">
                                                @php
                                                $firstLetter = strtoupper(substr(Auth::user()->name, 0, 1));
                                                @endphp
                                                <div class="profile-block-image img-fluid"
                                                    style="background-color: #e9ecef; color: #000; text-align: center; font-size: 48px; width: 100px; height: 93px;">
                                                    {{ $firstLetter }}
                                                </div>
                                                <div class="ms-3">
                                                    <p>{{ Auth::user()->name }}</p>
                                                    <br>
                                                    <form method="POST"
                                                        action="{{ route('bahanbangunan.komentar.store', $bahanbangunan->id) }}">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="komentar" class="form-label"></label>
                                                            <input type="text" name="komentar" id="komentar" required>
                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane fa-sm"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <h3 class="mt-5">Daftar Komentar:</h3>


            <ul class="list-group">
                @foreach($bahan_bangunan as $rowbangunan)
                    <li class="list-group-item">
                        {{ $rowbangunan->user ? $rowbangunan->user->name : 'Pengguna Tidak Diketahui' }}
                        <textarea class="form-control" name="komentar" id="komentar" rows="3" disabled style="border:none;">{{ $rowbangunan->komentar }}</textarea>
                    </li>
                @endforeach
            </ul>

        </div>
        </div>
    </section>
    @php
        $bahanbangunans = App\Models\bahanbangunan::latest()->get();
    @endphp
    <section class="topics-section section-padding pb-0" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">Related Product</h4>
                    </div>
                </div>
                @foreach ($bahanbangunans as $item)
                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <a href="{{ route('client.bahanbangunan.show', $item->id) }}" class="custom-block-image-wrap">
                                <img src="{{ asset('images/bahanbangunan/' . $item->image) }}"
                                    class="custom-block-image img-fluid" alt="">
                            </a>

                            <div class="custom-block-info custom-block-overlay-info">
                                <h5 class="mb-1">
                                    <a href="{{ route('client.bahanbangunan.show', $item->id) }}">
                                        {{ $item->name }}
                                        Rp. {{ number_format($item->harga) }}
                                    </a>
                                </h5>

                                <p class="badge mb-0">Stok: {{ $item->stok }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('client.footer')
@endsection
