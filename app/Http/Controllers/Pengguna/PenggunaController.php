<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pengguna\PenggunaStoreRequest;
use App\Http\Requests\Pengguna\PenggunaUpdateRequest;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penggunas = Pengguna::latest()->paginate(3);
        return view('penggunas.index', compact('penggunas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penggunas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PenggunaStoreRequest $request)
    {
        // option 1
        // $request->validate([
        //     'name' => 'required|string|max:100',
        //     'email' => 'required|email|unique:penggunas',
        //     'password' => 'required|min:6|max:25|confirmed',
        //     'phone' => 'nullable|digits_between:11,13'
        // ]);
        // Pengguna::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'phone' => $request->phone
        // ]);
        $penggunas = $request->validated();
        $penggunas['password'] = Hash::make($penggunas['password']);
        if($request->hasFile('file_upload')){
            $file = $request->file('file_upload');
            $filename = time(). '_'.$file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            $penggunas['file_upload'] = $path;
        }
        Pengguna::create($penggunas);
        return redirect()->route('penggunas.index')->with('success', 'Data pengguna berhasil ditambahkan');
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
        $pengguna = Pengguna::findOrFail($id);
        return view('penggunas.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PenggunaUpdateRequest $request, string $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:100',
        //     'email' => 'required|email|unique:penggunas,email'.$id,
        //     'password' => 'requiered|min:6|max:25|confirmed',
        //     'phone' => 'nullable|digits_between:11,13'
        // ]);
        // $pengguna = Pengguna::findOrFail($id);
        // $pengguna->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'phone' => $request->phone
        // ]);
        $penggunas = $request->validated();
        // $penggunas['password'] = Hash::make($penggunas['password']);
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update($penggunas);
        return redirect()->route('penggunas.index')->with('success', 'Data pengguna berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();
        return redirect()->route('penggunas.index')->witdh('success', 'Data pengguna berhasil dihapus');
    }
}
