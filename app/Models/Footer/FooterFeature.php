<?php

namespace App\Models\Footer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FooterFeature extends Model
{
   use HasFactory;

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
        0   =>  'سمت راست',
        1   =>  'سمت راست وسط',
        2   =>  'وسط',
        3   =>  'سمت چپ وسط',
        4   =>  'سمت چپ'
    ];
}
