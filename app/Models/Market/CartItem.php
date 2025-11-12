<?php

namespace App\Models\Market;

use App\Models\User;
use App\Models\Market\Product;
use App\Models\Market\Guarantee;
use App\Models\Market\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['product_id', 'user_id', 'color_id', 'guarantee_id', 'number'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class);
    }

    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //productPrice + guaranteePrice + colorPrice

    public function cartItemProductPrice()
    {

        $guaranteePriceIncrease = optional($this->guarantee)->price_increase ?? 0;
        $colorPriceIncrease = optional($this->color)->price_increase ?? 0;
        $productPrice = optional($this->product)->price ?? 0;

        return $productPrice + $guaranteePriceIncrease + $colorPriceIncrease;
    }


    //productPrice * (discountPercentage / 100)
    public function cartItemProductDiscount()
    {
        $cartItemProductPrice = $this->cartItemProductPrice();

        $activeSale = optional($this->product)->activeAmazingSales();

        $productDiscount = $activeSale ? $cartItemProductPrice * ($activeSale->percentage / 100) : 0;

        return $productDiscount;
    }


    // number * ( cartItemProductPrice - cartItemProductDiscount )
    public function cartItemFinalPrice()
    {
        $cartItemProductPrice = $this->cartItemProductPrice();
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * ($cartItemProductPrice - $productDiscount);
    }

    // number * productDiscount
    public function cartItemFinalDiscount()
    {
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * $productDiscount;
    }
}
