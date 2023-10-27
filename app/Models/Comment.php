<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\User;

class Comment extends Model
{
    use HasFactory,softDeletes;
    protected $fillable  = ['name','email','content','user'];
    
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name','like', '%'.$key.'%');
        }
        return $query;
    }
}
