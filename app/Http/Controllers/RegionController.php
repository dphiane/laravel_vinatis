<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreRegionRequest;

class RegionController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();

        return view('regions.index',compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegionRequest $request):RedirectResponse
    {
        $request->validated();

        $region = new Region;
        $region->name = $request->name;
        $region->save();

        return redirect('/region')->with(['success' =>'Votre région a bien été ajouté']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
/*         $region = Region::findOrFail($id);
        return view('region.show', compact('region')); */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $region = Region::findOrFail($id);

        return view('regions.edit',['region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRegionRequest $request, string $id):RedirectResponse
    {
        $request->validated();

        $region = Region::findOrFail($id);
        $region->update($request->all());

        return redirect()->route('region.index')->with('success','Votre région a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $region = Region::findOrFail($id);
        $region->delete();

        return redirect()->route('region.index')->with('success', 'Région supprimée avec succès.');
    }
}
