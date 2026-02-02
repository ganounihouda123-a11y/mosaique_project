<?php

namespace App\Http\Controllers;

use App\Models\Campagne;
use App\Models\Client;
use App\Models\Categorie;
use Illuminate\Http\Request;


class CampagneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function index()
    {
         $campagnes = Campagne::with(['client', 'categorie'])->latest()->get();
        return view('campagnes.index', compact('campagnes'));
    }*/

    public function index(Request $request)
{
    $query = Campagne::with(['client', 'categorie']);

    // 🔍 Search
    if ($request->filled('search')) {
        $query->whereHas('client', function($q) use ($request) {
            $q->where('client_nom', 'like', "%{$request->search}%");
        })
        ->orWhere('type', 'like', "%{$request->search}%")
        ->orWhere('spot', 'like', "%{$request->search}%");
    }

    // 📂 Filter Category
    if ($request->filled('categorie_id')) {
        $query->where('categorie_id', $request->categorie_id);
    }

    //  Filter Type
    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    //  Filter Ranking
    if ($request->filled('ranking')) {
        $query->where('ranking', $request->ranking);
    }

    $campagnes = $query->latest()->get();

    // Pour afficher la liste déroulante des catégories
    $categories = Categorie::all();
    return response()->json($campagnes);

    // return view('campagnes.index', compact('campagnes', 'categories'));
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $clients = Client::all();
        $categories = Categorie::all();

        return response()->json($campagnes);
       // return view('campagnes.create', compact('clients', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_début' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_début',
            'type' => 'required|in:classique,hor_écran',
            'ranking' => 'required|in:active,non_active',
            'duree' => 'required|integer|min:1',
            'spot' => 'required|string|max:255',
            'id_client' => 'required|exists:clients,id',
            'id_categorie' => 'required|exists:categories,id',
        ]);

        Campagne::create($request->all());

        return response()->json($campagnes);
       // return redirect()->route('campagnes.index')->with('success', 'Campagne créée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Campagne $campagne)
    {
         $clients = Client::all();
        $categories = Categorie::all();

        return response()->json($campagnes);
        //return view('campagnes.edit', compact('campagne', 'clients', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Campagne $campagne)
    {
        $request->validate([
            'date_début' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_début',
            'type' => 'required|in:classique,hors_ecran',
            'ranking' => 'required|in:active,non_active',
            'duree' => 'required|integer|min:1',
            'spot' => 'required|string|max:255',
            'id_client' => 'required|exists:clients,id',
            'id_categorie' => 'required|exists:categories,id',
        ]);

        $campagne->update($request->all());

        return response()->json($campagnes);
        //return redirect()->route('campagnes.index')->with('success', 'Campagne modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campagne $campagne)
    {
          $campagne->delete();

          return response()->json($campagnes);

        //return redirect()->route('campagnes.index')->with('success', 'Campagne supprimée !');
    
    }
    
}
