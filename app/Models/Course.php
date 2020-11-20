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

    public function categories()
    {
        return $this->hasOne('App\Models\Category','id', 'category');
    }
}
