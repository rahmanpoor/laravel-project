<?php

namespace App\Models\Footer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSocial extends Model
{
    use HasFactory;

     protected $fillable = [
        'url',
        'icon',
        'title'
    ];


     public static $social_icons = [
        1   =>  'instagram',
        2   =>  'telegram',
        3   =>  'whatsapp',
        4   =>  'twitter',
        5   =>  'linkedin',
    ];
}
