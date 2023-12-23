<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginStoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $cred = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if (!Auth::attempt($cred)) {

            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Такого email не существует',
                ]);

        }
        return redirect()->intended(RouteServiceProvider::HOME);

    }
}
