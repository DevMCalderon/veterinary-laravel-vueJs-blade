<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'price',
        'image',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(ProductCategory::class);
    }
}
