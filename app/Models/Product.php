<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    use HasFactory,softDeletes;
    protected $fillable = ['name','images','price','sale_price','status','quatity', 'color','description','summary','category_id'];

    public function category(){
        return $this->hasOne(Category::class,'id', 'category_id');
    }

    public function scopeSearch($query) {
        if($key = request()->key){
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }
    public function scopeFilter($query)
    {
        if (request()->order) {
            $order = request()->order;
            $order_arr = explode('-', $order);
            $query = $query->orderBy($order_arr[0], $order_arr[1]);
        }
        return $query;
    }
}
