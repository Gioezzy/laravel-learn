@extends('layout.main')
@section('title')
    Daftar Dosen
@endsection
@section('content')
    <h1>Daftar Dosen jurusan ti</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Nip</th>
                <th>No Hp</th>
                <th>Email</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dsn as $dosen)
                <tr>
                    <td>{{ $dosen->id }}</td>
                    <td>{{ $dosen->name }} </td>
                    <td>{{ $dosen->nip }} </td>
                    <td>{{ $dosen->nohp }} </td>
                    <td>{{ $dosen->email }} </td>
                    <td>{{ $dosen->alamat }} </td>

                </tr>
            @endforeach
    </table>
@endsection
@section('scripts')
