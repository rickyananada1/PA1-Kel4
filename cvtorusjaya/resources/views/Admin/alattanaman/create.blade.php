@extends('admin.layouts.admin')

@section('title', 'Add Product')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Product</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.alattanaman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.alattanaman._form')
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
