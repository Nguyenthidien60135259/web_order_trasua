<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    public $timestamps = false;
    protected $fillable = [
      'topping_name','topping_image','topping_price'  
    ];
    protected $table = 'toppings';
}
