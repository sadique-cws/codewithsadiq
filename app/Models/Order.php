<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function orderitem()
    {
        return $this->hasMany('App\models\OrderItem');
    }
    public function paytm()
    {
        return $this->hasMany('App\Models\Paytm');
    }
    public function payment_due()
    {
        return $this->hasMany('App\Models\Paytm')->where('paytm.status', '=', 1)->latest();
    }
    
    public function coupon_data()
    {
        return $this->hasOne('App\Models\Coupon','id','coupon');
    }
}

