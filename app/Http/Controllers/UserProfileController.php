<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $image = UserProfile::where('user_id', Auth::id())->first();
        return view('front.user.my-profile.create', compact('image'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_public' => 'nullable|boolean',
        ]);

        // 1. Pehle purani profile entry dhoondo
        $existingProfile = UserProfile::where('user_id', $user->id)->first();

        // 2. Agar purani image file hai, toh use storage se delete karo
        if ($existingProfile && $existingProfile->image_path) {
            Storage::disk('public')->delete($existingProfile->image_path);
        }

        // 3. Nayi image store karo
        $imagePath = $request->file('image_path')->store('profile_images', 'public');

        // 4. updateOrCreate logic: user_id ke basis pe update ya create karega
        UserProfile::updateOrCreate(
            ['user_id' => $user->id], // Isse dhoondega
            [                         // Isse update karega
                'image_path' => $imagePath,
                'is_public'  => $request->has('is_public'),
            ]
        );

        return redirect()
            ->route('my-profile.create')
            ->with('success', 'Profile image updated successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
