<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('index-admin'); 
            } elseif (Auth::user()->role == 'manajer_gudang') {
                return redirect()->route('index-manajer_gudang'); 
            } elseif (Auth::user()->role == 'staff_gudang') {
                return redirect()->route('index-staff_gudang'); 
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
