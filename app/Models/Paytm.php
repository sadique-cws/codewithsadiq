<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paytm extends Model
{
    use HasFactory;
    
    protected $table = 'paytm';

    protected $fillable = ['name','mobile','email','status','amount','due_amount','order_id','transaction_id','user_id','order'];
         //status = 0, failed, 
         //status = 1, success, 
         //status = 2, processing 

   

}