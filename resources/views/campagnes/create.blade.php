@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Créer une Nouvelle Campagne</h1>

    <form action="{{ route('campagnes.store') }}" method="POST" 
          class="bg-white p-6 shadow rounded space-y-4">
        @csrf

        {{-- Client --}}
        <div>
            <label class="block font-semibold mb-1">Client</label>
            <select name="client_id" class="w-full border p-2 rounded">
                <option value="">-- Sélectionner un client --</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">
                        {{ $client->campagne_nom }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Catégorie --}}
        <div>
            <label class="block font-semibold mb-1">Catégorie</label>
            <select name="categorie_id" class="w-full border p-2 rounded">
                <option value="">-- Sélectionner une catégorie --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">
                        {{ $cat->categorie_nom }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Type --}}
        <div>
            <label class="block font-semibold mb-1">Type</label>
            <select name="type" class="w-full border p-2 rounded">
                <option value="classique">Classique</option>
                <option value="hors ecran">Hors Écran</option>
            </select>
        </div>

        {{-- Ranking --}}
        <div>
            <label class="block font-semibold mb-1">Ranking</label>
            <select name="ranking" class="w-full border p-2 rounded">
                <option value="active">Active</option>
                <option value="non active">Non Active</option>
            </select>
        </div>

        {{-- Durée --}}
        <div>
            <label class="block font-semibold mb-1">Durée (en jours)</label>
            <input 
                type="number" 
                name="duree" 
                class="w-full border p-2 rounded"
                placeholder="Ex: 30"
            >
        </div>

        {{-- Spot --}}
        <div>
            <label class="block font-semibold mb-1">Spot</label>
            <input 
                type="text" 
                name="spot" 
                class="w-full border p-2 rounded"
                placeholder="Nom du spot"
            >
        </div>

        {{-- Start Date --}}
        <div>
            <label class="block font-semibold mb-1">Date de Début</label>
            <input 
                type="date" 
                name="start_date" 
                class="w-full border p-2 rounded"
            >
        </div>

        {{-- End Date --}}
        <div>
            <label class="block font-semibold mb-1">Date de Fin</label>
            <input 
                type="date" 
                name="end_date" 
                class="w-full border p-2 rounded"
            >
        </div>

        {{-- Submit Button --}}
        <div class="flex justify-end">
            <button 
                class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Enregistrer
            </button>
        </div>

    </form>

</div>
@endsection
