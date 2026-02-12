<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title') | Zawj Admin Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-[#f8f9fa] text-slate-700">

    <header
        class="fixed top-0 z-50 w-full bg-white/80 backdrop-blur-md border-b border-slate-200 h-16 flex items-center px-6 justify-between">
        <div class="flex items-center gap-8">
            <a href="{{ route('admin.dashboard') }}" class="text-2xl font-black text-pink-600 tracking-tighter italic">
                Zawj<span
                    class="text-slate-400 font-medium text-[10px] ml-1 uppercase not-italic tracking-widest">Admin</span>
            </a>
            <button id="sidebarToggle" class="text-slate-500 hover:bg-slate-100 p-2 rounded-lg transition">
                <i class="bi bi-text-indent-left text-xl"></i>
            </button>
        </div>

        <div class="flex items-center gap-4">
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center gap-3 p-1.5 rounded-xl hover:bg-slate-50 transition border border-transparent hover:border-slate-200">
                    <img class="h-8 w-8 rounded-lg object-cover"
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=fce7f3&color=db2777"
                        alt="Admin">
                    <div class="text-left hidden md:block">
                        <p class="text-xs font-bold text-slate-900 leading-none">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] text-slate-400 mt-1 uppercase font-semibold">Super Admin</p>
                    </div>
                </button>

                <div x-show="open" @click.away="open = false" x-cloak
                    class="absolute right-0 mt-2 w-48 bg-white border border-slate-100 rounded-2xl shadow-xl py-2">
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-pink-50 hover:text-pink-600">
                        <i class="bi bi-person text-lg"></i> Profile Settings
                    </a>
                    <hr class="my-2 border-slate-50">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50">
                            <i class="bi bi-box-arrow-right text-lg"></i> Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <aside id="mainSidebar"
        class="fixed left-0 top-16 z-40 w-64 h-[calc(100vh-64px)] bg-white border-r border-slate-200 transition-transform lg:translate-x-0">
        <div class="flex flex-col h-full px-4 py-6 overflow-y-auto">
            <ul class="space-y-1.5 font-medium flex-1">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center p-3 rounded-2xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-pink-600 text-white shadow-lg shadow-pink-200' : 'text-slate-500 hover:bg-slate-50 hover:text-pink-600' }}">
                        <i class="bi bi-speedometer2 text-lg"></i>
                        <span class="ml-3 font-semibold">Dashboard</span>
                    </a>
                </li>

                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] px-3 mt-8 mb-2">Zawj Core</p>

                <li>
                    <a href="#"
                        class="flex items-center p-3 text-slate-500 rounded-2xl hover:bg-slate-50 hover:text-pink-600 transition">
                        <i class="bi bi-patch-check text-lg"></i>
                        <span class="ml-3 font-semibold">KYC Verification</span>
                        <span
                            class="ml-auto bg-orange-100 text-orange-600 text-[10px] px-2 py-0.5 rounded-lg font-bold">12</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('users.index') }}"
                        class="flex items-center p-3 text-slate-500 rounded-2xl hover:bg-slate-50 hover:text-pink-600 transition">
                        <i class="bi bi-people text-lg"></i>
                        <span class="ml-3 font-semibold">User Directory</span>
                    </a>
                </li>

                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] px-3 mt-8 mb-2">System</p>

                <li x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center justify-between w-full p-3 text-slate-500 rounded-2xl hover:bg-slate-50 hover:text-pink-600 transition">
                        <div class="flex items-center font-semibold">
                            <i class="bi bi-shield-lock text-lg"></i>
                            <span class="ml-3">Access Control</span>
                        </div>
                        <i class="bi bi-chevron-down text-[10px] transition" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <ul x-show="open" x-cloak class="mt-1 ml-9 space-y-1 border-l-2 border-slate-100 pl-4">
                        {{-- <li><a href="{{ route('users.index') }}"
                                class="text-xs py-2 block hover:text-pink-600 transition">Managers</a></li> --}}
                        <li><a href="{{ route('roles.index') }}"
                                class="text-xs py-2 block hover:text-pink-600 transition">Permissions</a></li>
                    </ul>
                </li>
            </ul>

            {{-- <div class="bg-slate-900 rounded-3xl p-5 mt-10 relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-white font-bold text-sm">Need Help?</p>
                    <p class="text-slate-400 text-[10px] mt-1">Documentation and Support</p>
                    <button
                        class="mt-4 bg-pink-600 text-white w-full py-2 rounded-xl text-[10px] font-bold hover:bg-pink-700 transition">Get
                        Support</button>
                </div>
                <div
                    class="absolute -right-4 -bottom-4 bg-pink-600/10 h-24 w-24 rounded-full group-hover:scale-150 transition duration-700">
                </div>
            </div> --}}
        </div>
    </aside>

    <div class="lg:ml-64 pt-20 p-6 min-h-screen">
        <div class="max-w-[1400px] mx-auto">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        const sidebar = document.getElementById('mainSidebar');
        const toggle = document.getElementById('sidebarToggle');

        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
    @stack('scripts')
</body>

</html>
