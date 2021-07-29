<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePersonalProfileRequest;
use App\Models\PersonalProfile;
use Illuminate\Support\Facades\Auth;

class PersonalProfileController extends Controller
{
    public function show(PersonalProfile $profile)
    {
        return view('personal_profile', ['profile' => $profile]);
    }

    public function edit(PersonalProfile $profile)
    {
        $this->authorize('update', $profile);

        return view('personal_profile_edit', ['profile' => $profile]);
    }

    public function update(
        UpdatePersonalProfileRequest $request,
        PersonalProfile $profile
    ) {
        $this->authorize('update', $profile);

        $validatedData = $request->all();

        $profile->update([
            'birthday' => $validatedData['birthday'],
            'address' => $validatedData['address'],
            'about' => $validatedData['about'],
            'phone_number' => $validatedData['phone_number'],
        ]);

        $profile->user->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
        ]);

        return redirect()->route('profiles.show', ['profile' => $profile]);
    }

    public function destroy(PersonalProfile $profile)
    {
        $this->authorize('delete', $profile);

        $user = $profile->user;
        $profile->delete();
        Auth::logout();
        $user->delete();

        return redirect()->route('login');
    }
}
