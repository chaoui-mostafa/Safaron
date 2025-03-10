<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;
use App\Http\Requests\EquipementRequest;

class EquipementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipements = Equipement::all();
        return view('equipements.index', compact('equipements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipementRequest $request)
    {
        Equipement::create($request->all());
        return redirect()->route('equipements.index')->with('success', 'Equipement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipement $equipement)
    {
        return view('equipements.show', compact('equipement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipement $equipement)
    {
        return view('equipements.edit', compact('equipement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipement $equipement)
    {
        $equipement->update($request->all());
        return redirect()->route('equipements.index')->with('success', 'Equipement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipement $equipement)
    {
        $equipement->delete();
        return redirect()->route('equipements.index')->with('success', 'Equipement deleted successfully.');
    }
}
