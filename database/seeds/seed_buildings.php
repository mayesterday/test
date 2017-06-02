<?php

use Illuminate\Database\Seeder;

use Faker\Factory as f;

use App\models\dormnamesModel as d;
use App\models\buildingsModel as b;

class seed_buildings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 20;
        $f = f::create();
        for ($i=0; $i < $limit; $i++) {
            $b = new b();
            $dn_id = d::get()->random(1);
            $b->buildingName = $f->state;
            $b->buildingLavel = $f->numberBetween($min = 1,$max=5);
            $b->dn_id = $dn_id->dn_id;
            $b->siteID = $dn_id->siteID;
            $b->save();

        }
    }
}
