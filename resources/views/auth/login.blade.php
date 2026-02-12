<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Zawj Matrimony</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow: hidden;
        }

        @media (max-width: 1024px) {
            body {
                overflow: auto;
            }
        }
    </style>
</head>

<body class="bg-gray-50 h-screen flex items-center justify-center p-4">

    <div
        class="bg-white w-full max-w-5xl h-full max-h-[600px] rounded-[2.5rem] shadow-2xl shadow-pink-100 border border-pink-50 overflow-hidden flex flex-col md:flex-row">

        <div
            class="hidden lg:flex lg:w-5/12 bg-pink-600 p-12 flex-col justify-between text-white relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-4xl font-black italic tracking-tighter">Zawj</h1>
                <p class="mt-4 text-pink-100 font-medium italic">"And We created you in pairs."</p>
                <p class="text-xs text-pink-200 mt-2 uppercase tracking-widest font-bold">Quran 78:8</p>
            </div>

            <div class="relative z-10">
                <p class="text-xs font-bold text-pink-200 uppercase tracking-widest mb-2">Safe & Secure Community</p>
                <div class="flex items-center gap-2">
                    <div class="flex -space-x-2">
                        <div
                            class="w-8 h-8 rounded-full bg-pink-400 border-2 border-pink-600 flex items-center justify-center text-[10px]">
                            <i class="bi bi-shield-fill"></i>
                        </div>
                        <div
                            class="w-8 h-8 rounded-full bg-pink-500 border-2 border-pink-600 flex items-center justify-center text-[10px]">
                            <i class="bi bi-lock-fill"></i>
                        </div>
                    </div>
                    <span class="text-[10px] font-medium italic">End-to-end encrypted profiles</span>
                </div>
            </div>

            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-pink-500 rounded-full opacity-50"></div>
        </div>

        <div class="w-full lg:w-7/12 p-8 md:p-16 flex flex-col justify-center">
            <div class="mb-10">
                <h2 class="text-3xl font-black text-slate-800">Welcome Back</h2>
                <p class="text-sm text-slate-400 font-medium mt-1">Please enter your credentials to access your account.
                </p>
            </div>

            @if (session('status'))
                <div
                    class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-xl border border-green-100 italic">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Email
                        Address</label>
                    <div class="relative mt-1">
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition text-sm font-semibold pr-12"
                            placeholder="name@example.com">
                        <i class="bi bi-envelope absolute right-5 top-4 text-slate-300"></i>
                    </div>
                    @if ($errors->has('email'))
                        <p class="text-[10px] text-red-500 mt-1 ml-1">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div>
                    <div class="flex justify-between items-center ml-1">
                        <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-[10px] font-bold text-pink-600 hover:underline tracking-wide">Forgot?</a>
                        @endif
                    </div>
                    <div class="relative mt-1">
                        <input type="password" name="password" required
                            class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition text-sm font-semibold pr-12"
                            placeholder="••••••••">
                        <i class="bi bi-key absolute right-5 top-4 text-slate-300"></i>
                    </div>
                    @if ($errors->has('password'))
                        <p class="text-[10px] text-red-500 mt-1 ml-1">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="flex items-center">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox"
                            class="rounded-lg border-slate-200 text-pink-600 shadow-sm focus:ring-pink-500 w-4 h-4 transition"
                            name="remember">
                        <span
                            class="ms-3 text-xs font-bold text-slate-400 group-hover:text-slate-600 transition">{{ __('Keep me signed in') }}</span>
                    </label>
                </div>

                <div class="pt-4 flex flex-col md:flex-row items-center justify-between gap-6">
                    <a href="{{ route('register') }}"
                        class="text-xs font-bold text-slate-500 hover:text-pink-600 transition tracking-wide italic underline underline-offset-4">New
                        here? Create account</a>

                    <button type="submit"
                        class="w-full md:w-auto px-12 py-4 bg-pink-600 text-white rounded-2xl font-black text-sm shadow-xl shadow-pink-100 hover:bg-pink-700 hover:-translate-y-1 transition duration-300 uppercase tracking-widest">
                        {{ __('Sign In') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
