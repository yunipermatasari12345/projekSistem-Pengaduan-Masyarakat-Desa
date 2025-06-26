@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Detail Pengaduan</h3>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Informasi Pengaduan</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Nama:</strong> {{ $pengaduan->nama }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $pengaduan->email }}</li>
            <li class="list-group-item"><strong>Kategori:</strong> {{ $pengaduan->kategori->nama }}</li>
            <li class="list-group-item"><strong>Isi:</strong> {{ $pengaduan->isi }}</li>
        </ul>
    </div>

    <!-- Bagian Status yang Dipisah -->
    <div class="card mt-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Status Pengaduan</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0">Status Saat Ini:</h4>
                    <span class="badge badge-pill badge-{{
                        $pengaduan->status == 'Baru' ? 'warning' :
                        ($pengaduan->status == 'Diproses' ? 'primary' : 'success')
                    }} p-2 mt-2" style="font-size: 1rem;">
                        {{ $pengaduan->status }}
                    </span>
                </div>

                <form action="{{ route('pengaduan.updateStatus', $pengaduan->id) }}" method="POST" class="ml-4">
                    @csrf
                    <div class="form-group mb-0">
                        <label for="status"><strong>Ubah Status:</strong></label>
                        <div class="input-group">
                            <select name="status" id="status" class="form-control">
                                <option value="Baru">Baru</option>
                                <option value="Diproses">Diproses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
