@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Modifier la Campagne</h1>

    <form action="{{ route('campagnes.update', $campagne->id) }}" method="POST"
          class="bg-white p-6 shadow rounded space-y-4">
        @csrf
        @method('PUT')

        {{-- Client --}}
        <div>
            <label class="block font-semibold mb-1">Client</label>
            <select name="client_id" class="w-full border p-2 rounded">
                @foreach($clients as $client)
                    <option 
                        value="{{ $client->id }}"
                        {{ $campagne->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->campagne_nom }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Catégorie --}}
        <div>
            <label class="block font-semibold mb-1">Catégorie</label>
            <select name="categorie_id" class="w-full border p-2 rounded">
                @foreach($categories as $cat)
                    <option 
                        value="{{ $cat->id }}"
                        {{ $campagne->categorie_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->categorie_nom }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Type --}}
        <div>
            <label class="block font-semibold mb-1">Type</label>
            <select name="type" class="w-full border p-2 rounded">
                <option value="classique" {{ $campagne->type == 'classique' ? 'selected' : '' }}>
                    Classique
                </option>
                <option value="hors ecran" {{ $campagne->type == 'hors ecran' ? 'selected' : '' }}>
                    Hors Écran
                </option>
            </select>
