<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\userModel as user;

use Validator;
use Session;

class registerCustomerController extends Controller
{
    public function store(Request $r)
    {
        if($r->method() != 'POST') return return response()->json('รูปแบบข้อมูลไม่ถูกต้อง');
        $validator = Validator::make($r->all(),
                                                [
                                                    'email' => 'required|email',
                                                    'password' => 'required|confirmed',
                                                    'firstname' => 'required',
                                                    'lastname' => 'required',
                                                    'pid' => 'required',
                                                    'permission' => 'required'
                                                ]);
        if ($validator->fails()) {
            // NOTE: Response messages validators errors
            return response()->json($validator);
        }else{
            // NOTE: Generator 
            $siteID = str_random( 60 );
            $user = new uses();
            $user->email = $r->email;
            $user->password = $r->password;
            $user->firstname = $r->firstname;
            $user->lastname = $r->lastname;
            $user->pid = $r->pid;
            $user->permission = $r->permission;
            $user->siteID = $siteID;
            $user->save();
            return response()->json('success');
        }
    }
}
