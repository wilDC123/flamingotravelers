<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

class DestinationController extends Controller
{

    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }


    public function create()
    {
        return view('destinations.create');
    }


    public function store(Request $request)
    {
        Destination::create($request->all());
        return redirect()->route('destinations.index');
    }


    public function show(string $id)
    {
        $destination = Destination::findOrFail($id);
        return view('destinations.show', compact('destination'));
    }


    public function edit(Destination $destination)
    {
        return view('destinations.edit', compact('destination'));

    }


    public function update(Request $request, string $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->update($request->all());
        return redirect()->route('destinations.index');
    }


    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('destinations.index')->with('success', 'El destino fue eliminado correctamente');
    }
}
