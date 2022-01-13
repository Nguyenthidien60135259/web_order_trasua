<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'customer_id','total','status','name','phone','address','note','order_date','table_id'
    ];
    protected $table = 'orders';
    protected $primaryKey = 'id';
    
    
}
