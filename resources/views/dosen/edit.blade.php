@extends('layout.main')
@section('title')
    Edit Dosen
@endsection
@section('content')
    <h1>Edit Data Dosen</h1>

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="{{ $dosen->name }}" required>
        <br>

        <label for="nip">Nip:</label>
        <input type="text" id="nip" name="nip" value="{{ $dosen->nip }}" required>
        <br>

        <label for="nohp">No HP:</label>
        <input type="nohp" id="nohp" name="nohp" value="{{ $dosen->nohp }}" required>
        <br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="{{ $dosen->email }}">
        <br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="{{ $dosen->alamat }}">
        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="{{ route('dosen.index') }}">Kembali ke Daftar Dosen</a>
@endsection
