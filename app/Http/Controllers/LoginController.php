<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login', [
            'title' => 'Login'
        ]);
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // melakukan autentikasi dengan isi variavel credentials
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // jika benar maka redirect ke halaman selanjutnya
            return redirect()->intended('/');
        }
        // jika gagal autentikasi maka memberi flash data
        return back()->with('errLogin', 'ada yang salah nih dicek lagi coba');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
