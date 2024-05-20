@extends('layouts.app')
<!-- Styles -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@section('content')
    <div class="container">
        <h1>Daftar Anggota</h1>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary mb-3">Tambah Anggota</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anggotas as $anggota)
                    <tr>
                        <td>{{ $anggota->id }}</td>
                        <td>{{ $anggota->nama }}</td>
                        <td>{{ $anggota->alamat }}</td>
                        <td>{{ $anggota->telepon }}</td>
                        <td>
                            <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
