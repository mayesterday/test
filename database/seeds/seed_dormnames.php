<?php

use Illuminate\Database\Seeder;

use Faker\Factory as f;

use App\models\dormnamesModel as dn;
use App\models\userModel as user;


class seed_dormnames extends Seeder
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
            $siteID = user::select('siteID')->get()->random(1)->siteID;
            $dn = new dn();
            $dn->dn_name = $f->firstNameFemale;
            $dn->changwat = 1;
            $dn->amphoe = 1;
            $dn->tambon = 1;
            $dn->zipcode = 40000;
            $dn->dn_phone = $f->phoneNumber;
            $dn->dn_email = $f->email;
            $dn->dn_paymentEndDate = $f->numberBetween($min = 0,$max = 30);
            $dn->dn_amercement = $f->numberBetween($min = 10,$max = 1000);
            $dn->siteID = $siteID;
            $dn->save();


        }


    }
}
