<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
<<<<<<< HEAD
    public $timestamps = false;
    protected $fillable = [
        'order_id',	'product_id','quantity','listTopping','size_id'
    ];
    protected $table = 'order_details';
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function size(){
        return $this->belongsTo('App\Models\Size','size_id');
    }

    public function order(){
        return $this->belongsTo("App\Models\Order","order_id");
=======
    use HasFactory;
    protected $fillable = [
        'order_id', 'product_id', 'quantity','listTopping','size_id'
    ];
    protected $table = 'order_details';
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'product_id','id');
    }
    public function order()
    {
        return $this->belongsTo("App\Models\Order", "order_id",'id');
    }
    public function size()
    {
        return $this->hasMany("App\Models\Size", "size_id",'id');
>>>>>>> 537cd46524d66fae9e7152023001d5763addfcf9
    }
}
