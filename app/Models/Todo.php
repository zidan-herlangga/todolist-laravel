<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'is_done',
        'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    
}
