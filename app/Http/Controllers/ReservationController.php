<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Client;
use App\Models\Destination;
use App\Models\Package;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
    $search = $request->search;

    $reservations = Reservation::with(['client', 'destination', 'package'])
        ->when($search, function ($query, $search) {
        return $query->where(function ($subquery) use ($search) {
            $subquery->where('status', 'like', "%$search%")
            ->orWhereHas('client', function ($query) use ($search) {
                $query->where('first_name', 'like', "%$search%")
                ->orWhere('last_name', 'like', "%$search%");
            })
            ->orWhereHas('destination', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->orWhereHas('package', function ($query) use ($search) {
                $query->where('pack_name', 'like', "%$search%");
            });
        });
        })
        ->get();

    return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $clients = Client::all();
        $destinations = Destination::all();
        $packages = Package::all();
        return view('reservations.create', compact('clients', 'destinations', 'packages'));
    }

    public function store(Request $request)
    {
        Reservation::create($request->all());
        return redirect()->route('reservations.index')->with('success', 'La reservación fue creada correctamente');
    }

    public function show(string $id)
    {
        $reservation = Reservation::find($id);
        return view('reservations.show', compact('reservation'));
    }

    public function edit(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $clients = Client::all();
        $destinations = Destination::all();
        $packages = Package::all();
        return view('reservations.edit', compact('reservation', 'clients', 'destinations', 'packages'));
    }

    public function update(Request $request, string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'La reservación ha sido modificada correctamente');
    }

    public function destroy(string $id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'La reservación fue eliminada correctamente');
    }
}
