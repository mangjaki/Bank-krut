@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Tambah Pengurus</h1>
    <div class="card">
        <div class="card-header bg-dark text-white">Form Tambah Pengurus</div>
        <div class="card-body">
            <form action="{{ route('pengurus.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('pengurus.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection