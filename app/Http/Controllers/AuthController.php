<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $proses = $request->only('username', 'password');
        if (Auth::attempt($proses)) {
            $request->session()->regenerate();
            $user = Auth::User();
            if ($user->level == 'admin') {
                return redirect()->route('dashboard');
            } else {
                $request->session()->flash('cek', 'Silahkan cek username dan password');
                return back();
            }
        } else {
            $request->session()->flash('blokir', 'Maaf akun anda sudah terblokir');
            return redirect('/login');
        };
        // $password = $request->password;
        // $proses_login = User::where('username', $request->username)->first();

        // if ($proses_login) {
        //     if (Crypt::decrypt($proses_login->password) == $password) {
        //         Auth::login($proses_login);
        //         if ($proses_login->status == 'admin') {
        //             return redirect()->route('dashboard');
        //         } else {
        //             $request->session()->flash('cek', 'Silahkan cek username dan password');
        //             return back();
        //         }
        //     } else {
        //         $request->session()->flash('gagal', 'username dan password salah');
        //         return redirect('/');
        //     }
        // } else {
        //     $request->session()->flash('blokir', 'Maaf akun anda sudah terblokir');
        //     return redirect('/');
        // }
    }

    public function logout($id)
    {
        // dd($id);
        date_default_timezone_set('Asia/Jakarta');
        $date = date('d-m-Y H:i:s');
        User::where('id_user', $id)->update([
            'last_login' => $date
        ]);
        Auth::logout(); // menghapus session yang aktif
        session()->flush();
        return redirect()->route('/');
    }
}
