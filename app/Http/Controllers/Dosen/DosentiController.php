<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;

class DosentiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosenti.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosenti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|unique:dosen,nip',
            'nohp' => 'required',
            'email' => 'required|email|unique:dosen,email',
            'alamat' => 'required|string|max:255',
        ]);

        Dosen::create($request->all());

        return redirect()->route('dosenti.index')->with('success', 'Dosen created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosenti.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|unique:dosen,nip',
            'nohp' => 'required|string|max:15',
            'email' => 'required|email|unique:dosen,email',
            'alamat' => 'required|string|max:255',
        ]);
        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        return redirect()->route('dosenti.index')->with('success', 'Dosen updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosenti/index')->with('success', 'Dosen deleted successfully.');
    }
}
