<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $primaryKey = 'slug';
    protected $keyType = 'string';
    public $incrementing = false;

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'category','id');
    }
}
