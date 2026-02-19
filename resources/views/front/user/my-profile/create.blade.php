@extends('layouts.front')

@section('title', 'Profile Picture')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[70vh]">

        {{-- <div class="w-full max-w-md mb-6">
            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center text-xs font-bold text-slate-400 hover:text-pink-600 transition uppercase tracking-widest">
                <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Dashboard
            </a>
        </div> --}}

        <div
            class="bg-white w-full max-w-md rounded-[2.5rem] shadow-2xl shadow-pink-100 border border-pink-50 overflow-hidden">
            <div class="p-8 md:p-10">
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-black text-slate-800">Profile Picture</h2>
                    <p class="text-sm text-slate-400 font-medium tracking-tight">Show your best self to potential partners.
                    </p>
                </div>

                <form action="{{ route('my-profile.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-8">
                    @csrf

                    <div class="flex flex-col items-center">
                        <div class="relative group">
                            <div
                                class="h-40 w-40 rounded-[2.5rem] bg-slate-50 border-4 border-white shadow-xl overflow-hidden relative">
                                @php
                                    $defaultAvatar =
                                        'https://ui-avatars.com/api/?name=' .
                                        urlencode(auth()->user()->name) .
                                        '&background=fdf2f8&color=db2777&size=200';
                                    $currentImage = isset($image->image_path)
                                        ? asset('storage/' . $image->image_path)
                                        : $defaultAvatar;
                                @endphp
                                <img id="imagePreview" src="{{ $currentImage }}" class="h-full w-full object-cover">

                                <label for="image_path"
                                    class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </label>
                            </div>
                        </div>

                        <input type="file" id="image_path" name="image_path" accept="image/*" required class="hidden"
                            onchange="previewFile()">

                        <p class="mt-4 text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Tap image to change
                        </p>
                    </div>

                    <div
                        class="bg-slate-50 rounded-2xl p-5 flex items-center justify-between border border-transparent hover:border-pink-100 transition">
                        <div class="pr-4">
                            <span class="block text-sm font-bold text-slate-700">Public Profile</span>
                            <span class="text-[10px] text-slate-400 font-medium leading-none">Others can see your
                                photo</span>
                        </div>

                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_public" value="1" class="sr-only peer"
                                {{ isset($image) && $image->is_public ? 'checked' : '' }}>
                            <div
                                class="w-12 h-6 bg-slate-200 rounded-full peer peer-checked:bg-pink-600 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-6">
                            </div>
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-pink-600 text-white py-4 px-6 rounded-2xl font-bold text-sm shadow-xl shadow-pink-100 hover:bg-pink-700 hover:-translate-y-1 transition duration-300 uppercase tracking-widest">
                        Update Picture
                    </button>
                </form>
            </div>
        </div>

        <p class="mt-8 text-center text-[10px] text-slate-400 font-medium px-6 leading-relaxed max-w-xs">
            Your data is safe with us. <br> Photos are encrypted and community-verified.
        </p>
    </div>

    <script>
        function previewFile() {
            const preview = document.getElementById('imagePreview');
            const file = document.querySelector('input[type=file]').files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
