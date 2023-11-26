<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventaireMateriel;
use App\Http\Requests\StoreMaterielInventaireRequest;

class InventaireMaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les demandes de matériel
        $inventaireMateriel = InventaireMateriel::all();
        
        // Récupérer toutes les demandes de matériel avec pagination (10 éléments par page)
        //$inventaireMateriel = InventaireMateriel::paginate(10);
    
        // Passer les données à la vue
        return view("dashboard.inventaire", compact("inventaireMateriel"));
    }

    public function finDeVie()
    {
        // Récupérer toutes les demandes de matériel
        $inventaireMateriel = InventaireMateriel::all();
        
        // Récupérer toutes les demandes de matériel avec pagination (10 éléments par page)
        //$inventaireMateriel = InventaireMateriel::paginate(10);
    
        // Passer les données à la vue
        return view("dashboard.materielEnFinDeVie", compact("inventaireMateriel"));
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
    
        // Ajoutez cette ligne pour obtenir l'année actuelle
        $validated['anneeAquisition'] = date('Y');
    
        // Enregistrer les données dans la base de données
        InventaireMateriel::create($validated);
    
        // Rediriger l'utilisateur vers la page de confirmation ou autre après avoir enregistré la demande
        return redirect()->route('inventaire.staff')->with("success", "Demande de dotation effectuée avec succès");
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

    
    public function staff(){
        return view("miseADispositionForm/index");
    }               
}


