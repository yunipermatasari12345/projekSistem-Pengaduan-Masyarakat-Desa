@extends('layouts.app')

@section('content')
<h3>Detail Pengaduan</h3>
<ul class="list-group">
    <li class="list-group-item"><strong>Nama:</strong> {{ $pengaduan->nama }}</li>
    <li class="list-group-item"><strong>Email:</strong> {{ $pengaduan->email }}</li>
    <li class="list-group-item"><strong>Kategori:</strong> {{ $pengaduan->kategori->nama }}</li>
    <li class="list-group-item"><strong>Isi:</strong> {{ $pengaduan->isi }}</li>
    <li class="list-group-item"><strong>Status:</strong> {{ $pengaduan->status }}</li>
</ul>

<form action="{{ route('pengaduan.updateStatus', $pengaduan->id) }}" method="POST" class="mt-3">
    @csrf
    <label>Ubah Status</label>
    <select name="status" class="form-control mb-2">
        <option value="Baru">Baru</option>
        <option value="Diproses">Diproses</option>
        <option value="Selesai">Selesai</option>
    </select>
    <button class="btn btn-success">Update Status</button>
</form>
@endsection
