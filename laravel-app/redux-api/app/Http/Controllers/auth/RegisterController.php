<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Providers\AppServiceProvider;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Promise\Create;

class RegisterController extends Controller
{
    public function UserRegister(Request $request){
        $user=User::Create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>Hash::make($request->password)
        ]);

        $token=$user->createToken('Token')->accessToken ;

      return  response()->json([
          'status'=>200,
          'user'=>$user,
          'token'=>$token
        ]);
    }
    public function UserLogin(Request $request){
       $User=User::where('email',$request->email)->first();
        $token=$User->createToken('Token')->accessToken;

        if (!$User || !Hash::check($request->password,$User->password) ) {
            return response([
             "Error"=> "Not Match Email Or password"
            ],401);
         }
          $token=$User->createToken('Token')->accessToken ;
           return response([
             'message'=>"successfull Login",
              'user'=>$User,
              'token'=>$token
           ],200);
      
    }
}
