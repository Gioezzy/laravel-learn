@extends('layout.main')
@section('title')
    Daftar Mahasiswa
@endsection
@section('content')
    <h1>Daftar Mahasiswa jurusan ti</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Prodi</th>
                <th>Email</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mhs as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->id }}</td>
                    <td>{{ $mahasiswa->name }} </td>
                    <td>{{ $mahasiswa->nim }} </td>
                    <td>{{ $mahasiswa->jurusan }} </td>
                    <td>{{ $mahasiswa->prodi }} </td>
                    <td>{{ $mahasiswa->email }} </td>
                    <td>{{ $mahasiswa->alamat }} </td>
                </tr>
            @endforeach
    </table>
    <div class="pagination-container">
        {{ $mhs->links() }}
    </div>
@endsection
