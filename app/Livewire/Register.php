<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Profile;
use Illuminate\support\Facades\Log;
use Exception;

class Register extends Component
{
    public $name, $email, $password, $dob;

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'dob' => 'required',
        ]);

        try {
            $user = User::create(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                ]
            );
        } catch (Exception $e) {
            Log::error("user registration failed: " . $e->getMessage());

            session()->flash('error', 'User registration failed');
        }
        if ($user) {

            try{
                Profile::create(
                    [
                        'user_id' => $user->id,
                        'date_of_birth' => $this->dob,
                    ]
                );
            } catch (Exception $e){
                Log::error("profile creation failed: " . $e->getMessage());

                session()->flash('error', 'Profile creation failed');
            }
            
            session()->flash('message', 'User registered successfully');

        }
    }

    public function render()
    {
        return view('livewire.register');
    }
}
