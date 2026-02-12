<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Interest;

class DashboardController extends Controller
{
    public function index()
    {
        $TotalUsers = User::withoutRole(['admin', 'Super Admin'])->count();
        $TotalVerfiedUsers = User::withoutRole(['admin', 'Super Admin'])
            ->where('is_verified', 1) // Identity verified check
            ->whereNotNull('phone_verified_at') // Phone verification check
            ->whereNotNull('email_verified_at') // Email verification check
            ->count();
        $TotalMatches = Interest::where('status', 'accepted')->count();
        return view('admin.dashboard.index', compact('TotalUsers', 'TotalVerfiedUsers', 'TotalMatches'));
    }
}
