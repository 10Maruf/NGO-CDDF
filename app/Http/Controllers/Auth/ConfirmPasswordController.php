<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ConfirmPasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showConfirmForm()
    {
        return view('auth.passwords.confirm');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $user = $request->user();

        if (! $user || ! Hash::check($request->string('password'), $user->password)) {
            return back()->withErrors([
                'password' => [__('auth.password')],
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended('/admin/home');
    }
}
