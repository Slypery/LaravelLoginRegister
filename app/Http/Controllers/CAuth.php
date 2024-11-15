<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CAuth extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $userdata = User::findByEmailOrUsername($request->email_username);
        if ($userdata) {
            $credential = [
                'username' => $userdata->username,
                'password' => $request->password
            ];

            if (Auth::attempt($credential)) {
                switch ($userdata->role) {
                    case 'admin':
                        return redirect()->route('admin.index');
                        break;
                    case 'staff':
                        return redirect()->route('staff');
                        break;
                    case 'user':
                        return redirect()->route('user');
                        break;
                }
            }
        }
        return back()->with('msg', 'datanya gak pas kang!');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.index')->with('msg', 'berhasil logout!');
    }
    public function register(){
        return view('register');
    }
    public function do_register(Request $request){
        $request->validate([
            'username' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);
        $data = $request->only('username', 'email', 'password');
        $data['role'] = 'user';
        User::create($data);
        return redirect()->route('auth.index')->with('msg', 'akun berhasil dibuat!');
    }
}
