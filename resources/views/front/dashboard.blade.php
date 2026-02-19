@extends('layouts.front')

@section('title', 'My Dashboard')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

        <aside class="lg:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                <div class="relative inline-block">
                    @php
                        $defaultAvatar =
                            'https://ui-avatars.com/api/?name=' .
                            urlencode(auth()->user()->name) .
                            '&background=fdf2f8&color=db2777&size=200';
                        $currentImage = isset($image->image_path)
                            ? asset('storage/' . $image->image_path)
                            : $defaultAvatar;
                    @endphp
                    <a href="{{ route('my-profile.create') }}">
                        <img class="h-24 w-24 rounded-full mx-auto object-cover ring-4 ring-pink-50"
                            src="{{ $currentImage }}">
                    </a>
                    @if ($user->is_verified)
                        <div class="absolute bottom-0 right-0 bg-blue-500 text-white p-1 rounded-full border-2 border-white">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                            </svg>
                        </div>
                    @endif
                </div>
                <h3 class="mt-4 font-bold text-gray-900 leading-tight">{{ $user->name }}</h3>
                <span class="text-[10px] bg-pink-50 text-pink-600 px-2 py-0.5 rounded font-bold uppercase tracking-wider">
                    {{ $user->is_verified ? 'Verified' : 'Pending' }}
                </span>

                <div class="mt-6 pt-6 border-t border-gray-50">
                    <p class="text-[10px] text-gray-400 mb-1 uppercase tracking-widest font-bold">Profile Strength</p>
                    <div class="w-full bg-gray-100 rounded-full h-1.5 mb-2">
                        <div class="bg-pink-500 h-1.5 rounded-full" style="width: 65%"></div>
                    </div>
                    <p class="text-xs text-pink-600 font-semibold">65% Completed</p>
                </div>
            </div>

            <nav class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <a href="#"
                    class="block px-6 py-4 text-sm font-medium text-gray-700 hover:bg-pink-50 hover:text-pink-600 border-b border-gray-50 transition">My
                    Preferences</a>
                {{-- <a href="#"
                    class="block px-6 py-4 text-sm font-medium text-gray-700 hover:bg-pink-50 hover:text-pink-600 border-b border-gray-50 transition">Received
                    Interests</a> --}}
                <a href="{{ route('interest.received') }}"
                    class="block px-6 py-4 text-sm font-medium {{ request()->routeIs('interest.received') ? 'bg-pink-50 text-pink-600' : 'text-gray-700' }} hover:bg-pink-50 hover:text-pink-600 border-b border-gray-50 transition">
                    Received Interests
                </a>
                {{-- <a href="#"
                    class="block px-6 py-4 text-sm font-medium text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition">Shortlisted
                    Profiles</a> --}}
            </nav>
        </aside>

        <section class="lg:col-span-3 space-y-6">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-800">New Matches in West Bengal</h3>
                <a href="#" class="text-sm font-semibold text-pink-600 hover:underline">View All</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($suggestedMatches as $match)
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:border-pink-200 transition">
                        <div class="p-6 flex items-center space-x-4">
                            <div class="h-16 w-16 rounded-xl bg-pink-50 flex-shrink-0 overflow-hidden">
                                @php
                                    $defaultAvatar =
                                        'https://ui-avatars.com/api/?name=' .
                                        urlencode($match->name) .
                                        '&background=fdf2f8&color=db2777';

                                    // Check if profile exists, has image, and is public
                                    $matchImage =
                                        $match->profile && $match->profile->image_path && $match->profile->is_public
                                            ? asset('storage/' . $match->profile->image_path)
                                            : $defaultAvatar;
                                @endphp

                                <img src="{{ $matchImage }}" class="h-full w-full object-cover" alt="{{ $match->name }}">
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900 group-hover:text-pink-600 transition">{{ $match->name }}
                                </h4>
                                <p class="text-xs text-gray-500 font-medium italic">{{ $match->district ?? 'West Bengal' }}
                                </p>
                                <p class="text-xs text-gray-400 mt-1">Sunni | BCA Graduate</p>
                            </div>
                        </div>
                        <div class="px-6 py-4 bg-gray-50/50 border-t border-gray-50 flex justify-between items-center">
                            {{-- <button class="text-gray-500 text-xs font-bold hover:text-pink-600">View Details</button> --}}
                            <a href="{{ route('profile.show', $match->id) }}"
                                class="text-gray-500 text-xs font-bold hover:text-pink-600 transition">
                                View Details
                            </a>
                            {{-- <button
                                class="bg-pink-600 text-white px-5 py-2 rounded-xl text-xs font-bold hover:bg-pink-700 transition shadow-lg shadow-pink-100">Send
                                Interest</button> --}}

                            <button onclick="sendInterest({{ $match->id }})" id="interest-btn-{{ $match->id }}"
                                class="bg-pink-600 text-white px-5 py-2 rounded-xl text-xs font-bold hover:bg-pink-700 transition shadow-lg shadow-pink-100">
                                Send Interest
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 bg-white p-12 rounded-2xl text-center border border-dashed border-gray-200">
                        <p class="text-gray-400">No matches found for your criteria yet.</p>
                    </div>
                @endforelse
            </div>
        </section>

    </div>

    <script>
        function sendInterest(receiverId) {
            const btn = document.getElementById(`interest-btn-${receiverId}`);
            btn.innerHTML = 'Sending...';
            btn.disabled = true;

            $.ajax({
                url: "{{ route('interest.send') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ye zaroori hai
                },
                data: {
                    receiver_id: receiverId
                },
                success: function(response) {
                    btn.innerHTML = 'Interest Sent';
                    btn.classList.remove('bg-pink-600', 'hover:bg-pink-700');
                    btn.classList.add('bg-gray-400', 'cursor-not-allowed');
                    Swal.fire('Alhamdulillah', response.success, 'success');
                },
                error: function(xhr) {
                    btn.innerHTML = 'Send Interest';
                    btn.disabled = false;
                    let errorMsg = xhr.responseJSON ? xhr.responseJSON.error : 'Something went wrong';
                    Swal.fire('Oops!', errorMsg, 'error');
                }
            });
        }
    </script>
@endsection
