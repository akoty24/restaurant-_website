<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable =
        [
            'name', 'desc', 'price', 'image', 'category_id', 'user_id'
        ];
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
