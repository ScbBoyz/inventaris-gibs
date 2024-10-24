<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function index()
    {
        $officers = Officer::all();
        return view('pages.officer.index', compact('officers')); // Pastikan ini sesuai dengan folder Anda
    }

    public function create()
    {
        return view('pages.officer.create'); // Pastikan ini sesuai dengan folder Anda
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        Officer::create($request->all());

        return redirect()->route('officer.index')->with('success', 'Officer created successfully.'); // Mengganti dengan rute yang benar
    }

    public function edit(Officer $officer)
    {
        return view('pages.officer.edit', compact('officer')); // Pastikan ini sesuai dengan folder Anda
    }

    public function update(Request $request, Officer $officer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        $officer->update($request->all());

        return redirect()->route('officer.index')->with('success', 'Officer updated successfully.'); // Mengganti dengan rute yang benar
    }

    public function destroy(Officer $officer)
    {
        $officer->delete();

        return redirect()->route('officer.index')->with('success', 'Officer deleted successfully.'); // Mengganti dengan rute yang benar
    }
}
