<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('frontend.home', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'isi' => 'required',
            'kategori_id' => 'required'
        ]);

        Pengaduan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'isi' => $request->isi,
            'kategori_id' => $request->kategori_id
        ]);

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim.');
    }
}
