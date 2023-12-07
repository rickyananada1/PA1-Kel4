@extends('client.layouts.nav')
@section('title','User |Dashboard')
@section('content')

@php
  $informasitokos = DB::table('informasitokos')->get();
  @endphp 

  @include('client.section')
  <section class="about-section section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="pb-5 mb-5">
                            <div class="section-title-wrap mb-4">
                                <h4 class="section-title">Our story</h4>
                            </div>
                            <p>  </p>
                            <img src="images/medium-shot-young-people-recording-podcast.jpg"
                                class="about-image mt-5 img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

  @include('client.footer')
@endsection