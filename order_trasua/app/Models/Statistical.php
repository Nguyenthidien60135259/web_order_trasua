<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistical extends Model
{
    public $timestamps = false;
    protected $fillable = [
      'order_date','sales','profit','order_total'
    ];
    protected $primaryKey = 'id';
    protected $table = 'statistical';
}
