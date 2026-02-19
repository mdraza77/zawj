@extends('layouts.front')

@section('title', 'Received Interests')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-2xl font-black text-slate-800 tracking-tight">Interest Requests</h1>
            <p class="text-sm text-slate-400 font-medium">Manage people who are interested in your profile.</p>
        </div>

        @if (session('success'))
            <div
                class="mb-6 p-4 bg-green-50 border border-green-100 text-green-600 rounded-2xl text-sm font-bold animate-pulse">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="space-y-4">
            @forelse($requests as $request)
                <div class="bg-white rounded-[2rem] border border-slate-100 p-6 shadow-sm hover:shadow-md transition group">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">

                        <div class="flex items-center gap-4">
                            <div class="relative">
                                {{-- <img class="h-16 w-16 rounded-2xl object-cover ring-4 ring-pink-50"
                                    src="https://ui-avatars.com/api/?name={{ urlencode($request->sender->name) }}&background=fdf2f8&color=db2777"> --}}

                                @php
                                    $sender = $request->sender;

                                    $defaultAvatar =
                                        'https://ui-avatars.com/api/?name=' .
                                        urlencode($sender->name) .
                                        '&background=fdf2f8&color=db2777';

                                    $senderImage =
                                        $sender->profile && $sender->profile->image_path && $sender->profile->is_public
                                            ? asset('storage/' . $sender->profile->image_path)
                                            : $defaultAvatar;
                                @endphp

                                <img src="{{ $senderImage }}"
                                    class="h-16 w-16 rounded-2xl object-cover ring-4 ring-pink-50"
                                    alt="{{ $sender->name }}">
                                @if ($request->sender->is_verified)
                                    <div
                                        class="absolute -bottom-1 -right-1 bg-blue-500 text-white p-1 rounded-lg border-2 border-white shadow-sm">
                                        <i class="fas fa-check text-[8px]"></i>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 group-hover:text-pink-600 transition">
                                    {{ $request->sender->name }}</h4>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                                    {{ $request->sender->district ?? 'West Bengal' }}</p>
                                <div class="mt-1 flex items-center gap-2">
                                    <span
                                        class="text-[10px] px-2 py-0.5 bg-slate-50 text-slate-500 rounded-md font-bold uppercase">Sent
                                        {{ $request->created_at->diffForHumans() }}</span>
                                    <span
                                        class="text-[10px] px-2 py-0.5 {{ $request->status == 'pending' ? 'bg-orange-50 text-orange-600' : ($request->status == 'accepted' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600') }} rounded-md font-bold uppercase">
                                        {{ $request->status }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('profile.show', $request->sender->id) }}"
                                class="px-4 py-2 text-xs font-bold text-slate-500 hover:text-pink-600 transition">View
                                Profile</a>

                            @if ($request->status == 'pending')
                                <form action="{{ route('interest.update') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="interest_id" value="{{ $request->id }}">
                                    <input type="hidden" name="status" value="declined">
                                    <button type="submit"
                                        class="px-5 py-2 bg-slate-50 text-slate-600 rounded-xl text-xs font-bold hover:bg-red-50 hover:text-red-600 transition">Decline</button>
                                </form>

                                <form action="{{ route('interest.update') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="interest_id" value="{{ $request->id }}">
                                    <input type="hidden" name="status" value="accepted">
                                    <button type="submit"
                                        class="px-8 py-3 bg-pink-600 text-white rounded-xl text-xs font-black shadow-lg shadow-pink-100 hover:bg-pink-700 transition transform hover:-translate-y-0.5 uppercase tracking-wider">Accept
                                        Request</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-[2.5rem] border border-dashed border-slate-200 p-16 text-center">
                    <div
                        class="w-20 h-20 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart-crack text-3xl"></i>
                    </div>
                    <h3 class="text-slate-800 font-bold">No interests yet</h3>
                    <p class="text-slate-400 text-sm mt-1">Complete your profile to get more visibility!</p>
                    <a href="{{ route('dashboard') }}"
                        class="mt-6 inline-block text-pink-600 font-bold text-xs hover:underline">Explore Profiles</a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
