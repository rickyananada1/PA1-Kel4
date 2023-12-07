@extends('admin.layouts.admin')
@section('title', 'Peralatan Keamanan')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Peralatan Keamanan</h3>
            <div class="card-tools">
                <a href="{{ route('admin.alatkeamanan.create') }}" class="btn btn-success btn-sm">Add New</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peralatankeamanan as $peralatankeamanan)
                        <tr>
                            <td>{{ $peralatankeamanan->id }}</td>
                            <td>{{ $peralatankeamanan->name }}</td>
                            <td>Rp. {{ number_format($peralatankeamanan->harga, 0, ',', '.') }}</td>
                            <td>{{ $peralatankeamanan->stok }}</td>
                            <td>{{ $peralatankeamanan->description }}</td>
                            <td>
                                @if ($peralatankeamanan->image)
                                    <img src="{{ asset('images/alatkeamanan/'.$peralatankeamanan->image) }}" alt="{{ $peralatankeamanan->name }}" width="100">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.alatkeamanan.edit', $peralatankeamanan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.alatkeamanan.destroy', $peralatankeamanan->id) }}" method="POST" style="display: inline-block;">
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
