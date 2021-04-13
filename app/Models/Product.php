<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'desc', 'price', 'amount', 'thumb', 'discount', 'sale_price', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
   
}
