<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $fillable = [
        'likeFrom',
        'likeTo'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'likeFrom', 'id');
    //     return $this->belongsTo(User::class, 'likeTo', 'id');
    // }
}
