<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name', 'desc', 'price', 'size_id', 'image', 'status', 'category_id'
    ];
    
    protected $primaryKey = 'id';
 	protected $table = 'products';
     
    public function category()
    {
        $this->belongsTo('App\Models\Category','category_id');
    }
    
    public function size()
    {
        $this->belongsTo("App\Models\Size","size_id");
    }
    
    public function comment()
    {
        $this->hasMany("App\Models\Comment");
    }
}
