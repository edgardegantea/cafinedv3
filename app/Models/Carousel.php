<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    /** @use HasFactory<\Database\Factories\CarouselFactory> */
    use HasFactory;

    protected $table = 'carousel';

    protected $fillable = [
        'title',
        'content',
        'image_path',
        'url',
        'order',
        'is_active',
    ];

}
