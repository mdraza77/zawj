<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Interest;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Opposite gender logic
        $genderToFind = ($user->gender == 'male') ? 'female' : 'male';

        $suggestedMatches = User::where('id', '!=', $user->id)
            ->where('gender', $genderToFind)
            // ->where('is_verified', true)
            ->withoutRole(['admin', 'Super Admin'])
            // ->limit(5)
            ->get();

        return view('front.dashboard', compact('user', 'suggestedMatches'));
    }

    public function showProfile($id)
    {
        $profileUser = User::withoutRole(['admin', 'Super Admin'])->findOrFail($id);

        return view('front.partner.show', compact('profileUser'));
    }

    // public function sendInterest(Request $request)
    // {
    //     $user = Auth::user();

    //     $interest = Interest::updateOrCreate(
    //         [
    //             'sender_id' => $user->id,
    //             'receiver_id' => $request->receiver_id,
    //         ],
    //         ['status' => 'pending']
    //     );

    //     return response()->json(['success' => 'Interest sent successfully!']);
    // }
}
