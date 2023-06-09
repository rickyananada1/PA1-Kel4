<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $bahanbangunan->name ?? '') }}" placeholder="Enter Product Name">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="name">Price</label>
    <input type="text" name="harga" class="form-control" value="{{ old('harga', $bahanbangunan->harga ?? '') }}" placeholder="Enter Product Price">
    @error('harga')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="name">Stock</label>
    <input type="text" name="stok" class="form-control" value="{{ old('stok', $bahanbangunan->stok ?? '') }}" placeholder="Enter Product Stock">
    @error('stok')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="summernote" id="summernote" class="form-control" placeholder="">{{ old('description', $bahanbangunan->description ?? '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<br>
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control-file">
    @if(isset($bahanbangunan) && $bahanbangunan->image)
        <div class="mt-2">
            <img src="{{ asset('images/bahanbangunan/'.$bahanbangunan->image) }}" alt="{{ $bahanbangunan->name }}" width="100">
        </div>
    @endif
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<br>
@section('scripts')
<script>
    		$('#summernote').summernote({
      		placeholder: 'Masukkan Deskripsi',
      		tabsize: 2,
      		height: 200
    		});
</script>
@endsection