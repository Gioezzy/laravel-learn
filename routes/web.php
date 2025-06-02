<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\mahasiswa\MahasiswaController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Dosen\DosenController;
use App\Http\Controllers\Dosen\DosenpnpController;
use App\Http\Controllers\Dosen\DosentiController;
use App\Http\Controllers\Pengguna\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ToDoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);


Route::view('/helo', 'helo', ["name" => "Qalbi"]);

// Route::get('/profile', function () {
//     echo '<h1>Profile</h1>';
//     return '<p>Profile page</p>';
// });

Route::get('/listmahasiswa', function () {
    $arrmhs = [
        'fail',
        'fajar',
        'lutfi',
        'debby'
    ];
    return view('akademik.mahasiswa', ['mhs' => $arrmhs]);
});

Route::get(
    '/listmahasiswaa',
    function () {
        $mhs1 = "Qalbi";
        $mhs2 = "Fajar";
        $mhs3 = "Lutfi";
        return view('akademik.mahasiswalist', compact('mhs1', 'mhs2', 'mhs3'));
    }
);

Route::get('/nilaimahasiswa', function () {
    $nama = "Qalbi";
    $nim = "1905021001";
    $total_nilai = 90;
    return view('akademik.nilaimahasiswa', compact('nama', 'nim', 'total_nilai'));
});

Route::get('/nilaiswitch', function () {
    $nama = "Qalbi";
    $nim = "1905021001";
    $total_nilai = 80;
    return view('akademik.nilaiswitch', compact('nama', 'nim', 'total_nilai'));
});

