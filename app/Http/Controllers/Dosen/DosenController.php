<?php

namespace App\Http\Controllers\dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dosen; // Pastikan Anda mengimpor model Dosen

class DosenController extends Controller
{
    public function cekObjek(){
        $dosen = new Dosen();
        dd($dosen);
    }

    public function insert(){
        $dosen = new Dosen();
        $dosen -> name = "Dimas";
        $dosen -> nip = "2311082019";
        $dosen -> nohp = "08318259121";
        $dosen -> email = "dimaas@admin.com";
        $dosen -> alamat = "Jl. padang";
        $dosen -> save();
        dd($dosen);
        return "Data Dosen berhasil disimpan";
    }

    public function massAssignment() {
        $dosen1 = Dosen::create(
            [
                'name' => 'Qalbi',
                'nip' => '1905021001',
                'nohp' => '08123456789',
                'email' => 'qalbi@admin.com',
                'alamat' => 'Jl. padang'
            ]
            );
            dump($dosen1);
        $dosen2 = Dosen::create(
            [
                'name' => 'Dimas',
                'nip' => '190501232001',
                'nohp' => '08123556789',
                'email' => 'dimas@admin.com',
                'alamat' => 'Jl. padang'
            ]
            );
            dump($dosen2);
    }

    public function updatedosen(){
        $dosen = Dosen::find(4);
        $dosen -> name = "Asep";
        $dosen -> nip = "1905021002";
        $dosen -> nohp = "089883984934";
        $dosen -> email = "asep@test.com";
        $dosen -> alamat = "Jl. bukit";
        $dosen -> save();
        dump($dosen);
    }

    public function updateWhere(){
        $dosen = Dosen::where('id', 4)->first();
        $dosen -> name = "qalbi";
        $dosen -> nip = "29043949";
        $dosen -> nohp = "089883984934";
        $dosen -> email = "asep@test.com";
        $dosen -> alamat = "Jl. bukit";
        $dosen -> save();
        dump($dosen);
    }

    public function massUpdate(){
        $dosen = Dosen::where('nohp', '089883984934')->first()->update(
            [
                'alamat' => "jalan jalan",
                //'keahlian' => "cloud platform",
            ]
        );
        dump($dosen);
    }


    public function delete()
    {
        $dosen = Dosen::find(5);
        $dosen->delete();
        dd($dosen);
    }
    public function destroy()
    {
        $dosen = Dosen::destroy(8);
        dd($dosen);
    }


    public function massDelete()
    {
        $dosen = Dosen::where('keahlian', 'Data Analyst')->delete();
        dd($dosen);
    }

    public function all()
    {
        $dosen = Dosen::all();
        foreach ($dosen as $itemDosen) {
            echo $itemDosen->id . '<br>';
            echo $itemDosen->name . '<br>';
            echo $itemDosen->nip . '<br>';
            echo $itemDosen->email . '<br>';
            echo $itemDosen->nohp . '<br>';
            echo $itemDosen->alamat;
            echo '<hr>';
            //dd ($itemDosen);
        }
    }

    public function allView()
    {
        $dosen = Dosen::all();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }


    public function getWhere()
    {
        $dosen = Dosen::where('alamat', 'Jl. padang')
            ->orderBy('name', 'asc')
            ->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }

    public function testWhere()
    {
        $dosen = Dosen::where('alamat', 'Jl. padang')
            ->orderBy('nip', 'asc')
            ->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }

    public function first()
    {
        $dosen = Dosen::where('alamat', 'Jl. padang')->first();
        return view('akademik.dosen1', ['dosen' => $dosen]);
    }

    public function find()
    {
        $dosen = Dosen::find(4);
        return view('akademik.dosen1', ['dosen' => $dosen]);
    }

    public function latest(){
        $dosen = Dosen::latest()->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }

    public function limit(){
        $dosen = Dosen::latest()->limit(3)->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }

    public function skipTake(){
        $dosen = Dosen::orderBy("id")->skip(6)->take(7)->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }

    public function softDelete(){
        Dosen::where('id','4')->delete();
        return 'Data berhasil dihapus';
    }

    public function withTrashed(){
        $dosen = Dosen::withTrashed()->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }

    public function restore(){
        Dosen::withTrashed()->where('id','4')->restore();
        return "data berhasil di restore";
    }

    public function forceDelete(){
        Dosen::where('id','2')->forceDelete();
        return "data berhasil di hapus secara permanen";
    }
}
