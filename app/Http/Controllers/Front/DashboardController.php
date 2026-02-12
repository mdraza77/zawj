<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Opposite gender logic
        $genderToFind = ($user->gender == 'male') ? 'female' : 'male';

        $suggestedMatches = User::where('id', '!=', $user->id)
            // ->where('gender', $genderToFind)
            // ->where('is_verified', true)
            // Yahan hum Admin aur Super Admin ko exclude kar rahe hain
            ->withoutRole(['admin', 'Super Admin'])
            ->limit(5)
            ->get();

        return view('front.dashboard', compact('user', 'suggestedMatches'));
    }
}
