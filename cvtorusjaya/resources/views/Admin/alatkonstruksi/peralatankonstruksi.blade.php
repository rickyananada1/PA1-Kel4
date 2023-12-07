@extends('admin.layouts.admin')

@section('title', 'Bahan Bahan Bangunan')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Peralatan Konstruksi</h3>
            <div class="card-tools">
                <a href="{{ route('admin.alatkonstruksi.create') }}" class="btn btn-success btn-sm">Add New</a>
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
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peralatankonstruksi as $peralatankonstruksi)
                        <tr>
                            <td>{{ $peralatankonstruksi->id }}</td>
                            <td>{{ $peralatankonstruksi->name }}</td>
                            <td>Rp. {{ number_format($peralatankonstruksi->harga, 0, ',', '.') }}</td>
                            <td>{{ $peralatankonstruksi->stok }}</td>
                            <td>{{ $peralatankonstruksi->description }}</td>
                            <td>
                                @if ($peralatankonstruksi->image)
                                    <img src="{{ asset('images/alatkonstruksi/'.$peralatankonstruksi->image) }}" alt="{{ $peralatankonstruksi->name }}" width="100">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.alatkonstruksi.edit', $peralatankonstruksi->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.alatkonstruksi.destroy', $peralatankonstruksi->id) }}" method="POST" style="display: inline-block;">
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
