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

class loginController extends Controller
{
    public function UserLogin(Request $request)
    {
        $User = User::where('email', $request->email)->first();
        // $token = $User->createToken('Token')->accessToken;
        if (!$User) {
            return response([
                "Error" => "Not Match Email"
            ], 401);
        } elseif (!$User || !Hash::check($request->password, $User->password)) {
            return response([
                "Error" => "Not Match password"
            ], 401);
        }

        $token = $User->createToken('Token')->accessToken;
        return response([
            'message' => "successfull Login",
            'user' => $User,
            'token' => $token
        ], 200);

    }
}
