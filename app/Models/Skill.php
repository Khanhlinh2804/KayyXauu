<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\Blog;

class Skill extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = ['name','status'];

    public function scopeSearch($query) {
        if($key = request()->key){
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }
    
    public function blog(){
        return $this->hasMany(Blog::class, 'skill_id','skill_id');
    }

}
