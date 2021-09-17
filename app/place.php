<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class place extends Model
{
    public function district(){
        return $this->belongsTo('App\district');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
