<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(){
        $user = auth()->user();

        return view('profile.show', ['user' => $user]);
        
    }

    public function save(Request $request){
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'date',
        ]);

        $user = Auth::user();
        $profile = $user->profile;

        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->business_id = $user->business_id; 
            $profile->employer_id = $user->employer_id; 
        }

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $profile->avatar = $avatarPath;
        }

        $profile->about = $request->input('about');
        $profile->phone = $request->input('phone');
        $profile->address = $request->input('address');
        $profile->date_of_birth = $request->input('date_of_birth');

        $profile->save();

        return redirect()->route('profile.show')->with('status', 'Profile saved successfully.');
    }

    // public function store(){
    //     $data = requ
    // }

}
