@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    {{-- Header --}}
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Liste des Campagnes</h1>
        <a href="{{ route('campagnes.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
           + Nouvelle Campagne
        </a>
    </div>

    {{--  Success Message --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{--  Search + Filters --}}
    <form method="GET" action="{{ route('campagnes.index') }}" 
          class="mb-6 bg-white p-4 shadow rounded flex flex-wrap gap-4">

        {{-- Search --}}
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}"
            placeholder="Rechercher par client, type, spot..."
            class="border p-2 rounded w-72"
        >

        {{-- Filter catégorie --}}
        <select name="categorie_id" class="border p-2 rounded">
            <option value="">Toutes les catégories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" 
                    {{ request('categorie_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->categorie_nom }}
                </option>
            @endforeach
        </select>

        {{-- Filter type --}}
        <select name="type" class="border p-2 rounded">
            <option value="">Tous les types</option>
            <option value="classique" {{ request('type') == 'classique' ? 'selected' : '' }}>Classique</option>
            <option value="hors ecran" {{ request('type') == 'hors ecran' ? 'selected' : '' }}>Hors Écran</option>
        </select>

        {{-- Filter ranking --}}
        <select name="ranking" class="border p-2 rounded">
            <option value="">Tous les rankings</option>
            <option value="active" {{ request('ranking') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="non active" {{ request('ranking') == 'non active' ? 'selected' : '' }}>Non Active</option>
        </select>

        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Filtrer
        </button>
    </form>

    {{--  Table --}}
    <table class="w-full border-collapse bg-white shadow rounded">
        <thead class="bg-gray-100">
            <tr class="text-left">
                <th class="p-3 border">Nom Client</th>
                <th class="p-3 border">Catégorie</th>
                <th class="p-3 border">Type</th>
                <th class="p-3 border">Ranking</th>
                <th class="p-3 border">Spot</th>
                <th class="p-3 border">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($campagnes as $campagne)
            <tr class="hover:bg-gray-50">
                <td class="p-3 border">
                    {{ $campagne->client->client_nom ?? '—' }}
                </td>

                <td class="p-3 border">
                    {{ $campagne->categorie->categorie_nom ?? '—' }}
                </td>

                <td class="p-3 border">{{ $campagne->type }}</td>
                <td class="p-3 border">{{ $campagne->ranking }}</td>
                <td class="p-3 border">{{ $campagne->spot }}</td>

                <td class="p-3 border flex gap-2">
                    <a href="{{ route('campagnes.edit', $campagne) }}"
                       class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                       Modifier
                    </a>

                    <form action="{{ route('campagnes.destroy', $campagne) }}" 
                          method="POST"
                          onsubmit="return confirm('Supprimer cette campagne ?')">
                        @csrf
                        @method('DELETE')

                        <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="6" class="p-4 text-center text-gray-500">
                    Aucune campagne trouvée.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection

