<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
 protected $table ='books';
 protected $guarded=['id'];
    
    public function pation(){
        return $this->belongsTo(Pation::class);
    }
}
