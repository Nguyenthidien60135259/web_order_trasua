<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'customer_id','total','status','created_at'
    ];
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
?>
