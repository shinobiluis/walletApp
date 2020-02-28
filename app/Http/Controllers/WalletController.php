<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// mandamos a llamar el modelo Wallet
use App\Wallet;

class WalletController extends Controller
{
    /**
     * Creamos la funcion index que es llamada en api.php
     */
    public function index(){
        //Buscamos la información del modelo wallet
        $wallet = Wallet::firstOrFail();
        /**
         * retornamos la información de la busqueda y
         * le dicemos que tambien traiga las relaciones de la trasnfers
         * y le decimos que tambien responda un estatus 200
         */
        return response()->json($wallet->load('transfers'), 200);
    }

    
}
