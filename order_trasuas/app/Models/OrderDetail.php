<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'order_id',    'product_id', 'quantity'
    ];
    protected $table = 'order_details';
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'product_id');
    }
    public function order()
    {
        return $this->belongsTo("App\Models\Order", "order_id");
    }
}
?>
