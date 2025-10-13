<?php

namespace App\Models;

use App\Models\Address;
use App\Models\User\Role;
use App\Models\Market\Order;
use App\Models\Ticket\Ticket;
use App\Models\Market\Compare;
use App\Models\Market\Payment;
use App\Models\Market\Product;
use App\Models\User\Permission;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Ticket\TicketAdmin;
use Nagy\LaravelRating\Traits\CanRate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Permissions\HasPermissionsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissionsTrait, CanRate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'national_code',
        'status',
        'user_type',
        'activation',
        'profile_photo_path',
        'password',
        'mobile_verified_at',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function ticketAdmin()
    {
        return $this->hasOne(TicketAdmin::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }




    public function permissions()
    {

        return $this->belongsToMany(Permission::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function products()
    {

        return $this->belongsToMany(Product::class);
    }

    public function orderItems()
    {
        return $this->hasManyThrough(OrderItem::class, Order::class);
    }

    public function isUserPurchedProduct($product_id)
    {
        $productIds = collect();

        foreach ($this->orderItems->where('product_id', $product_id)->get() as $item) {
            $productIds->push($item->product_id);
        }

        $productIds = $productIds->unique();
        return $productIds;
    }

    public function compare()
    {
        return $this->hasOne(Compare::class);
    }


}
