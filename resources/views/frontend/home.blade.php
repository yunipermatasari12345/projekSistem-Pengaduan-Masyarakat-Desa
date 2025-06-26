@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="pengaduan-header text-center py-4 mb-3" style="background: linear-gradient(135deg, #3498db, #2c3e50);">
    <div class="container">
        <h2 class="fw-bold text-white mb-2">PENGADUAN MASYARAKAT</h2>
        <p class="text-light mb-0">Sampaikan keluhan dan masukan Anda</p>
    </div>
</div>

<div class="container">
    @if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <!-- Form Section -->
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h4 class="text-center mb-3" style="color: #2c3e50;">
                <i class="fas fa-edit me-1"></i>Form Pengaduan
            </h4>

            <form action="{{ route('pengaduan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori Pengaduan</label>
                    <select name="kategori_id" class="form-select" required>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Isi Pengaduan</label>
                    <textarea name="isi" class="form-control" rows="4" required></textarea>
                </div>
                <div class="d-grid mt-3">
                    <button class="btn btn-primary py-2" type="submit">
                        <i class="fas fa-paper-plane me-1"></i>Kirim Pengaduan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .pengaduan-header {
        border-radius: 0 0 10px 10px;
    }

    .card {
        border-radius: 8px;
    }

    .form-control, .form-select {
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #3498db;
        border: none;
    }
</style>
@endsection
