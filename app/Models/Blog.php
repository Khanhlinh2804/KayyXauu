<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Blog extends Model
{
     use HasFactory, softDeletes;
    protected $fillable = [ 'name', 'summary', 'content','tag',   'image', 'status', 'author','skill_id','size'];

    public function scopeSearch($query) {
        if($key = request()->key){
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }

    public function skill(){
        return $this->hasOne(Skill::class, 'id', 'skill_id');
    }
}
