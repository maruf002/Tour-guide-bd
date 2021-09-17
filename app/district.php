<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    public function places(){
        return $this->hasMany('App\place');
    }
}
