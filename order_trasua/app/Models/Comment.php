<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
    	'customer_id',	'product_id',	'comment',	'rating'
    ];
    
    protected $primaryKey = 'id';
 	protected $table = 'comments';

 	public function product(){
 		return $this->belongsTo('App\Models\Product','product_id');
 	}
}