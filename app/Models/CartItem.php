<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = ['cart_id', 'product_id', 'quantity', 'unit_price', 'total_price'];
    protected $table = 'cart__items';
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
