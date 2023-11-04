<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class authController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
           
            return response()->json(['errors' => $validator->errors()], 400);
        }
    try {

        $date = Carbon::now();
        $delete_acconunt = Carbon::now();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->next_expiration = $date->addDays(15);
        $user->delete_acconunt = $delete_acconunt->addDays(30);
        $user->save();

        if ($user->id) {
            return response()->json([
                'access_token' => $user->createToken('auth-api')->accessToken
            ], 200);
        }
    
        return response()->json(['error' => 'Erro ao cadastrar Usuario'], 400);

    }  catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()], 500);
    }

    }
}
