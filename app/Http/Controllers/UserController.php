<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Gig;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function registration(Request $request)
    {
        $data = $request->validate([
            'name' => "required|min:3",
            'email' => "required|email",
            'password' => "required|confirmed|min:4"
        ]);

        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        Auth::login($user);
        return redirect()->route('index');
    }

    public function login()
    {
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        $attempt = Auth::attempt($credentials);

        if ($attempt) {
            $request->session()->regenerate();
            $request->session()->regenerateToken();
            return redirect()->route('manage');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        if (auth()->check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('index');
        }
    }

    public function manage(Gig $gigs, User $user)
    {
        $gigs = $user->with('gigs')->find(auth()->id());
        return view('user.manage', ['gigs' => $gigs]);
    }
}
