<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $peralatankeamanan->name ?? '') }}" placeholder="Enter Product Name">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Price</label>
    <input type="text" name="harga" class="form-control" value="{{ old('harga', $peralatankeamanan->harga ?? '') }}" placeholder="Enter Product Price">
    @error('harga')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="name">Stock</label>
    <input type="text" name="stok" class="form-control" value="{{ old('stok', $peralatankeamanan->stok ?? '') }}" placeholder="Enter Product Stock">
    @error('stok')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="summernote" class="form-control" placeholder="Enter Product description">{{ old('description', $peralatankeamanan->description ?? '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<br>
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control-file">
    @if(isset($peralatankeamanan) && $peralatankeamanan->image)
        <div class="mt-2">
            <img src="{{ asset('images/alatkeamanan/'.$peralatankeamanan->image) }}" alt="{{ $peralatankeamanan->name }}" width="100">
        </div>
    @endif
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<br>
