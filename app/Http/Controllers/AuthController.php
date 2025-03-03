<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\UpdateAuthRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function registre()
    {
        return view('registre');
    }

    public function login()
    {
        return view('login');
    }

    public function store(StoreAuthRequest $request)
    {
        
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role_id'=>$request->role
        ]);
        Auth::Login($user);
        return redirect('/dashboard');
    }

    public function connecter(LoginAuthRequest $request)
    {
        $data = $request->validated();
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect('/reservation');
        }
        return redirect('/registre');
    }
}
