<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','registration','logout','me']]);
    }
    public function registration(Request $request){
    try {        
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);    
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->input('password'))
        ]);
        return response()->json(['message'=>'berhasil registrasi'],200);
    } catch (\Throwable $th) {
        return response()->json(['message'=>'error','error'=>$th->getMessage()]);
    }
    }
    public function login(){
        try {
            $credentials = request(['email','password']);
            if(!$token = Auth::attempt($credentials)){
                return response()->json(['message'=>'gagal login'],401);
            }
            return $this->respondWithToken($token);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()]);
        }
    }
    public function me(){
        try {
            return response()->json(Auth::user());
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()]);
        }
    }
    public function refresh(){
        try {
            return $this->respondWithToken(Auth::refresh());
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()]);
        }
    }
    public function respondWithToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>Auth::factory()->getTTL() * 60
        ]);
    }
    public function logout(){
        try {
            Auth::logout();
            return response()->json(['message'=>'berhasil logout']);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()]);
        }
    }
}
