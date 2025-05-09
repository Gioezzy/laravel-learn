@extends('layout.main')
@section('title', "Daftar Dosen Jurusan")
@section('content')
<h1>Daftar Mahasiswa Jurusan</h1>
<ol>
    @forelse ( $dsn as $namadosen )
        <li>{{$namadosen}}</li>
        @empty
        <div class="alert alert-warning d-inline-block">
            Data dosen tidak ada, Silakhan isi array untuk data dosen </div>
    @endforelse
</ol>
@endsection
