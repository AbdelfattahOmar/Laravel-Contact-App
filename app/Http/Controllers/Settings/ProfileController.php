<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('settings.profile', [
            'user' => auth()->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $profile_data =  $request->validated();
        $profile = $request->user();

        if ($request->hasFile('profile_picture')) {
            $picture = $request->profile_picture;
            $picture->move(public_path('upload'), $fileName = "profile-pic-{$profile->id}." . $picture->getClientOriginalExtension());
            $profile_data['profile_picture'] = $fileName;
        }
        $profile->update($profile_data);

        return back()->with('success', 'Profile updated successfully');
    }
}
