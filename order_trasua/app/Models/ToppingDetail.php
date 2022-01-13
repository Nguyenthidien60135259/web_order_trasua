<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToppingDetail extends Model
{
<<<<<<< HEAD
    public $timestamps = false;
    protected $fillable = [
        'order_id','product_id','topping_id'	
    ];
    protected $table = 'topping_details';
    
    public function topping()
    {
        return $this->belongsTo("App\Models\Topping","topping_id");
    }
    
    public function toppingdetail()
    {
        return $this->belongsTo("App\Models\Product","App\Models\OrderDetail","id","product_id");
=======
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'order_id', 'product_id', 'topping_id'
    ];
    protected $table = 'topping_details';
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
        return $this->hasMany("App\Models\Topping", "topping_id",'id');
>>>>>>> 537cd46524d66fae9e7152023001d5763addfcf9
    }
}
