@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Tableau de bord')

@section('content')
<div class="grid grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-lg font-semibold text-gray-700">Utilisateurs</h3>
        <p class="text-2xl font-bold mt-2 text-indigo-600">150</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-lg font-semibold text-gray-700">Clubs</h3>
        <p class="text-2xl font-bold mt-2 text-indigo-600">12</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-lg font-semibold text-gray-700">Stagiaires</h3>
        <p class="text-2xl font-bold mt-2 text-indigo-600">48</p>
    </div>
</div>
@endsection
