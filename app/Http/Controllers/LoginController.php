<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            //'email' => ['required', 'email'],
            'name' => ['required'],
            'password' => ['required'],
        ]);
 
        //if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('/');
        }
        
 
        //dd("error en el login");
        return back()->withErrors([
            'name' => 'usuario o contraseña incorrectos',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }

}