Route::get('/nilailoop', function () {
    $nama = "Qalbi";
    $nim = "1905021001";
    $total_nilai = 80;
    return view('akademik.nilailoop
    ', compact('nama', 'nim', 'total_nilai'));
});
Route::get('/whileloop', function () {
    $nama = "Qalbi";
    $nim = "1905021001";
    $total_nilai = 80;
    return view('akademik.whileloop
    ', compact('nama', 'nim', 'total_nilai'));
});
Route::get('/foreach', function () {
    $nama = "Qalbi";
    $nim = "1905021001";
    $total_nilai = [50, 60, 70, 80, 90];
    return view('akademik.foreach
    ', compact('nama', 'nim', 'total_nilai'));
});
Route::get('/forelse', function () {
    $nama = "Qalbi";
    $nim = "1905021001";
    $total_nilai = [50, 60, 70, 80, 90];
    return view('akademik.foreach
    ', compact('nama', 'nim', 'total_nilai'));
});
Route::get('/continue', function () {
    $nama = "Qalbi";
    $nim = "1905021001";
    $total_nilai = [20, 80, 34, 70, 90, 35];
    return view('akademik.foreach
    ', compact('nama', 'nim', 'total_nilai'));
});
Route::get('/break', function () {
    $nama = "Qalbi";
    $nim = "1905021001";
    $total_nilai = [20, 80, 34, 70, 90, 35];
    return view('akademik.foreach
    ', compact('nama', 'nim', 'total_nilai'));
});

Route::get('/mahasiswati', function () {
    $arrMhs = ['Gio', 'Fajar', 'Lutfi', 'Debby', 'Hanif', 'Dimas', 'Rizky', 'Rizal', 'Qalbi'];
    return view('akademik.mahasiswapnp', ['mhs' => $arrMhs]);
})->name('mahasiswati');

Route::get('/pnp/{jurusan}/{prodi}', function ($jurusan, $prodi) {
    $data = [$jurusan, $prodi];
    return view('akademik.prodi')->with('prodi', $data);
})->name('prodi');

// Route testing
// Route::get('/mahasiswa/ti/gio', function () {
//     echo "<p style='color: red;'>Mahasiswa TI Gio</p>";
//     return "<h1 style='color: blue;'>Mahasiswa TI Gio</h1>";
// });


// //Route with parameter
// Route::get('/mahasiswa/{prodi}/{nama}', function ($prodi, $nama) {
//     return "<p>Mahasiswa <b> $nama </b> dengan prodi $prodi </p>";
// });

// Route::get('/hitungusia/{nama}/{tahunlahir}', function ($nama, $tahun_lahir){
//     $usia = date('Y') - $tahun_lahir;
//     return "<p style='color: red; fontsize: 45px;'>Hai $nama dengan tahun lahir $tahun_lahir sekarang berusia $usia</p>";
// });

//Route with optional parameter
Route::get('/hitungusia/{nama?}/{tahunlahir?}', function ($nama = 'qalbi', $tahun_lahir = null) {
    if ($tahun_lahir == null) {
        return "<p style='color: red; fontsize: 45px;'>Hai $nama, tahun lahir tidak diketahui</p>";
    }
    $usia = date('Y') - $tahun_lahir;
    return "<p style='color: red; fontsize: 45px;'>Hai $nama dengan tahun lahir $tahun_lahir sekarang berusia $usia</p>";
});

//Route with regular expression
Route::get('/user/{id}', function ($id) {
    return "<p>User admin dengan ID: $id</p>";
})->where('id', '[0-9]+');

//Route redirect
Route::redirect('/admin', '/profile');

//Route group
Route::prefix('/login')->group(function () {
    Route::get('/mahasiswa', function () {
        return view('welcome');
    });

    Route::get('/admin', function () {
        return view('welcome');
    });

    // Route::get('/dosen', function(){
    //     return "<p>Halaman login dosen</p>";
    // });
});

//route fallback
Route::fallback(function () {
    return view('notfound');
});

//route post
Route::post('/submit', function () {
    return 'Submitted';
});

//route put
Route::put('/update/{$id}', function ($id) {
    return 'update data for id' . $id;
});

//route delete
Route::delete('/delete/{$id}', function ($id) {
    return 'delete data for id' . $id;
});

Route::get('/teknisi', [TeknisiController::class, 'index']);
Route::get('/teknisi/create', [TeknisiController::class, 'create']);
Route::post('/teknisi/store', [TeknisiController::class, 'store']);
Route::get('/teknisi/show/{id}', [TeknisiController::class, 'show']);
Route::get('/teknisi/edit/{id}', [TeknisiController::class, 'edit']);
Route::put('/teknisi/update/{id}', [TeknisiController::class, 'update']);
Route::delete('/teknisi/destroy/{id}', [TeknisiController::class, 'destroy']);

// Route::apiResource('users',UserController::class);
Route::get('/insert-sql', [MahasiswaController::class, 'insertSql']);
Route::get('/insert-prepared', [MahasiswaController::class, 'insertPrepared']);
Route::get('/insert-binding', [MahasiswaController::class, 'insertBinding']);
Route::get('/update', [MahasiswaController::class, 'update']);
Route::get('/delete', [MahasiswaController::class, 'delete']);
Route::get('/select', [MahasiswaController::class, 'select']);
Route::get('/select-tampil', [MahasiswaController::class, 'selectTampil']);
Route::get('/select-view', [MahasiswaController::class, 'selectView']);
Route::get('/select-where', [MahasiswaController::class, 'selectWhere']);
Route::get('/statement', [MahasiswaController::class, 'statement']);


//dosen
Route::get('/cek-objek', [DosenController::class, 'cekObjek']);
Route::get('/insert', [DosenController::class, 'insert']);
Route::get('/mass-assignment', [DosenController::class, 'massAssignment']);
Route::get('/updatedosen', [DosenController::class, 'updatedosen']);
Route::get('/updatedosen-where', [DosenController::class, 'updateWhere']);
Route::get('/mass-update', [DosenController::class, 'massUpdate']);
Route::get('/deletedosen', [DosenController::class, 'delete']);
Route::get('/destroydosen', [DosenController::class, 'destroy']);
Route::get('/mass-delete', [DosenController::class, 'massDelete']);
Route::get('/all', [DosenController::class, 'all']);
Route::get('/all-view', [DosenController::class, 'allView']);
Route::get('/get-where', [DosenController::class, 'getWhere']);
Route::get('/test-where', [DosenController::class, 'testWhere']);
Route::get('/first', [DosenController::class, 'first']);
Route::get('/find', [DosenController::class, 'find']);
Route::get('/latest', [DosenController::class, 'latest']);
Route::get('/limit', [DosenController::class, 'limit']);
Route::get('/skip-take', [DosenController::class, 'skipTake']);
Route::get('/soft-delete', [DosenController::class, 'softDelete']);
Route::get('/with-trashed', [DosenController::class, 'withTrashed']);
Route::get('/restore', [DosenController::class, 'restore']);
Route::get('/force-delete', [DosenController::class, 'forceDelete']);

//query builder
Route::get('/dosen', [DosenpnpController::class, 'index'])->name('dosen.index');
Route::get('/dosen/create', [DosenpnpController::class, 'create'])->name('dosen.create');
Route::post('/dosen', [DosenpnpController::class, 'store'])->name('dosen.store');
Route::get('/dosen/{id}/edit', [DosenpnpController::class, 'edit'])->name('dosen.edit');
Route::put('/dosen/{id}', [DosenpnpController::class, 'update'])->name('dosen.update');
Route::delete('/dosen/{id}', [DosenpnpController::class, 'destroy'])->name('dosen.destroy');

//eloquent ORM
Route::get('/dosenti', [DosentiController::class, 'index'])->name('dosenti.index');
Route::get('/dosenti/create', [DosentiController::class, 'create'])->name('dosenti.create');
Route::post('/dosenti', [DosentiController::class, 'store'])->name('dosenti.store');
Route::get('/dosenti/{id}/edit', [DosentiController::class, 'edit'])->name('dosenti.edit');
Route::put('/dosenti/{id}', [DosentiController::class, 'update'])->name('dosenti.update');
Route::delete('/dosenti/{id}', [DosentiController::class, 'destroy'])->name('dosenti.destroy');


// Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('penggunas.create');
// Route::post('/pengguna', [PenggunaController::class, 'store'])->name('penggunas.store');
// Route::get('/pengguna', [PenggunaController::class, 'index'])->name('penggunas.index');
// Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('penggunas.edit');
// Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('penggunas.update');
// Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('penggunas.destroy');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::middleware(['auth','admin'])->group(function () {
        Route::resource('penggunas', PenggunaController::class);
        Route::resource('books', BookController::class);
        Route::resource('sales', SaleController::class);
        Route::get('todos', [ToDoController::class,'index'])->name('todos.index');
        Route::post('todos', [ToDoController::class,'store'])->name('todos.store');
        Route::put('todos/{id}', [ToDoController::class,'update'])->name('todos.update');
        Route::delete('todos/{id}', [ToDoController::class,'destroy'])->name('todos.destroy');
    });

});

require __DIR__ . '/auth.php';
