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
        // 1. Validation
        $request->validate([
            'receiver_id' => 'required|exists:users,id'
        ]);

        // 2. Self-interest check
        if (auth()->id() == $request->receiver_id) {
            return response()->json(['error' => 'Khudi ko interest nahi bhej sakte!'], 400);
        }

        // 3. Save to database
        \App\Models\Interest::updateOrCreate(
            ['sender_id' => auth()->id(), 'receiver_id' => $request->receiver_id],
            ['status' => 'pending']
        );

        return response()->json(['success' => 'Interest sent successfully!']);
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
