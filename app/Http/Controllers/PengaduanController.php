<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    // Tampilkan semua pengaduan
    public function index()
    {
        $pengaduans = Pengaduan::with('kategori')->get();
        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    // Tampilkan detail pengaduan
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    // Update status pengaduan (diterima / diproses / selesai)
    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required']);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->back()->with('success', 'Status pengaduan berhasil diperbarui.');
    }

    // Hapus pengaduan
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
