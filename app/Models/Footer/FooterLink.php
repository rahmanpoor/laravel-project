<?php

namespace App\Models\Footer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterLink extends Model
{
    use HasFactory;

      protected $fillable = [
        'title',
        'url',
        'position'
    ];


     public static $positions = [
        1   =>  'ستون اول',
        2   =>  'ستون دوم',
        3   =>  'ستون سوم',
    ];
}
