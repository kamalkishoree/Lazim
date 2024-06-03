<?php

namespace App\Http\Controllers\Web\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
      return view("login");
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
         $credentials = $request->only('email', 'password');
         $remember =true;
         if (Auth::attempt($credentials, $remember)) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('error', 'Wrong Credentials');
            }
        }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login.index');
    }



    public function signup(Request $request)
    {
      return view('user.signup');
    }

    public function createUser(CreateUserRequest $request)
    {

        $data = [
            'name' => $request->input('name'),
            'email'=> $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        // echo "<pre>";
        // print_r($request->all());
        // die;
        $user = User::create($data);
        if($user)
        {
            return redirect()->route('user.login.index')->with('success','user created successfuly.');
        } else {
            return redirect()->back()->with('error', 'user not created');
        }

    }

}

