<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(seed_users::class);
        $this->call(seed_dormnames::class);
        $this->call(seed_buildings::class);

    }
}
