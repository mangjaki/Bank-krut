@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Pengurus</h1>
    <div class="mb-3">
        <a href="{{ route('pengurus.create') }}" class="btn btn-primary">Tambah Pengurus</a>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">Daftar Pengurus</div>
        <div class="card-body">
            @if($pengurus->isEmpty())
                <p class="text-center">Tidak ada data pengurus.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengurus as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->telepon }}</td>
                                <td>
                                    <a href="{{ route('pengurus.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('pengurus.destroy', $p->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus pengurus ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection