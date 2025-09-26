<?php

namespace App\Models\Footer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterBadge extends Model
{
    use HasFactory;

     protected $fillable = [
        'title',
        'script',
    ];

}
