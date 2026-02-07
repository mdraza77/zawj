<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $Totalusers = User::count();
        return view('admin.dashboard.index', compact('Totalusers'));
    }
}
