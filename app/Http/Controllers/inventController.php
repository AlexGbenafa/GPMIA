<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventaireMateriel;
use App\Http\Requests\StoreMaterielInventaireRequest;

class inventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaterielInventaireRequest $request)
    {

        $validated = $request->validated();
    
        // Enregistrer les données dans la base de données
        InventaireMateriel::create($validated);
    
        // Rediriger l'utilisateur vers la page de confirmation ou autre après avoir enregistré la demande
        return redirect()->route('inventaire.staff')->with("success", "Mise a disposition effectuée avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
