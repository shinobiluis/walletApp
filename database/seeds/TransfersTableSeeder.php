<?php

use Illuminate\Database\Seeder;

class TransfersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Agregamos los datos a la tabla transfers
        DB::table('transfers')->insert([[
            'description' => 'Salary',
            'amount' => '4800',
            'wallet_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],[
            'description' => 'Salary',
            'amount' => '4800',
            'wallet_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]]);
    }
}
