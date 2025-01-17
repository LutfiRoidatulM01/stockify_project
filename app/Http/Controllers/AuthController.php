<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        return view('pages.authentication.sign-in', compact('user'));
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            ActivityLogHelper::log('Berhasil login sebagai ' . Auth::user()->role);

            if (Auth::user()->role == 'admin') {
                return redirect()->route('index-admin.index'); 
            } elseif (Auth::user()->role == 'manajer_gudang') {
                return redirect()->route('index-manajer_gudang.index'); 
            } elseif (Auth::user()->role == 'staff_gudang') {
                return redirect()->route('index-staff_gudang.index'); 
            } 
        }

        return back()->withErrors([
            'email' => 'Email Atau Password yang Anda Masukkan Tidak Sesuai!!',
        ]);
    }

    function logout(){

        ActivityLogHelper::log('Berhasil logout');
        Auth::logout();
        return redirect()->route('login');
    }
}
