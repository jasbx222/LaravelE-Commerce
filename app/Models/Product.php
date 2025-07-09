<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','is_active', 'description', 'image', 'price', 'discount_percent', 'category_id', 'seller_id'];
    protected $table = 'products';
    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }
}
