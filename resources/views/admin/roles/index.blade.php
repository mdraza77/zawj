@extends('layouts.admin')
@section('title', 'Role Management - Zawj')

@section('content')

    @php $sessionTypes = ['success' => 'bg-green-100 text-green-700 border-green-200', 'update' => 'bg-blue-100 text-blue-700 border-blue-200', 'delete' => 'bg-red-100 text-red-700 border-red-200']; @endphp

    @foreach ($sessionTypes as $key => $class)
        @if ($message = Session::get($key))
            <div
                class="mb-4 p-4 rounded-2xl border {{ $class }} flex items-center justify-between shadow-sm animate-pulse">
                <div class="flex items-center gap-3">
                    <i class="fas {{ $key == 'delete' ? 'fa-exclamation-triangle' : 'fa-check-circle' }} text-lg"></i>
                    <div>
                        <span class="font-bold block uppercase text-[10px]">{{ $key }}</span>
                        <span class="text-sm">{{ $message }}</span>
                    </div>
                </div>
                <button onclick="this.parentElement.remove()" class="hover:opacity-70"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
        @endif
    @endforeach

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Role Management</h1>
            <nav class="flex text-slate-400 text-xs mt-1 font-medium">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-pink-600 transition">Dashboard</a>
                <span class="mx-2">/</span>
                <span class="text-slate-600">Roles</span>
            </nav>
        </div>
        @can('AccessManagement-Create')
            <a href="{{ route('roles.create') }}"
                class="bg-pink-600 text-white px-6 py-3 rounded-2xl text-xs font-bold hover:bg-pink-700 transition shadow-lg shadow-pink-100 flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> Add New Role
            </a>
        @endcan
    </div>

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h4 class="text-lg font-bold text-slate-800 tracking-tight italic">System Roles</h4>
            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-lg">
                Total Roles: {{ count($roles) }}
            </div>
        </div>

        <div class="overflow-x-auto">
            <table id="Role_Management_table" class="w-full text-left border-collapse">
                <thead class="bg-slate-50/50 text-[10px] uppercase text-slate-400 font-bold tracking-widest">
                    <tr>
                        <th class="px-8 py-4">S. No</th>
                        <th class="px-8 py-4">Role Name</th>
                        <th class="px-8 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach ($roles as $role)
                        <tr id="role_table_td_{{ $role->id }}" class="hover:bg-slate-50/50 transition group">
                            <td class="px-8 py-5 text-slate-400 font-medium">{{ $loop->iteration }}</td>
                            <td class="px-8 py-5">
                                <span
                                    class="font-bold text-slate-700 group-hover:text-pink-600 transition">{{ $role->name }}</span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex justify-center items-center gap-2" x-data="{ open: false }">
                                    <div class="relative">
                                        <button @click="open = !open"
                                            class="p-2 hover:bg-white rounded-xl border border-transparent hover:border-slate-200 transition text-slate-400 hover:text-slate-600">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>

                                        <div x-show="open" @click.away="open = false" x-cloak
                                            class="absolute right-0 mt-2 w-48 bg-white border border-slate-100 rounded-2xl shadow-xl z-50 py-2">
                                            @can('AccessManagement-View')
                                                <a class="flex items-center gap-3 px-4 py-2.5 text-xs font-bold text-slate-600 hover:bg-slate-50 hover:text-pink-600"
                                                    href="{{ route('roles.show', $role->id) }}">
                                                    <i class="fa-regular fa-eye text-base"></i> View Details
                                                </a>
                                            @endcan

                                            @can('AccessManagement-Edit')
                                                @if ($role->id != 1)
                                                    <a class="flex items-center gap-3 px-4 py-2.5 text-xs font-bold text-slate-600 hover:bg-slate-50 hover:text-blue-600"
                                                        href="{{ route('roles.edit', $role->id) }}">
                                                        <i class="fa-solid fa-pencil text-base"></i> Edit Role
                                                    </a>
                                                @endif
                                            @endcan

                                            @can('AccessManagement-Delete')
                                                @if ($role->id != 1)
                                                    <hr class="my-2 border-slate-50">
                                                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}"
                                                        class="block">
                                                        @csrf
                                                        @method('GET')
                                                        <button type="button"
                                                            class="w-full flex items-center gap-3 px-4 py-2.5 text-xs font-bold text-red-500 hover:bg-red-50 delete-button">
                                                            <i class="fa-solid fa-trash text-base"></i> Delete Role
                                                        </button>
                                                    </form>
                                                @endif
                                            @endcan
                                        </div>
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
