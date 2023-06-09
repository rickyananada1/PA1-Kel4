@extends('admin.layouts.admin')
@section('title', 'Dashboard')
@section('content')
@php
  $komentar = App\Models\komentar::latest()->get();
@endphp
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Komentar</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Komentar</th>
                                    <th>Date Time</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($komentar as $komentar)
                                <tr>
                                    <td>{{($komentar->user_id)}} </td>
                                    <td>{{ $komentar->user ? $komentar->user->name : 'Pengguna Tidak Diketahui' }}</td>
                                    <td>{{($komentar->komentar)}} </td>
                                    <td>{{($komentar->date)}} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div>
@endsection