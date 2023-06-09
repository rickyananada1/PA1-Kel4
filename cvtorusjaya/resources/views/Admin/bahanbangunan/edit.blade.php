@extends('admin.layouts.admin')

@section('title', 'Edit Product')

@section('content')
    <div class="card" style="width:75%; margin:3% 2px 0px 5%;">
        <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.bahanbangunan.update', $bahanbangunan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.bahanbangunan._form')
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
    @section('scripts')
    <script>
  		$(document).ready(function() {
    		$('#summernote').summernote({
      		placeholder: 'Masukkan Deskripsi',
      		tabsize: 2,
      		height: 200
    		});
  		});
</script>
@endsection
@endsection