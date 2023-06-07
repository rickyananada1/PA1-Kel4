<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $rumahtangga->name ?? '') }}" placeholder="Enter Product Name">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Price</label>
    <input type="text" name="harga" class="form-control" value="{{ old('harga', $rumahtangga->harga ?? '') }}" placeholder="Enter Product Price">
    @error('harga')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Stock</label>
    <input type="text" name="stok" class="form-control" value="{{ old('stok', $rumahtangga->stok ?? '') }}" placeholder="Enter Product Stock">
    @error('stok')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" placeholder="Enter Product description">{{ old('description', $rumahtangga->description ?? '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<br>
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control-file">
    @if(isset($rumahtangga) && $rumahtangga->image)
        <div class="mt-2">
            <img src="{{ asset('images/alatrt/'.$rumahtangga->image) }}" alt="{{ $rumahtangga->name }}" width="100">
        </div>
    @endif
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<br>
