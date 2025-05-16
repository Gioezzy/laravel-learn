@extends('layout.main')
@section('content')
    <h2>Edit Pengguna</h2>
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('penggunas.update', $pengguna->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name', $pengguna->name) }}"><br>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $pengguna->email) }}"><br>
        <label>Telepon:</label>
        <input type="text" name="phone" value="{{ old('phone', $pengguna->phone) }}"><br>
        <label>File:</label>
        @if ($pengguna->file_upload)
            <img src="{{ asset('storage/' . $pengguna->file_upload) }}" alt="Foto pengguna" style="width: 200; height: auto;">
        @endif
        <label>Upload foto baru</label>
        <input type="file" name="file_upload" accept=".pdf, .jpg, .png, .jpeg">
        @error('file_upload')
            <br><small style="color: red;">{{ $message }}</small>
        @enderror
        <br>
        <button type="submit">Update</button>
    </form>
@endsection
