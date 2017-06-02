<?php

use Illuminate\Database\Seeder;



class seed_roomtype extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = new f();
        echo user::all()->random(1);

    }
}
