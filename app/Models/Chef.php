<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title',
        'desc',
        'image',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
