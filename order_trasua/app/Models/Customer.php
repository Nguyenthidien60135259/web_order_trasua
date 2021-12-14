<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name','dateOfBirth','sex','address','phone','user_id'
    ];
    protected $table = 'customers';
    protected $primaryKey = 'id';
}
