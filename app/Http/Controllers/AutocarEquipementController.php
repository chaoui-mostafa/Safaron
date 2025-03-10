<?php
namespace App\Http\Controllers;

use App\Models\AutocarEquipement;
use App\Models\Autocar; // Make sure to import the Autocar model
use App\Models\Equipement; // Make sure to import the Equipement model
use Illuminate\Http\Request;
use App\Http\Requests\AutocarEquipementRequest;

class AutocarEquipementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch AutocarEquipement with related Autocar and Equipement data
        $autocarequipements = AutocarEquipement::with('autocar', 'equipement')->get();

        return view('autocarequipements.index', compact('autocarequipements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all Autocars and Equipements for the dropdowns
        $autocars = Autocar::all();
        $equipements = Equipement::all();


        // session()->flash('success', 'Équipement ajouté avec succès!');
        return view('autocarequipements.create', compact('autocars', 'equipements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AutocarEquipementRequest $request)
    {
        // Create new AutocarEquipement entry using the validated data
        AutocarEquipement::create($request->all());

       return redirect()->route('autocarequipements.index')->with('success', 'Équipement ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AutocarEquipement $autocarequipement)
    {
        return view('autocarequipements.show', compact('autocarequipement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AutocarEquipement $autocarequipement)
    {
        // Fetch all autocars and equipements for the dropdowns
        $autocars = Autocar::all();
        $equipements = Equipement::all();

        // Pass both the $autocars and $equipements variables to the view along with the $autocarequipement
        return view('autocarequipements.edit', compact('autocarequipement', 'autocars', 'equipements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AutocarEquipement $autocarequipement)
{
    // Validate and update the record
    $request->validate([
        'autocar_id' => 'required|exists:autocars,id',
        'equipement_id' => 'required|exists:equipements,id',
    ]);

    // Update the resource with the validated data
    $autocarequipement->update($request->only(['autocar_id', 'equipement_id']));

    // Return with a success message
    return redirect()->route('autocarequipements.index')->with('success', 'Équipement modifié avec succès!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AutocarEquipement $autocarequipement)
    {
        try {
            $autocarequipement->delete();
            session()->flash('success', 'Équipement supprimé avec succès!');
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur lors de la suppression de l\'équipement!');
        }

        return redirect()->route('autocarequipements.index');
    }

}
