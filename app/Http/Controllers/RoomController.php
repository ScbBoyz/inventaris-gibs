<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Building;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request, $building_id)
    {
        $building = Building::findOrFail($building_id);

        // Mendapatkan parameter pencarian dari request
        $search = $request->input('search');

        // Mengambil data rooms dengan filter
        $rooms = Room::where('building_id', $building_id)
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('number', 'like', "%{$search}%");
            })
            ->get();

        return view('pages.room.index', compact('building', 'rooms'));
    }

    public function create($building_id)
    {
        $building = Building::findOrFail($building_id);
        return view('pages.room.create', compact('building'));
    }

    public function store(Request $request, $building_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:50',
        ]);

        $room = new Room();
        $room->building_id = $building_id;
        $room->name = $request->name;
        $room->number = $request->number;
        $room->save();

        return redirect()->route('room.index', $building_id)
        ->with('success', 'Room added successfully.');

    }

    public function edit($building_id, $room_id)
    {
        $building = Building::findOrFail($building_id);
        $room = Room::findOrFail($room_id);

        return view('pages.room.edit', compact('building', 'room'));
    }

    public function update(Request $request, $building_id, $room_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:50',
        ]);

        $room = Room::findOrFail($room_id);
        $room->name = $request->name;
        $room->number = $request->number;
        $room->save();

        return redirect()->route('room.index', $building_id)
            ->with('success', 'Room updated successfully.');
    }

    public function destroy($building_id, $room_id)
    {
        $room = Room::findOrFail($room_id);
        $room->delete();

        return redirect()->route('room.index', $building_id)
            ->with('success', 'Room deleted successfully.');
    }
}
