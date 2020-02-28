<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Wallet;
use App\Transfer;

class TransferTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // Para que la creacion de datos no arroje un error agregamos: use RefreshDatabase;
    use RefreshDatabase;

    public function testPostTransfer()
    {
        $wallet = factory(Wallet::class)->create();
        $transfer = factory(Transfer::class)->create();

        // Le decimos que mandara datos por a la api con json
        $response = $this->json('POST', '/api/transfer', [
            'description' => $transfer->description,
            'amount' => $transfer->amount,
            'wallet_id' => $transfer->id
        ]);

        // Realizamos validaciones
        $response->assertJsonStructure([
            'id','description','amount','wallet_id'
        ])->assertStatus(201);

        $this->assertDatabaseHas('transfers', [
            'description' => $transfer->description, 
            'amount' => $transfer->amount, 
            'wallet_id' => $transfer->id
        ]);
        
        $this->assertDatabaseHas('wallets', [
            'id' =>$wallet->id,
            'money' => $wallet->money + $transfer->amount
        ]);
    }
}
