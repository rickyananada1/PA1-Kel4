<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $informasitoko->name ?? '') }}" placeholder="Judul">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" rows="10" cols="50" placeholder="Deskripsi Pengumuman">{{ old('description', $informasitoko->description ?? '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<br>
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control-file">
    @if(isset($informasitoko) && $informasitoko->image)
        <div class="mt-2">
            <img src="{{ asset('images/informasitoko/'.$informasitoko->image) }}" alt="{{ $informasitoko->name }}" width="100">
        </div>
    @endif
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<br>
