<?php

namespace App\Http\Controllers;

use App\Models\wine;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreWineRequest;
use App\Models\Wine as ModelsWine;

class WineController extends Controller
{

    /**
     * Display a listing Or the resource.
     */
    public function index()
    {
        $wines = Wine::all();
        return view('wines.index', compact('wines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::all();
        $wine = new Wine();
        return view('wines.form', compact('regions', 'wine'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWineRequest $request)
    {
        $request->validated();

        Wine::create([
            'name' => $request->name,
            'domain' => $request->domain,
            'year' => $request->year,
            'region_id' => $request->region_id
        ]);
        return redirect()->route('vins.index')->with('success', 'La référence à bien été créer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $wine = Wine::findOrFail($id);
        return view('wines.show', compact('wine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wine = Wine::findOrFail($id);
        $regions = Region::all();

        return view('wines.form', compact('wine', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreWineRequest $request, string $id)
    {
        $wine = Wine::findOrFail($id);
        $wine->update($request->validated());

        return redirect()->route('vins.index')->with('success', 'Vin mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wine = Wine::findOrFail($id);
        $wine->delete();
        return redirect()->route('vins.index')->with('success','La référence à bien été supprimer');
    }
}
