@extends('client.layouts.nav')
@section('title','User |Dashboard')
@section('content')
        @include('client.section')
        @include('client.pengumuman')
        @include('client.dashboard')
        @include('client.footer')
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'> 
 @endsection
