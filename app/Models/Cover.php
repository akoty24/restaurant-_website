<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'video',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
