<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class userEditcontroller extends Controller
{
    public function UserUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();
        return response()->json([
            'status' => 200,
            'message' => 'User updated successfully',
            'user' => $user,
        ]);

    }
}
