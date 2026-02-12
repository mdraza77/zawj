<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{
    public function send(Request $request)
    {
        $request->validate(['receiver_id' => 'required|exists:users,id']);

        // Check karein ki kahin user khud ko hi interest toh nahi bhej raha
        if ($request->receiver_id == Auth::id()) {
            return response()->json(['error' => 'You cannot send interest to yourself.'], 400);
        }

        // Interest create ya update karein
        Interest::updateOrCreate(
            ['sender_id' => Auth::id(), 'receiver_id' => $request->receiver_id],
            ['status' => 'pending']
        );

        return response()->json(['success' => 'Alhamdulillah! Interest sent successfully.']);
    }

    // Aayi hui requests (Received) dekhne ke liye
    public function received()
    {
        $user = Auth::user();
        // Jo log interest bheje hain unka data
        $requests = Interest::where('receiver_id', $user->id)
            ->with('sender') // Sender ki profile ke liye
            ->latest()
            ->get();

        return view('front.interests.received', compact('requests', 'user'));
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
