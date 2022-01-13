<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name','email','password','dateOfBirth','sex','address','phone','user_id'
    ];
    protected $table = 'customers';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo("App\Models\User","user_id");
    }
}
