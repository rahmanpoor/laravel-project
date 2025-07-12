<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMeta extends Model
{

    protected $table = 'product_meta';


    use HasFactory, SoftDeletes;



    protected $fillable = [
        'product_id',
        'meta_key',
        'meta_value',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
