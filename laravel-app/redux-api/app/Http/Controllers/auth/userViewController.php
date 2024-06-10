<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class userViewController extends Controller
{
    public function UserView(){
            $user=User::all();
            if($user !==''){
                return response()->json([
                    "status"=>200,
                    "user"=>$user
                ]);
            }else{
                return response()->json([
                    "status"=>200,
                     "messages"=>'Not Data Fundy'
                ]);
            }
        
        
    }
}
