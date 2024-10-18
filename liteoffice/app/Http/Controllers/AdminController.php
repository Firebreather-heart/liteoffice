<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasRole('admin')) {
                \Log::info('user '. $credentials['email']. ' logged in');
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                \Log::warning('Failed non-admin user, Admin login attempt by ' . $credentials['email']);
                return redirect()->route('admin.login')->withErrors('You are not an admin');
            }
        } else {
            return redirect()->route('admin.login')->withErrors('Invalid credentials');
        }
    }

    public function users()
    {
        $users = User::all();

        return view('admin.users.all', compact('users'));
    }

    public function profiles(){
        $profiles = Profile::all();
        return view('admin.users.profiles', compact('profiles'));
    }

    public function create_user()
    {
        return view('admin.users.create');
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.all')->with('success', 'User created successfully');
    }

    public function edit_user(Request $request, User $user)
    {
        $request->validate([
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email',
            'password' => 'sometimes|required',
        ]);

        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('admin.users.all')->with('success', 'User updated successfully');
    }

    public function destroy_user(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }

}
