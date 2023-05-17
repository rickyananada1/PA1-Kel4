@extends('client.layouts.nav')
@section('title','User |Dashboard')
@section('content')
  
@php
  $informasitokos = DB::table('informasitokos')->get();
  @endphp


<div class="container">
  <h2>Dashboard</h2>
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
    </div>
    @endsection
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>