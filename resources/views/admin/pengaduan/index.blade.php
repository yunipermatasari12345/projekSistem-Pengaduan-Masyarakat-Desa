<!-- resources/views/admin/pengaduan/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Daftar Pengaduan Masyarakat</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kategori</th>
                <th>Isi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengaduans as $pengaduan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pengaduan->nama }}</td>
                    <td>{{ $pengaduan->email }}</td>
                    <td>{{ $pengaduan->kategori->nama }}</td>
                    <td>{{ $pengaduan->isi }}</td>
                    <td>{{ ucfirst($pengaduan->status) }}</td>
                    <td>
                        <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="btn btn-info btn-sm">Lihat</a>

                        <form action="{{ route('pengaduan.destroy', $pengaduan->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data pengaduan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
