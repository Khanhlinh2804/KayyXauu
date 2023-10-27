<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Category extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = ['name','status','image'];

    public function scopeSearch($query) {
        if($key = request()->key){
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}
