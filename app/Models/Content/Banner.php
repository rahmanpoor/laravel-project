<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

     protected $casts = [
        'image' => 'array',
    ];


    protected $fillable = [
        'title',
        'image',
        'url',
        'status',
        'position'
    ];

    public static $positions = [
        0 => 'main slide show',
        1 => 'aside slide show',
        2 => 'middle slide show',
        3 => 'bottom slide show'
    ];
}
