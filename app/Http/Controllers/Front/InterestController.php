<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;

class InterestController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id'
        ]);

        if (auth()->id() == $request->receiver_id) {
            return response()->json(['error' => 'Invalid action'], 400);
        }

        $exists = Interest::where('sender_id', auth()->id())
            ->where('receiver_id', $request->receiver_id)
            ->exists();

        if ($exists) {
            return response()->json(['error' => 'Interest already sent'], 422);
        }

        Interest::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'status' => 'pending'
        ]);

        return response()->json(['success' => 'Interest sent successfully']);
    }


    // Aayi hui requests (Received) dekhne ke liye
    // public function received()
    // {
    //     $user = Auth::user();
    //     $image = UserProfile::where('user_id', Auth::id())->first();

    //     // Fetching interests where current user is the receiver
    //     $requests = Interest::where('receiver_id', $user->id)
    //         ->with('sender',) // Eloquent relationship to get sender details
    //         ->latest()
    //         ->get();

    //     return view('front.user.received_interests', compact('requests', 'user', 'image'));
    // }

    public function received()
    {
        $requests = auth()->user()
            ->receivedInterests()
            ->with(['sender.profile']) // nested eager loading
            ->latest()
            ->get();

        return view('front.user.received_interests', compact('requests'));
    }

    // Status Update (Accept/Decline)
    public function updateStatus(Request $request)
    {
        $interest = Interest::where('receiver_id', Auth::id())
            ->where('id', $request->interest_id)
            ->firstOrFail();

        $interest->update(['status' => $request->status]); // 'accepted' or 'declined'

        return back()->with('success', 'Request ' . $request->status . ' successfully.');
    }
}
