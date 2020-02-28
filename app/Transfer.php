<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    // Creamos la relacion al modelo wallet
    public function wallet(){
        return $this->belongsTo('App\Wallet');
    }
}
