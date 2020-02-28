<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    // Creamos la relacion al modelo trasfer
    public function transfers(){
        return $this->hasMany('App\Transfer');
    }
}
