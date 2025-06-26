@extends('layouts.app')

@section('content')
<h3>Form Pengaduan Masyarakat</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('pengaduan.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kategori Pengaduan</label>
        <select name="kategori_id" class="form-control" required>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Isi Pengaduan</label>
        <textarea name="isi" class="form-control" required></textarea>
    </div>
    <button class="btn btn-primary">Kirim Pengaduan</button>
</form>
@endsection
