<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToppingDetail extends Model
{
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
    }
}
