<?php

use App\Models\Ruangan;
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
        // 
        
        $this->call(RoomTableSeeder::class);

    }
}
