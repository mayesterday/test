<?php

use Illuminate\Database\Seeder;


use Faker\Factory as f;

use App\models\userModel as user;
use App\models\tenantModel as tenant;
use App\models\roomtypeModel as roomtype;
class seed_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 10;
        $f = f::create();

        // สร้าง username,password โดยไม่ random password
        $this->user($f);
        // NOTE: สร้าง username,password โดย random email,password
        $this->random_user($limit, $f);

    }


    public function FN_roomtype($siteID){

        $array = ['ห้องแอร์','ห้องพัดลม','ห้องติดทะเล','ห้องติดลิฟ'];
        for ($i=0; $i < sizeof($array); $i++) {
            $rt = new roomtype();
            $rt->rt_detail = ($array[$i]);
            $rt->siteID = $siteID;
            $rt->save();
        }
    }





    public function user($f){
        for ($ii=0; $ii < 1 ; $ii++) {
            $gen_siteID = str_random('60');;
            $permis = ['admin','employee','account'];

            for ($i=0; $i < sizeof($permis); $i++) {
                $pid = $f->numberBetween($min = 0 , $max = 9)."-".$f->numberBetween($min = 0000 , $max = 9999).'-'.$f->numberBetween($min = 00000 , $max = 99999).'-'.$f->numberBetween($min = 00 , $max = 99).'-'.$f->numberBetween($min = 0 , $max = 9);
                $user = new user();
                $user->email = $permis[$i]."@test.com";
                $user->password =bcrypt('123456');
                $user->firstname =$f->firstName;
                $user->lastname =$f->lastName;
                $user->pid = $pid;
                $user->permission = $permis[$i];
                $user->siteID = $gen_siteID;
                $user->save();
            }
            $this->FN_roomtype($gen_siteID);

        }
    }


    public function random_user($limit,$f){
        for ($ii=0; $ii < $limit ; $ii++) {

            $gen_siteID = str_random('50');;
            $permis = ['admin','employee','account'];


            for ($i=0; $i < sizeof($permis); $i++) {
                $pid = $f->numberBetween($min = 0 , $max = 9)."-".$f->numberBetween($min = 0000 , $max = 9999).'-'.$f->numberBetween($min = 00000 , $max = 99999).'-'.$f->numberBetween($min = 00 , $max = 99).'-'.$f->numberBetween($min = 0 , $max = 9);
                $user = new user();
                $user->email = $f->email();
                $user->password =bcrypt($f->randomNumber);
                $user->firstname =$f->firstName;
                $user->lastname =$f->lastName;
                $user->pid = $pid;
                $user->permission = $permis[$i];
                $user->siteID = $gen_siteID;
                $user->save();
            }
            $this->FN_roomtype($gen_siteID);

        }
    }
}
