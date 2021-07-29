<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\PersonalProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            // TODO: Redirect to personal profile page
            return redirect()->route('index');
        }

        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->createNewUser($validatedData);
        $this->createNewProfile($user->id);

        return redirect()->route('login');
    }

    /**
     * Create a new user instance after a valid registration
     */
    private function createNewUser(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Create a new profile for new user
     */
    private function createNewProfile($user_id)
    {
        $profile = new PersonalProfile();
        $profile->user_id = $user_id;
        $profile->save();

        return $profile;
    }
}
