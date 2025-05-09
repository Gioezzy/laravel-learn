<?php

namespace App\Http\Controllers\dosen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Models\Dosen;

class DosenpnpController extends Controller
{
    public function index()
    {
        $dosens = DB::table('dosens')->paginate();
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosen/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'nohp' => 'nullable|string|max:11',
            'email' => 'required|email|unique:dosens,email',
            'alamat' => 'nullable|string|max:255',
        ]);

        DB::table('dosens')->insert([
            'name' => $request->name,
            'nip' => $request->nip,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan');
    }

    public function show(string $id)
    {
        return view('dosen.create');
    }

    public function edit(string $id)
    {
        $dosen = DB::table('dosens')->where('id', $id)->first();
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|numeric|unique:dosens,nip,'.$id,
            'nohp' => 'nullable|string|max:12',
            'email' => 'required|email|unique:dosens,email,'.$id,
            'alamat' => 'nullable|string|max:255',
        ]);

        DB::table('dosens')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'nip' => $request->nip,
                'nohp' => $request->nohp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'updated_at' => now()
            ]);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diupdate');
    }

    public function destroy(string $id)
    {
        DB::table('dosen')->where('id', $id)->delete();
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus');
    }
}
