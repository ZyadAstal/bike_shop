<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'rating',
        'comment',
        'image',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];
}
