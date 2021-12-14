<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
    protected $table = 'category';
    protected $primaryKey = 'id';
    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}
