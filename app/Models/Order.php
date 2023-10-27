<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Order extends Model
{
    use HasFactory,softDeletes;
    protected $fillable = ['name' ,'lastname',	'address', 'city'	,'districts',	'phone',	'payment',	'email',	'note'	,'status' ,'user_id'];


    public function users(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function city(){
        return $this->hasOne(City::class, 'id', 'city');
    }
    public function district(){
        return $this->hasOne(District::class, 'id', 'districts');
    }

    public function order_detail()
    {
        return $this->hasMany(Order_detail::class);
    }
    public function scopeSearch($query) {
        if($key = request()->key){
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }
}
