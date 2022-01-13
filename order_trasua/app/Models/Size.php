<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
    
    protected $primaryKey = 'id';
 	protected $table = 'size';
    
    public function product()
    {
        $this->belongsTo("App\Models\Product","id");
    }
}
