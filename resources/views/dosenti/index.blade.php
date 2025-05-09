@extends('layout.main')
@section('title')
    Daftar Dosen
@endsection
@section('content')
    <h1>Data Dosen</h1>
    <a href="{{ route('dosenti.create') }}">Tambah Dosen</a>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Nip</th>
            <th>No Hp</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        @foreach ($dosens as $lecturer)
            <tr>
                <td>{{ $lecturer->name }}</td>
                <td>{{ $lecturer->nip }}</td>
                <td>{{ $lecturer->nohp }}</td>
                <td>{{ $lecturer->email }}</td>
                <td>{{ $lecturer->alamat }}</td>
                <td>
                    <a href="{{ route('dosenti.edit', $lecturer->id) }}">Edit</a>
                    <form action="{{ route('dosenti.destroy', $lecturer->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
