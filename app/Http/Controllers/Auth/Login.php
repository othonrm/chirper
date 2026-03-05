<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|max:255|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($validated, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $user = Auth::user();

            return redirect('/')->with('success', "Welcome to Chirper, {$user->name}!");
        }

        return back()
            ->withErrors(['email' => 'Your credentials are probably wrong, try again or just signup.'])
            ->onlyInput('email');
    }
}
