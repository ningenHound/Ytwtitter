<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\View\View;

class RegisterController extends Controller
{

    public function create(): View
    {
        return view('register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:150'],
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:150', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
            'date_birth' => ['date'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_birth' => $request->date_birth,
            'sex' => $request->sex
        ]);

        //event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}
