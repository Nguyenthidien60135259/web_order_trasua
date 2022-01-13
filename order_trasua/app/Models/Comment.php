<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
<<<<<<< HEAD
    	'customer_id',	'product_id',	'comment'
=======
    	'customer_id','product_id','comment'
>>>>>>> 537cd46524d66fae9e7152023001d5763addfcf9
    ];

    protected $primaryKey = 'id';
 	protected $table = 'comments';

 	public function product(){
<<<<<<< HEAD
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
    public function customer(){
       return $this->belongsTo('App\Models\Customer','customer_id','id');
   }
=======
 		return $this->belongsTo('App\Models\Product','product_id','id');
 	}
     public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id','id');
    }
>>>>>>> 537cd46524d66fae9e7152023001d5763addfcf9
}
