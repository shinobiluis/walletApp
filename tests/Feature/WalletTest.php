<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
/**
 * Importamos los modelos
 */
use App\Wallet;
use App\Transfer;

class WalletTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // Para que la creacion de datos no arroje un error agregamos: use RefreshDatabase;
    use RefreshDatabase;
    
    // Le colocamos el nombre que queramos iniciando con test
    public function testGetWallet()
    {
        /**
         * En este punto usamos los factories $wallt y $transfers
         */

        // Usamos el modelo Wallet y crea información en base de datos
        $wallet = factory(Wallet::class)->create();

        /**
         * Creamos 3 datos en la tabla Transfer y le decimos qu el campo
         * wallet_id sera el que se genero en el factory de arriba ($wallet)
         */
        $transfers = factory(Transfer::class, 3)->create([
            // le decimos que este campo se sustituira con el elemento creado arriba
            'wallet_id' => $wallet->id
        ]);


        /**
         * Realizamos la peticion al api via get y
         * almacenamos en la variable $response.
         */
        $response = $this->json('GET', '/api/wallet');

        //Validamos que la respeusta del servidor sea 200
        $response->assertStatus(200)
                // Especificamos la estructura que debe tener la respuesta
                ->assertJsonStructure([
                    'id', 'money', 'transfers' => [
                        // se pone * por que se espera un arreglo de datos
                        '*' => [
                            'id', 'amount', 'description', 'wallet_id'
                        ]
                    ]
                ]);
        
        /**
         * Probamos cuantos transfers nos estan llegando
         * En este ejemplo le ponemos que deben llegar 3 y que deben
         * llegar dentro de la llave transfer
         */
        $this->assertCount(3, $response->json()['transfers']);
    }
}
