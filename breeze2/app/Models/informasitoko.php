<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informasitoko extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
