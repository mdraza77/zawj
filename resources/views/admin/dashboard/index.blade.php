@extends('layouts.main')
@section('title', 'Dashboard - Zawj Admin')

@section('content')
    <div class="p-6">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Admin Dashboard Overview</h1>
            <p class="text-sm text-gray-500 mt-1">Manage and monitor your community growth from here.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

            <div
                class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-lg transition-all duration-300">
                <div class="relative z-10 flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Total Members</p>
                        <h3 class="text-3xl font-extrabold text-gray-900 mt-1">{{ $TotalUsers }}</h3>
                        <p class="text-green-500 text-[10px] font-bold mt-2 flex items-center">
                            <i class="bi bi-arrow-up-short text-lg"></i> +12% from last month
                        </p>
                    </div>
                    <div class="bg-pink-100 text-pink-600 p-3 rounded-2xl shadow-inner shadow-pink-200">
                        <i class="bi bi-people-fill text-xl"></i>
                    </div>
                </div>
                <div
                    class="absolute -right-4 -bottom-4 bg-pink-50 h-24 w-24 rounded-full group-hover:scale-150 transition-transform duration-700">
                </div>
            </div>

            <div
                class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-lg transition-all duration-300">
                <div class="relative z-10 flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Verified Profiles</p>
                        <h3 class="text-3xl font-extrabold text-gray-900 mt-1">{{ $TotalVerfiedUsers }}</h3>
                        <p class="text-blue-500 text-[10px] font-bold mt-2 italic flex items-center">
                            <i class="bi bi-patch-check-fill mr-1"></i> 77% Accuracy
                        </p>
                    </div>
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-2xl shadow-inner shadow-blue-200">
                        <i class="bi bi-shield-check text-xl"></i>
                    </div>
                </div>
                <div
                    class="absolute -right-4 -bottom-4 bg-blue-50 h-24 w-24 rounded-full group-hover:scale-150 transition-transform duration-700">
                </div>
            </div>

            <div
                class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-lg transition-all duration-300">
                <div class="relative z-10 flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Pending KYC</p>
                        <h3 class="text-3xl font-extrabold text-gray-900 mt-1">12</h3>
                        <p class="text-orange-500 text-[10px] font-bold mt-2 flex items-center">
                            <i class="bi bi-exclamation-triangle-fill mr-1"></i> Needs Attention
                        </p>
                    </div>
                    <div class="bg-orange-100 text-orange-600 p-3 rounded-2xl shadow-inner shadow-orange-200">
                        <i class="bi bi-hourglass-split text-xl"></i>
                    </div>
                </div>
                <div
                    class="absolute -right-4 -bottom-4 bg-orange-50 h-24 w-24 rounded-full group-hover:scale-150 transition-transform duration-700">
                </div>
            </div>

            <div
                class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-lg transition-all duration-300">
                <div class="relative z-10 flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Shadi Matches</p>
                        <h3 class="text-3xl font-extrabold text-gray-900 mt-1">{{ $TotalMatches }}</h3>
                        <p class="text-purple-500 text-[10px] font-bold mt-2 flex items-center font-bold">
                            <i class="bi bi-heart-fill mr-1"></i> Zawj Success Stories
                        </p>
                    </div>
                    <div class="bg-purple-100 text-purple-600 p-3 rounded-2xl shadow-inner shadow-purple-200">
                        <i class="bi bi-balloon-heart-fill text-xl"></i>
                    </div>
                </div>
                <div
                    class="absolute -right-4 -bottom-4 bg-purple-50 h-24 w-24 rounded-full group-hover:scale-150 transition-transform duration-700">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-white rounded-3xl border border-gray-100 shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h4 class="font-bold text-gray-800 tracking-tight text-lg">New Registrations Flow</h4>
                    <select class="text-xs border-gray-200 rounded-lg bg-gray-50 focus:ring-pink-500">
                        <option>Last 7 Days</option>
                        <option>Last 30 Days</option>
                    </select>
                </div>
                <div
                    class="h-64 flex items-center justify-center bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200 text-gray-400 italic">
                    Analytics Chart will be loaded here...
                </div>
            </div>

            <div class="lg:col-span-1 bg-white rounded-3xl border border-gray-100 shadow-sm p-6">
                <h4 class="font-bold text-gray-800 tracking-tight text-lg mb-4">Urgent Actions</h4>
                <div class="space-y-4">
                    <div
                        class="flex items-center gap-4 p-3 hover:bg-pink-50 rounded-2xl transition group cursor-pointer border border-transparent hover:border-pink-100">
                        <div
                            class="bg-pink-600 text-white h-10 w-10 flex items-center justify-center rounded-xl font-bold shadow-lg shadow-pink-200">
                            12</div>
                        <div>
                            <p class="text-xs font-bold text-gray-800">Review KYC Requests</p>
                            <p class="text-[10px] text-gray-500">Ahmed, Fatima and 10 others...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
