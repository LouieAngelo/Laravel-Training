<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pots extends Model
{

    // I just renames it to Pots since Posts is already existed and associated with other Models. 
    // Posts table is referenced to other section course content //

    protected $fillable = ['name'];

     public function tags(){
         return $this->morphToMany(Tag::class,'taggable');
     }
}
