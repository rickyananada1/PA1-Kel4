@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
            <h3 class="card-title">Informasi dan Pengumuman</h3>
            <div class="">
                <a href="{{ route('admin.informasi.create') }}" class="btn btn-success btn-sm">Tambah Pengumuman</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table table-striped" id="bootstrap-data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informasitoko as $informasitoko)
                        <tr>
                            <td>{{ $informasitoko->id }}</td>
                            <td>{{ $informasitoko->name }}</td>
                            <td>{{ $informasitoko->description }}</td>
                            <td> @if ($informasitoko->image)
                                    <img src="{{ asset('images/informasi/'.$informasitoko->image) }}" alt="{{ $informasitoko->name }}" width="100">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.informasi.edit', $informasitoko->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.informasi.destroy', $informasitoko->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Product?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection