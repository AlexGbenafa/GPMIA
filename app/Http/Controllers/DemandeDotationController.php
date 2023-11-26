<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeDotation;
use App\Http\Requests\StoreDemandeDotationRequest;

class DemandeDotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('employeesForms.index');
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
    public function store(StoreDemandeDotationRequest $request)
    {
        $validated = $request->validated();
    
        // Convertir le tableau de valeurs en une chaîne de caractères séparées par des virgules
        $designationDemande = implode(', ', $request->input('designationDemande'));
        
        // Ajouter la chaîne résultante au tableau de données validées
        $validated['designationDemande'] = $designationDemande;
    
        // Enregistrer les données dans la base de données
        DemandeDotation::create($validated);
    
        // Rediriger l'utilisateur vers la page de confirmation ou autre après avoir enregistré la demande
        return redirect()->route('demandeDotation.index')->with("success", "Demande de dotation effectuée avec succès");
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
        // Validate the request data if necessary
        $request->validate([
            'status' => 'required|in:En attente,Approuve,Refuse',
            // Add any other validation rules for the 'status' field here if needed
        ]);
    
        // Find the resource by $id
        $demande = DemandeDotation::findOrFail($id);
    
        // Update only the 'status' field
        $demande->status = $request->input('status');
        $demande->save();
    
        // Redirect back or to a different page after the update
        return redirect()->route('dashboard.index')->with('success', 'Status mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
