@extends('layout.main')
@section('title')
    Daftar Dosen
@endsection
@section('content')
    <div class="form-container">
        <h2>Tambah Dosen</h2>
        <form action="{{ route('dosens.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label>nip</label>
                <input type="text" name="nik" required>
            </div>

            <div class="form-group">
                <label>No HP:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="nohp">
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <input type="text" name="alamat">
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>
@endsection
