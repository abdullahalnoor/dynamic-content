<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
