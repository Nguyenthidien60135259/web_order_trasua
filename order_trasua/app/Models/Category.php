<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    public $timestamps = false;
    protected $fillable = [
        'category_name'
    ];
    protected $table = 'category';
    public function products()
    {
        $this->hasMany('App\Models\Product','category_id','id');
    }
}
