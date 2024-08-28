<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.login');
        } elseif ($request->isMethod('post')) {
            return $this->authenticate($request);
        }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            if (Auth::user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'You are not an admin');
            }
        }
        return redirect()->route('admin.login')->with('error', 'Invalid credentials');
    }
}
