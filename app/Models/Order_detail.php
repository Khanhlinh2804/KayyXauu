<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Order_detail extends Model
{
    use HasFactory,softDeletes;
    protected $fillable = ['price',	'quantity',	'order_id',	'product_id'];

    public function products(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function order(){
        return $this->hasMany(Order::class, 'id', 'order_id');
    }
}
