<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\ElseIf_;

class AuthController extends Controller{
    public function register (Request $request){
        $fields = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password' => 'required|string',
            'telefono'=>'string|nullable'
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

        $token = $user->createToken('myapptoken',['clientToken'])->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }
    public function login(Request $request){
        $fields = $request->validate([
            'email'=>'required|string',
            'password' => 'required|string',
        ]);
        
        $user=User::where('email',$fields['email'])->first();
        
        if(!$user || !Hash::check($fields['password'],$user->password)){
            return response([
                'message'=>'bad login info'
            ],401
        );
        }

        if(DB::table('administradores')->where('id',$user->id)->exists()){
            $type = 'adminToken';
        }elseif (DB::table('responsables')->where('id',$user->id)->exists()){
            $type = 'responsableToken';
        }elseif(DB::table('empleados')->where('id',$user->id)->exists()){
            $type = 'empleadoToken';
        }elseif(DB::table('clientes')->where('id',$user->id)->exists()){
            $type = 'clienteToken';
        }

        $token = $user->createToken('myapptoken',[$type])->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token,
            'userType'=>$type
        ];
        return response($response,201);
    }
    public function logout(){
        request()->user()->tokens()->delete();

        return [
            'message'=>'Logged out'
        ];
    }
}