<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'city_id'];

    public function city(){
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
