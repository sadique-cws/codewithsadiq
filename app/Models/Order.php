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
}

