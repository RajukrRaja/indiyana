<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'description',
        'image_main',
        'image_small',
        'bullet_points',
        'is_active',
        'bullet_points-2',
        'bullet_points-3'
    ];
}
