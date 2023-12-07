<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peralatankeamanan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image','harga','stok','ulasan','id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function komentar()
{
    return $this->morphMany(Komentar::class, 'komentarable');
}

}
