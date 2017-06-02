<?php

namespace App\Http\Controllers\frontEnd\customers\Fn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use App\models\userModel as user;

use Validator;
use Illuminate\Validation\Rule;

class main_function extends Controller
{
    public static function ___FN_getDataLists($id = null)
    {
        $users = user::where('siteID', Session::get('user')['siteID']);

        if ($id == null) {
            $users = $users->get();
        } else {
            $users = $users->where('id', $id)->get();
        }

        return $users;
    }




    public function ___FN_store($r,$id = null)
    {
        $validator = Validator::make($r->all(), $this->rules($r));

        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }

        // --------------------------------------------------------------------
        // INsert Database
        // --------------------------------------------------------------------
        $user = new user();

        if($id != null){
            $user = $user->where('siteID',Session::get('user')['siteID'])->where('id',$id)->first();
        }

        $user->email = $r->email;
        $user->password = $r->password;
        $user->firstname = $r->firstname;
        $user->lastname = $r->lastname;
        $user->pid = $r->pid;
        $user->permission = $r->permission;
        $user->siteID = Session::get('user')['siteID'];
        $user->save();

        return 'success';
    }



    public static function ___FN_delete($id){
        $user = user::where('siteID',Session::get('user')['siteID'])->find($id);
        if( $user != '' || $user != null ){$user->delete();
            return 'success';
        }
        return 'no success';
    }




    protected function rules($r)
    {
        switch ($r->method()) {
                    case 'GET':
                    case 'DELETE':
                    {
                        return [];
                    }
                    case 'POST':
                    {
                        return [
                            'email' => 'required|email',
                            'password' => 'required|confirmed',
                            'firstname' => 'required',
                            'lastname' => 'required',
                            'pid' => 'required',
                            'permission' => 'required'
                        ];
                    }
                    case 'PUT':
                    {
                        return [
                            'email'     => ['email','required',Rule::unique('users')->ignore($r->id)],
                            'password'  => 'required|confirmed',
                            'firstname' => 'required',
                            'lastname'  => 'required',
                            'pid'       => 'required',
                            'permission'=> 'required'
                        ];
                    }

                    default:break;
                }
    }
}
