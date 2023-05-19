@extends('admin.layouts.admin')

@section('title', 'Add Product')

@section('content')

    <div class="card" style="width:75%; margin:3% 2px 0px 5%;">
        <div class="card-header">
            <h3 class="card-title">Add New Product</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.alatkonstruksi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.alatkonstruksi._form')
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>

@endsection
