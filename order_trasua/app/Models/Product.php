<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_name','product_desc','product_price','product_price_cost','product_image', 'product_status','category_id'
    ];
    
    protected $primaryKey = 'id';
 	protected $table = 'products';
     
    public function category()
    {
        $this->belongsTo('App\Models\Category','category_id','id');
    }
}
