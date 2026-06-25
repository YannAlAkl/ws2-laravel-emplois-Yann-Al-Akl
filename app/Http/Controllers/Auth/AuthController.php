<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    public function showRegisterForm()
    {
        return view("auth.register");
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "max:255", "email", "unique:users"],
            "password" => ["required", "string", "max:255"],
        ]);

        $user = User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => bcrypt($validated["password"]),
            "role" => "candidat",
        ]);

        return redirect()->route("verification.notice")->with("success", "");
    }

    public function showLoginForm(Request $request)
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            "email" => ["required", "string", "email"],
            "password" => ["required", "string"],
        ]);

        if (!Auth::attempt($validated)) {
            return back()->withErrors([
                "email" => "Les informations fournies ne correspondent pas à nos enregistrements.",
            ])->onlyInput("email", "password");
        }

        $request->session()->regenerate();

        return redirect()->intended(route("emplois.index"))->with("success", "");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route("emplois.index")->with("success", "");
    }

    public function verificationNotice()
    {
        return view('auth.verify-email');
    }

    public function verifierCourriel(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('emplois.index')->with('success', 'Courriel vérifié.');
    }

    public function renvoyerLien(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('success', 'Lien de vérification renvoyé.');
    }
}
