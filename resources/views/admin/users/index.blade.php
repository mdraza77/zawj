@extends('layouts.admin')
@section('title', 'User Management - Zawj')

@section('content')

    @php
        $sessionTypes = [
            'success' => 'bg-green-100 text-green-700 border-green-200',
            'update' => 'bg-blue-100 text-blue-700 border-blue-200',
            'delete' => 'bg-red-100 text-red-700 border-red-200',
        ];
    @endphp

    @foreach ($sessionTypes as $key => $class)
        @if ($message = Session::get($key))
            <div
                class="mb-4 p-4 rounded-2xl border {{ $class }} flex items-center justify-between shadow-sm animate-in fade-in slide-in-from-top-4 duration-300">
                <div class="flex items-center gap-3">
                    <i class="fas {{ $key == 'delete' ? 'fa-exclamation-triangle' : 'fa-check-circle' }} text-lg"></i>
                    <div>
                        <span class="font-bold block uppercase text-[10px] tracking-widest">{{ $key }}</span>
                        <span class="text-sm font-medium">{{ $message }}</span>
                    </div>
                </div>
                <button onclick="this.parentElement.remove()" class="hover:opacity-70 transition"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
        @endif
    @endforeach

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex-1">
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">User Management Details</h1>
            <nav class="flex text-slate-400 text-xs mt-1 font-semibold">
                <a href="{{ url('/dashboard') }}" class="hover:text-pink-600 transition">Home</a>
                <span class="mx-2 text-slate-300 text-[10px]">></span>
                <span class="text-slate-600 italic">User Management</span>
            </nav>
        </div>

        @can('UserManagement-Create')
            <a href="{{ route('users.create') }}"
                class="bg-pink-600 text-white px-8 py-4 rounded-3xl text-sm font-bold hover:bg-pink-700 transition shadow-xl shadow-pink-100 flex items-center gap-3">
                <i class="fas fa-user-plus"></i> Add New User
            </a>
        @endcan
    </div>

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h4 class="text-xl font-bold text-slate-800 tracking-tight">Community Directory</h4>
                <p class="text-[10px] text-red-500 font-bold uppercase tracking-widest mt-1 italic">Note: System Admins
                    cannot be deleted</p>
            </div>

            <div class="add_btn_row_in_user_table flex gap-2" style="display: none">
                @can('UserManagement-View')
                    <button
                        class="px-4 py-2 bg-slate-100 text-slate-700 rounded-xl text-xs font-bold hover:bg-slate-200 transition"
                        id="user_table_view_btn">View</button>
                @endcan
                @can('UserManagement-Edit')
                    <button
                        class="px-4 py-2 bg-blue-100 text-blue-700 rounded-xl text-xs font-bold hover:bg-blue-200 transition"
                        id="user_table_edit_btn">Edit</button>
                @endcan
                @can('UserManagement-Delete')
                    <button class="px-4 py-2 bg-red-100 text-red-700 rounded-xl text-xs font-bold hover:bg-red-200 transition"
                        id="user_table_delete_btn">Delete</button>
                @endcan
            </div>
        </div>

        <div class="overflow-x-auto">
            <table id="User_Management_table" class="w-full text-left border-collapse">
                <thead class="bg-slate-50/50 text-[10px] uppercase text-slate-400 font-bold tracking-[0.15em]">
                    <tr>
                        <th class="px-8 py-5 border-b border-slate-50">#</th>
                        <th class="px-8 py-5 border-b border-slate-50">User Profile</th>
                        <th class="px-8 py-5 border-b border-slate-50">Role</th>
                        <th class="px-8 py-5 border-b border-slate-50">Mobile</th>
                        <th class="px-8 py-5 border-b border-slate-50">Email</th>
                        <th class="px-8 py-5 border-b border-slate-50">Status</th>
                        <th class="px-8 py-5 border-b border-slate-50 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach ($data as $key => $user)
                        <tr class="hover:bg-slate-50/30 transition group">
                            <td class="px-8 py-6 text-slate-400 font-medium">{{ $loop->iteration }}</td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-11 h-11 bg-pink-50 text-pink-600 rounded-[1rem] flex items-center justify-center font-black text-sm border border-pink-100 group-hover:bg-pink-600 group-hover:text-white transition duration-300">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h6 class="text-sm font-bold text-slate-800 leading-none mb-1">{{ $user->name }}
                                            {{ $user->last_name }}</h6>
                                        <p class="text-[10px] text-slate-400 font-semibold tracking-wide">
                                            {{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <span
                                            class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-black rounded-lg uppercase tracking-wider">{{ $v }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td class="px-8 py-6 text-slate-600 font-semibold text-xs">{{ $user->mobile }}</td>
                            <td class="px-8 py-6 text-slate-500 text-xs">{{ $user->email }}</td>
                            <td class="px-8 py-6">
                                @if ($user->deleted_at != null)
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[10px] font-black bg-red-100 text-red-600 uppercase">
                                        <span class="w-1 h-1 rounded-full bg-red-600"></span> Inactive
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[10px] font-black bg-green-100 text-green-600 uppercase">
                                        <span class="w-1 h-1 rounded-full bg-green-600"></span> Active
                                    </span>
                                @endif
                            </td>
                            <td class="px-8 py-6 text-center" x-data="{ open: false }">
                                <div class="relative">
                                    <button @click="open = !open"
                                        class="p-2 text-slate-400 hover:text-pink-600 hover:bg-slate-50 rounded-xl transition">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>

                                    <div x-show="open" @click.away="open = false" x-cloak
                                        class="absolute right-0 mt-2 w-48 bg-white border border-slate-100 rounded-2xl shadow-xl z-50 py-2 animate-in fade-in zoom-in-95 duration-150">
                                        @can('UserManagement-View')
                                            <a class="flex items-center gap-3 px-4 py-2.5 text-xs font-bold text-slate-600 hover:bg-slate-50 hover:text-pink-600"
                                                href="{{ route('users.show', $user->id) }}">
                                                <i class="fa-regular fa-eye"></i> View Profile
                                            </a>
                                        @endcan

                                        @can('UserManagement-Edit')
                                            @if ($user->id != 1 && !$user->hasAnyRole(['Super Admin']))
                                                @if ($user->deleted_at == null)
                                                    <a class="flex items-center gap-3 px-4 py-2.5 text-xs font-bold text-slate-600 hover:bg-slate-50 hover:text-blue-600"
                                                        href="{{ route('users.edit', $user->id) }}">
                                                        <i class="fa-solid fa-pencil"></i> Edit Details
                                                    </a>
                                                @endif
                                            @endif
                                        @endcan

                                        <hr class="my-2 border-slate-50">

                                        @if ($user->id != 1 && !$user->hasAnyRole(['Super Admin']))
                                            @can('UserManagement-Delete')
                                                @if ($user->deleted_at != null)
                                                    <form method="POST" action="{{ route('users.resoter', $user->id) }}">
                                                        @csrf @method('DELETE')
                                                        <button type="button"
                                                            class="w-full flex items-center gap-3 px-4 py-2.5 text-xs font-bold text-green-600 hover:bg-green-50 activate-button">
                                                            <i class="fa-solid fa-rotate-right"></i> Activate Account
                                                        </button>
                                                    </form>
                                                @else
                                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                        @csrf @method('DELETE')
                                                        <button type="button"
                                                            class="w-full flex items-center gap-3 px-4 py-2.5 text-xs font-bold text-red-600 hover:bg-red-50 inactive-button">
                                                            <i class="fa-solid fa-power-off"></i> Inactive Account
                                                        </button>
                                                    </form>
                                                @endif
                                            @endcan
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        /* DataTables Custom Styles for Zawj Theme */
        #User_Management_table_wrapper .dataTables_length select {
            @apply border-slate-200 rounded-xl text-xs font-bold px-4 py-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition;
        }

        #User_Management_table_wrapper .dataTables_filter input {
            @apply border-slate-200 rounded-xl text-xs font-medium px-4 py-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition w-64;
        }

        .dt-buttons .dt-button {
            @apply bg-slate-100 text-slate-600 border-none rounded-xl text-[10px] font-black uppercase tracking-widest px-4 py-2 hover:bg-pink-600 hover:text-white transition duration-300 mb-4;
        }
    </style>
@endpush
