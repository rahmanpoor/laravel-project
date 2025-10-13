<?php

namespace App\Models\Market;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Market\Compare;
use App\Models\Content\Comment;
use App\Models\Market\Guarantee;
use App\Models\Market\AmazingSale;
use App\Models\Market\CategoryValue;
use Illuminate\Database\Eloquent\Model;
use Nagy\LaravelRating\Traits\Rateable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sluggable, Rateable;


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

    protected $fillable = ['name', 'introduction', 'slug', 'image', 'status', 'tags', 'weight', 'length', 'width', 'height', 'price', 'marketable', 'sold_number', 'frozen_number', 'marketable_number', 'brand_id', 'category_id', 'published_at'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


    public function metas()
    {
        return $this->hasMany(ProductMeta::class);
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }


    public function guarantees()
    {
        return $this->hasMany(Guarantee::class);
    }


    public function images()
    {
        return $this->hasMany(Gallery::class, 'product_id');
    }



    public function comments()
    {
        return $this->morphMany('App\Models\Content\Comment', 'commentable');
    }

    public function amazingSales()
    {
        return $this->hasMany(AmazingSale::class);
    }


    public function activeAmazingSales()
    {
        return $this->amazingSales()->where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->first();
    }



    public function values()
    {
        return $this->hasMany(CategoryValue::class, 'product_id');
    }



    public function activeComments()
    {
        return $this->comments()->where('approved', 1)->whereNull('parent_id')->get();
    }

    public function user() {
        return $this->belongsToMany(User::class);
    }

    public function compares() {
        return $this->belongsToMany(Compare::class);
    }
}
