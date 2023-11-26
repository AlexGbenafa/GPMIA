<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeDotation;
use App\Http\Requests\StoreDemandeDotationRequest;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Modifier le nom de la variable dans le contrôleur pour correspondre à la vue
    public function index()
    {
        // Récupérer toutes les demandes de matériel
        $demandeMateriel = DemandeDotation::all();

        // Passer les données à la vue
        return view("welcome", compact("demandeMateriel"));
    }

    public function planDispatch()
    {
        // Récupérer les demandes de dotation avec le statut "acceptée"
        $demandesAcceptees = DemandeDotation::where('status', 'Approuve')->get();
    
        // Passer les demandes acceptées à la vue
        return view('dashboard.planDispatch', ['demandesAcceptees' => $demandesAcceptees]);
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
    public function store(Request $request)
    {
        //
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
    public function edit(DemandeDotation $dashboard)
    {
        return view('dashboard.edit', compact('dashboard'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
