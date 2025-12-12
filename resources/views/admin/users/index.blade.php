@extends('layouts.admin')

@section('title', 'Gestion des utilisateurs')
@section('header', 'Gestion des utilisateurs')

@section('content')
@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-left">ID</th>
            <th class="px-6 py-3 text-left">Nom</th>
            <th class="px-6 py-3 text-left">Email</th>
            <th class="px-6 py-3 text-left">Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr class="border-b hover:bg-gray-50">
            <td class="px-6 py-3">{{ $user->id }}</td>
            <td class="px-6 py-3">{{ $user->name }}</td>
            <td class="px-6 py-3">{{ $user->email }}</td>
            <td class="px-6 py-3">
                <form action="{{ route('admin.users.updateRole', $user) }}" method="POST">
                    @csrf
                    <select name="role" onchange="this.form.submit()" class="border rounded px-2 py-1">
                        <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
                        <option value="commercial" {{ $user->role=='commercial' ? 'selected' : '' }}>Commercial</option>
                        <option value="controleur" {{ $user->role=='controleur' ? 'selected' : '' }}>Controleur</option>
                    </select>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
