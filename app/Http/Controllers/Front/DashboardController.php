<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Interest;
use App\Models\UserProfile;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $image = UserProfile::where('user_id', Auth::id())->first();

        // Opposite gender logic
        $genderToFind = ($user->gender == 'male') ? 'female' : 'male';

        $suggestedMatches = User::where('id', '!=', $user->id)
            ->where('gender', $genderToFind)
            ->withoutRole(['admin', 'Super Admin'])
            ->get();

        $sentInterests = Interest::where('sender_id', $user->id)
            ->pluck('receiver_id')
            ->toArray();

        return view('front.dashboard', compact(
            'user',
            'suggestedMatches',
            'image',
            'sentInterests'
        ));
    }


    // public function showProfile($id)
    // {
    //     $profileUser = User::withoutRole(['admin', 'Super Admin'])
    //         ->with('profile')
    //         ->findOrFail($id);

    //     return view('front.partner.show', compact('profileUser'));
    // }

    public function showProfile($id)
    {
        $profileUser = User::withoutRole(['admin', 'Super Admin'])
            ->with('profile')
            ->findOrFail($id);

        $alreadySent = Interest::where('sender_id', auth()->id())
            ->where('receiver_id', $profileUser->id)
            ->exists();

        return view('front.partner.show', compact('profileUser', 'alreadySent'));
    }
}
