@extends('client.layouts.nav')
@section('title','User |Dashboard')
@section('content')
  
@php
  $informasitokos = DB::table('informasitokos')->get();
  @endphp 
        @include('client.section')
        @include('client.pengumuman')
        @include('client.dashboard')
        @include('client.footer')
<!-- <div class="container">
  <h5>Dashboard</h5>
@foreach($informasitokos as $item)
        <div class="actu-bloc">
            <div class="actu-content">
                <div class="img-container">
                    <div class="cover-img">
                    </div>
                    <img src=" {{ asset('images/informasi/'.$item->image) }}" width="200px" height="150px" alt="...">
                </div>
                <div>
                    <h2>{{$item->name}}</h2>
                    <p>{{$item->description}} </p>
                </div>

            </div>

        </div>
        @endforeach
    </div>-->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'> 
    @endsection
