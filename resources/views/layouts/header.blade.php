@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="space-y-6">
        <div
            class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Zawj Admin Overview</h1>
                <p class="text-sm text-gray-500">Welcome back! Here is what's happening with the community today.</p>
            </div>
            <div class="flex gap-2">
                <button
                    class="bg-pink-600 text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-pink-700 transition shadow-lg shadow-pink-100">
                    <i class="bi bi-download mr-2"></i> Export Report
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:border-pink-200 transition">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-pink-50 rounded-xl text-pink-600">
                        <i class="bi bi-people-fill text-xl"></i>
                    </div>
                    <span class="text-green-500 text-xs font-bold">+12%</span>
                </div>
                <h3 class="text-gray-500 text-xs font-bold uppercase tracking-widest">Total Members</h3>
                <p class="text-2xl font-extrabold text-gray-900 mt-1">1,284</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:border-blue-200 transition">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-blue-50 rounded-xl text-blue-600">
                        <i class="bi bi-patch-check-fill text-xl"></i>
                    </div>
                    <span class="text-blue-500 text-xs font-bold">85% Verified</span>
                </div>
                <h3 class="text-gray-500 text-xs font-bold uppercase tracking-widest">Verified Profiles</h3>
                <p class="text-2xl font-extrabold text-gray-900 mt-1">1,092</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:border-orange-200 transition">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-orange-50 rounded-xl text-orange-600">
                        <i class="bi bi-hourglass-split text-xl"></i>
                    </div>
                    <span class="text-orange-500 text-xs font-bold italic underline">Action Needed</span>
                </div>
                <h3 class="text-gray-500 text-xs font-bold uppercase tracking-widest">Pending KYC</h3>
                <p class="text-2xl font-extrabold text-gray-900 mt-1">45</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:border-purple-200 transition">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-purple-50 rounded-xl text-purple-600">
                        <i class="bi bi-heart-fill text-xl"></i>
                    </div>
                    <span class="text-gray-400 text-[10px]">Active Today</span>
                </div>
                <h3 class="text-gray-500 text-xs font-bold uppercase tracking-widest">Successful Matches</h3>
                <p class="text-2xl font-extrabold text-gray-900 mt-1">214</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                    <h3 class="font-bold text-gray-900">Recent Registrations (West Bengal)</h3>
                    <a href="#" class="text-pink-600 text-xs font-bold hover:underline">View All Users</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 text-[10px] uppercase text-gray-400 font-bold">
                            <tr>
                                <th class="px-6 py-3">User</th>
                                <th class="px-6 py-3">Location</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3">Date</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($recentUsers ?? [] as $user)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4 flex items-center gap-3">
                                        <img class="h-8 w-8 rounded-full"
                                            src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}">
                                        <span class="font-medium text-gray-700">{{ $user->name }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500">{{ $user->district ?? 'N/A' }}</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2 py-1 rounded-full text-[10px] font-bold bg-orange-100 text-orange-600 uppercase">Pending</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-400">Today</td>
                                    <td class="px-6 py-4">
                                        <button class="text-pink-600 hover:text-pink-800"><i class="bi bi-eye"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-10 text-center text-gray-400 italic">No new users registered
                                        today.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-4">Verification Queue</h3>
                    <div class="space-y-4">
                        <div
                            class="flex items-start gap-4 p-3 rounded-xl hover:bg-gray-50 border border-transparent hover:border-gray-100 transition cursor-pointer">
                            <div class="bg-pink-100 text-pink-600 p-2 rounded-lg">
                                <i class="bi bi-file-earmark-person"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-800">New Aadhaar Uploaded</p>
                                <p class="text-[10px] text-gray-500">User: Ahmed Khan from Malda</p>
                            </div>
                        </div>
                    </div>
                    <button
                        class="w-full mt-6 py-2 border-2 border-dashed border-gray-200 rounded-xl text-xs font-bold text-gray-400 hover:border-pink-300 hover:text-pink-600 transition">
                        Open KYC Center
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
