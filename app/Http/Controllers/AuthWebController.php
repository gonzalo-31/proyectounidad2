<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthWebController extends Controller
{
    
    public function mostrarRegistro()
    {
        return view('auth.register');
    }



    public function registrar(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        return redirect()->route('proyectos.index');
    }


   
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('proyectos.index');
        }
        return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
    }
 
      public function mostrarLogin()
    {
       return view('auth.login');
    }
 
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
