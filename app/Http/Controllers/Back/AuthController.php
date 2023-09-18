<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\FAcades\Auth;


class AuthController extends Controller
{
    public function login(){
       return view('back.auth.login');
    }

    public function loginPost(Request $request){
        $email = $request->input('email'); // Kullanıcının girdiği e-posta adresini alın
        $password = $request->input('password'); // Kullanıcının girdiği şifreyi alın
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('admin.personal.index');
        }
        return redirect()->route('admin.login')->withErrors('Admin və ya şifrə xətalı!');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
