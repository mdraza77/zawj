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

        $genderToFind = ($user->gender == 'male') ? 'female' : 'male';

        $suggestedMatches = User::role('user')
            ->where('gender', $genderToFind)
            ->where('is_verified', true)
            ->limit(5)
            ->get();

        return view('front.dashboard', compact('user', 'suggestedMatches'));
    }
}
