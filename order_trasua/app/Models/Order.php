<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id','total','status','name','address','order_date','phone','note','table_id'
    ];
    protected $table = 'orders';
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
    public function tb_table()
    {
        return $this->belongsTo('App\Models\Table', 'table_id','id');
    }
}
?>
