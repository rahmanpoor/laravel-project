<?php

namespace App\Models\Content;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        0   =>  'اسلاید شو (صفحه اصلی)',
        1   =>  'کنار اسلاید شو (صفحه اصلی)',
        2   =>  'دو بنر تبلیغی بین دو اسلایدر  (صفحه اصلی)',
        3   =>  'بنر تبلیغی بزرگ پایین دو اسلایدر  (صفحه اصلی)'
    ];



    protected static function booted()

    {

        // وقتی بنر ساخته یا آپدیت می‌شود

        static::saved(function () {

            Cache::forget('home_banners');
        });



        // وقتی بنر حذف (soft delete) می‌شود

        static::deleted(function () {

            Cache::forget('home_banners');
        });



        // در صورت نیاز برای restore شدن در SoftDeletes

        static::restored(function () {

            Cache::forget('home_banners');
        });
    }
}
