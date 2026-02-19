@extends('layouts.front')

@section('title', 'Profile of ' . $profileUser->name)

@section('content')
    <div class="max-w-5xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('dashboard') }}"
                class="text-slate-400 hover:text-pink-600 font-bold text-xs flex items-center gap-2 transition">
                <i class="fas fa-arrow-left"></i> Back to Matches
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-8 text-center sticky top-24">
                    <div class="relative inline-block">
                        @php
                            $defaultAvatar =
                                'https://ui-avatars.com/api/?name=' .
                                urlencode($profileUser->name) .
                                '&background=fdf2f8&color=db2777';

                            $matchImage =
                                $profileUser->profile &&
                                $profileUser->profile->image_path &&
                                $profileUser->profile->is_public
                                    ? asset('storage/' . $profileUser->profile->image_path)
                                    : $defaultAvatar;
                        @endphp

                        <img src="{{ $matchImage }}"
                            class="h-40 w-40 rounded-[2.5rem] mx-auto object-cover ring-8 ring-pink-50 shadow-xl"
                            alt="{{ $profileUser->name }}">

                        @if ($profileUser->is_verified)
                            <div
                                class="absolute -bottom-2 -right-2 bg-blue-500 text-white p-2 rounded-2xl border-4 border-white shadow-lg">
                                <i class="fas fa-check text-sm"></i>
                            </div>
                        @endif
                    </div>

                    <h2 class="mt-6 text-2xl font-black text-slate-800 tracking-tight">{{ $profileUser->name }}</h2>
                    <p class="text-sm font-bold text-pink-600 mt-1 italic">
                        {{ $profileUser->gender == 'male' ? 'Male' : 'Female' }}</p>

                    <div class="mt-8 space-y-3">

                        <button id="interest-btn-{{ $profileUser->id }}" {{ $alreadySent ? 'disabled' : '' }}
                            @if (!$alreadySent) onclick="sendInterest({{ $profileUser->id }})" @endif
                            class="{{ $alreadySent ? 'bg-gray-400 cursor-not-allowed' : 'bg-pink-600 hover:bg-pink-700' }} text-white px-5 py-2 rounded-xl text-xs font-bold transition shadow-lg shadow-pink-100">

                            {{ $alreadySent ? 'Interest Sent' : 'Send Interest' }}
                        </button>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">

                @php
                    $details = [
                        'Religious & Location' => [
                            ['label' => 'Sect / Maslak', 'value' => 'Sunni / Hanafi', 'icon' => 'fa-kaaba'],
                            [
                                'label' => 'District',
                                'value' => $profileUser->district ?? 'Malda, West Bengal',
                                'icon' => 'fa-location-dot',
                            ],
                            [
                                'label' => 'Age',
                                'value' => \Carbon\Carbon::parse($profileUser->date_of_birth)->age . ' Years',
                                'icon' => 'fa-calendar-day',
                            ],
                        ],
                        'Education & Career' => [
                            ['label' => 'Education', 'value' => 'BCA Graduate', 'icon' => 'fa-graduation-cap'],
                            ['label' => 'Occupation', 'value' => 'Software Developer', 'icon' => 'fa-briefcase'],
                            ['label' => 'Annual Income', 'value' => '₹ 5 - 7 Lakhs', 'icon' => 'fa-wallet'],
                        ],
                        'Family Background' => [
                            ['label' => 'Father Status', 'value' => 'Business Person', 'icon' => 'fa-user-tie'],
                            ['label' => 'Siblings', 'value' => '2 Brothers, 1 Sister', 'icon' => 'fa-users'],
                        ],
                    ];
                @endphp

                @foreach ($details as $sectionTitle => $fields)
                    <div
                        class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden animate-in fade-in slide-in-from-bottom-4 duration-500">
                        <div class="px-8 py-5 bg-slate-50/50 border-b border-slate-50">
                            <h4 class="font-black text-slate-800 uppercase tracking-widest text-[10px]">{{ $sectionTitle }}
                            </h4>
                        </div>
                        <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                            @foreach ($fields as $field)
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-pink-50 text-pink-600 flex items-center justify-center flex-shrink-0">
                                        <i class="fas {{ $field['icon'] }} text-sm"></i>
                                    </div>
                                    <div>
                                        <p
                                            class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">
                                            {{ $field['label'] }}</p>
                                        <p class="text-sm font-black text-slate-700">{{ $field['value'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">
                    <h4 class="font-black text-slate-800 uppercase tracking-widest text-[10px] mb-4">About Me</h4>
                    <p class="text-slate-500 leading-relaxed text-sm">
                        I am a pious and hardworking individual looking for a partner who values both Deen and Duniya. I
                        enjoy spending time with family and I'm currently working in the IT sector in West Bengal.
                    </p>
                </div>
            </div>
        </div>
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
