<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        /*  User::create([
            'name' => 'Admin',
            'email' => 'admin@agence3D.com',
            'password' => Hash::make('0000')
        ]); */
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        // Récupérer les credentials validés
        $credentials = $request->validated();

        // Tentative de connexion avec les credentials
        if (Auth::attempt($credentials)) {
            // Regénérer la session pour éviter les attaques de fixation de session
            $request->session()->regenerate();

            // Rediriger vers la page souhaitée après connexion
            return redirect()->intended(route('admin.property.index'));
        }

        // En cas d'échec, renvoyer les erreurs et garder l'email dans l'input
        return back()->withErrors([
            'email' => 'Invalid credentials',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success', 'Vous êtes bien déconnecté...');
    }
}
