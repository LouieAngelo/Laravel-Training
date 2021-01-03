<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title','content','created_at','updated_at'];
    
    public function Users(){
            return $this->hasMany(User::class);
    }
}
