@extends('layout.main')
@section('title')
    Daftar Dosen PNP
@endsection
@section('content')
    <div class="form-container">
        <h2>Tambah Dosen</h2>
        <form action="{{ route('dosen.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>nip</label>
                <input type="text" name="nip" required>
            </div>

            <div class="form-group">
                <label>No HP:</label>
                <input type="nohp" name="nohp" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email">
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <input type="text" name="alamat">
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>
@endsection
