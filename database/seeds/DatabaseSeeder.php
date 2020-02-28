<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Mandamos a llamar los seeders
         * recuerda que primero se debe crear wallets 
         * y al final Trasnsfers
         */
        $this->call(WalletsTableSeeder::class);
        $this->call(TransfersTableSeeder::class);
    }
}
