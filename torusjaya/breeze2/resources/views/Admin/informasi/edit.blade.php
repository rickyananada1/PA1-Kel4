@extends('admin.layouts.admin')

@section('title', 'Edit Product')

@section('content')
    <div class="card" style="width:75%; margin:3% 2px 0px 5%;">
        <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.informasi.update', $informasitoko->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.informasi._form')
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
@endsection
