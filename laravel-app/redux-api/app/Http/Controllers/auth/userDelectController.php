<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class userDelectController extends Controller
{
    public function UserDelect($id){
        $user=User::findOrFail($id);
        $user->softDeletes();


        return response()->json([
            'status' => 200,
            'message' => 'User Delect  successfully',
        ]);
    }
}
