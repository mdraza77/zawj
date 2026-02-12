<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Zawj | Muslim Matrimony</title>
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
        class="bg-white w-full max-w-5xl h-full max-h-[700px] rounded-[2.5rem] shadow-2xl shadow-pink-100 border border-pink-50 overflow-hidden flex flex-col md:flex-row">

        <div
            class="hidden lg:flex lg:w-5/12 bg-pink-600 p-12 flex-col justify-between text-white relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-4xl font-black italic tracking-tighter">Zawj</h1>
                <p class="mt-4 text-pink-100 font-medium">Find your pious partner within the community of West Bengal.
                </p>
            </div>

            <div class="relative z-10">
                <div class="flex -space-x-3 mb-4">
                    <img class="w-10 h-10 rounded-full border-2 border-pink-600"
                        src="https://ui-avatars.com/api/?name=F+A&background=fce7f3&color=db2777">
                    <img class="w-10 h-10 rounded-full border-2 border-pink-600"
                        src="https://ui-avatars.com/api/?name=A+S&background=fce7f3&color=db2777">
                    <img class="w-10 h-10 rounded-full border-2 border-pink-600"
                        src="https://ui-avatars.com/api/?name=Z+K&background=fce7f3&color=db2777">
                    <div
                        class="w-10 h-10 rounded-full border-2 border-pink-600 bg-pink-500 flex items-center justify-center text-[10px] font-bold">
                        +1k</div>
                </div>
                <p class="text-xs font-bold text-pink-200 uppercase tracking-widest">Verified Profiles Only</p>
            </div>

            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-pink-500 rounded-full opacity-50"></div>
        </div>

        <div class="w-full lg:w-7/12 p-8 md:p-12 overflow-y-auto">
            <div class="mb-8">
                <h2 class="text-2xl font-black text-slate-800">Create Account</h2>
                <p class="text-sm text-slate-400 font-medium">Enter your details to get started on Zawj.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Full
                            Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="w-full mt-1 px-4 py-3 rounded-2xl bg-slate-50 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition text-sm font-semibold"
                            placeholder="Ahmed Khan">
                        @if ($errors->has('name'))
                            <p class="text-[10px] text-red-500 mt-1 ml-1">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div>
                        <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Mobile
                            Number</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required
                            class="w-full mt-1 px-4 py-3 rounded-2xl bg-slate-50 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition text-sm font-semibold"
                            placeholder="+910000000000">
                        @if ($errors->has('phone'))
                            <p class="text-[10px] text-red-500 mt-1 ml-1">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label
                            class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Gender</label>
                        <select name="gender" required
                            class="w-full mt-1 px-4 py-3 rounded-2xl bg-slate-50 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition text-sm font-semibold">
                            <option value="" disabled selected>Select</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Date of
                            Birth</label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required
                            class="w-full mt-1 px-4 py-3 rounded-2xl bg-slate-50 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition text-sm font-semibold">
                    </div>
                </div>

                <div>
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Email
                        Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full mt-1 px-4 py-3 rounded-2xl bg-slate-50 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition text-sm font-semibold"
                        placeholder="example@mail.com">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label
                            class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Password</label>
                        <input type="password" name="password" required
                            class="w-full mt-1 px-4 py-3 rounded-2xl bg-slate-50 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition text-sm font-semibold"
                            placeholder="••••••••">
                    </div>

                    <div>
                        <label
                            class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Confirm</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full mt-1 px-4 py-3 rounded-2xl bg-slate-50 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition text-sm font-semibold"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="pt-4 flex flex-col md:flex-row items-center justify-between gap-4">
                    <a href="{{ route('login') }}"
                        class="text-xs font-bold text-slate-400 hover:text-pink-600 transition tracking-wide">Already
                        have an account?</a>
                    <button type="submit"
                        class="w-full md:w-auto px-10 py-4 bg-pink-600 text-white rounded-2xl font-bold text-sm shadow-xl shadow-pink-100 hover:bg-pink-700 hover:-translate-y-1 transition duration-300">
                        Create My Account
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
