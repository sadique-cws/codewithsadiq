<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function course()
    {
        return $this->hasOne('App\Models\Course','id','course_id');
    }
    public function order()
    {
        return $this->hasOne('App\Models\Order', 'id', 'order_id');
    }
}
