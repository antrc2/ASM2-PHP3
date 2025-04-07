<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = [
        "name","price","quantity","image","description","category_id","status"
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
