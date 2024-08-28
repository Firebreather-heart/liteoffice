<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use Exception;

class RegisterController extends Controller
{
    public $name, $email, $password, $dob;

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'dob' => 'required|date',
        ]);

        try {
            $user = User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]
            );
        } catch (Exception $e) {
            Log::error("user registration failed: " . $e->getMessage());

            session()->flash('error', 'User registration failed');
            return redirect()->back();
        }
        if ($user) {

            try{
                Profile::create(
                    [
                        'user_id' => $user->id,
                        'date_of_birth' => $request->dob,
                    ]
                );
            } catch (Exception $e){
                Log::error("profile creation failed: " . $e->getMessage());

                session()->flash('error', 'Profile creation failed');
                return redirect()->back();
            }
            
            session()->flash('message', 'User registered successfully');

        }
    }

    public function showregform()
    {
        return view('auth.register');
    }
}

