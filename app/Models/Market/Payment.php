<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;



    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function paymentable()
    {
        return $this->morphTo();
    }

}
