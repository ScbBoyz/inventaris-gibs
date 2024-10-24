<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Room;
use App\Models\Building;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Menampilkan daftar inventaris
    public function index(Request $request, $building_id, $room_id)
    {
        $building = Building::findOrFail($building_id);
        $room = Room::findOrFail($room_id);

        $search = $request->input('search');

        $inventories = Inventory::when($search, function ($query) use ($search) {
                $query->where('good', 'like', "%{$search}%")
                    ->orWhere('not_good', 'like', "%{$search}%")
                    ->orWhere('bad', 'like', "%{$search}%")
                    ->orWhere('information', 'like', "%{$search}%");
            })
            ->get();

        // Kirimkan data ke view
        return view('pages.inventory.index', compact('inventories', 'building', 'room', 'building_id', 'room_id'));
    }

    // Menampilkan form untuk menambahkan inventaris
    public function create($building_id, $room_id)
    {
        $building = Building::findOrFail($building_id);
        $room = Room::findOrFail($room_id);
        $items = Item::all();

        // Mengirimkan data ke view
        return view('pages.inventory.create', compact('building', 'room', 'items', 'building_id', 'room_id'));
    }

    // Menyimpan inventaris baru
    public function store(Request $request, $building_id, $room_id)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'year' => 'required|integer',
            'good' => 'required|integer',
            'not_good' => 'required|integer',
            'bad' => 'required|integer',
            'quantity' => 'required|integer', // Menambahkan validasi quantity
            'information' => 'nullable|string|max:255',
        ]);

        Inventory::create([
            'room_id' => $room_id,
            'item_id' => $request->item_id,
            'year' => $request->year,
            'good' => $request->good,
            'not_good' => $request->not_good,
            'bad' => $request->bad,
            'quantity' => $request->quantity, // Menambahkan quantity ke dalam insert
            'information' => $request->information,
        ]);

        return redirect()->route('inventory.index', ['building' => $building_id, 'room' => $room_id])
            ->with('success', 'Inventory added successfully.');
    }

    // Menampilkan form untuk mengedit inventaris
    public function edit($id, $building_id, $room_id)
    {
        $inventory = Inventory::findOrFail($id);
        $building = Building::findOrFail($building_id);
        $room = Room::findOrFail($room_id);
        $items = Item::all();

        return view('pages.inventory.edit', compact('inventory', 'building', 'room', 'items'));
    }

    // Memperbarui inventaris
    public function update(Request $request, $building_id, $room_id, $inventory_id)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'year' => 'required|integer',
            'good' => 'required|integer',
            'not_good' => 'required|integer',
            'bad' => 'required|integer',
            'quantity' => 'required|integer', // Menambahkan validasi quantity
            'information' => 'nullable|string|max:255',
        ]);

        $inventory = Inventory::findOrFail($inventory_id);
        $inventory->update([
            'room_id' => $room_id,
            'item_id' => $validated['item_id'],
            'year' => $validated['year'],
            'good' => $validated['good'],
            'not_good' => $validated['not_good'],
            'bad' => $validated['bad'],
            'quantity' => $validated
        ]);

        return redirect()->route('inventory.index', ['building' => $building_id, 'room' => $room_id])
            ->with('success', 'Inventory updated successfully.');
    }

    // Menghapus inventaris
    public function destroy($building_id, $room_id, $inventory_id)
    {
        $inventory = Inventory::findOrFail($inventory_id);
        $inventory->delete();

        return redirect()->route('inventory.index', ['building' => $building_id, 'room' => $room_id])
            ->with('success', 'Inventory deleted successfully.');
    }
}
