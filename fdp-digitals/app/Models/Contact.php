<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'service',
        'message',
        'status',
        'last_contacted_at', 
    ];

    protected $casts = [
        'last_contacted_at' => 'datetime',
        'created_at' => 'datetime',
    ];
}