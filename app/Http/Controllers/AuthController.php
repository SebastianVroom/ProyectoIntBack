<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use app\Models\Cliente;
use Illuminate\http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    public function register (Request $request){
        $fields = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password' => 'required|string',
            'telefono'=>'string'
        ]);

        $user = User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password'])
        ]);

        Cliente::create([
            'id' => $user['id'],
            'telefono'=>$fields['telefono']
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }
}