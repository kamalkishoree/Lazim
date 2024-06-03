<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {

        $credentials = $request->only("email","password");
        if(Auth::attempt($credentials)){
            $token = Auth::user()->createToken("appTunix")->accessToken;
            $response = ['data'=>['token'=>  $token ,'message'=>'login success']];
            return response()->json($response,200);
        }
        else
        {
            $response = ['data'=>['token'=>'','message'=>'wrong credentials faileed']];
            return response()->json($response,401);
        }
    }

    public function logout(LoginRequest $request)
    {
       $user =  Auth::user()->token();

       $result =$user->revoke();
       if($result)
       {
        $response = ['data'=>['message'=>'user logged out']];
            return response()->json($response,200);
       }
       else
       {
        $response = ['data'=>['message'=>'not able to  log out']];
        return response()->json($response,400);
       }

    }
}
