@extends('layouts.app')

@section('content')
<h3>Data Kategori</h3>
<a href="{{ route('kategori.create') }}" class="btn btn-primary mb-2">Tambah Kategori</a>
<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    @foreach($kategoris as $kategori)
    <tr>
        <td>{{ $kategori->nama }}</td>
        <td>
            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
