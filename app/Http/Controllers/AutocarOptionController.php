<?php

namespace App\Http\Controllers;

use App\Models\AutocarOption;
use Illuminate\Http\Request;
use App\Http\Requests\AutocaroptionRequest;
use App\Models\Autocar;
use App\Models\Option;

class AutocarOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autocaroptions = Autocaroption::all();
        return view('autocaroptions.index', compact('autocaroptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autocars = Autocar::all();
        $options = Option::all();
        return view('autocaroptions.create', compact('autocars', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AutocaroptionRequest $request)
    {
        Autocaroption::create($request->all());
        session()->flash('success', 'Équipement ajouté avec succès!');
        return redirect()->route('autocaroptions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Autocaroption $autocaroption)
    {
        return view('autocaroptions.show', compact('autocaroption'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autocaroption $autocaroption)
    {
        return view('autocaroptions.edit', compact('autocaroption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autocaroption $autocaroption)
    {
        $autocaroption->update($request->all());
        session()->flash('success', 'Équipement mis à jour avec succès!');
        return redirect()->route('autocaroptions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autocaroption $autocaroption)
    {
        $autocaroption->delete();
        session()->flash('success', 'Équipement supprimé avec succès!');
        return redirect()->route('autocaroptions.index');
    }
}
