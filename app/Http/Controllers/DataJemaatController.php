<?php

namespace App\Http\Controllers;

use App\Models\DataJemaat;
use Illuminate\Http\Request;

class DataJemaatController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil daftar sektor unik untuk dropdown filter
        $sektors = DataJemaat::distinct()->whereNotNull('sektor')->pluck('sektor');

        $query = DataJemaat::query();

        // 2. Terapkan filter jika ada sektor yang dipilih
        if ($request->filled('sektor')) {
            $query->where('sektor', $request->sektor);
        }

        // 3. Urutkan berdasarkan Kode Cabang lalu Kode Keluarga
        $data = $query->orderBy('kd_cabang', 'asc')
                      ->orderBy('kd_keluarga', 'asc')
                      ->get();

        return view('operator.data_jemaat', compact('data', 'sektors'));
    }

    public function create()
    {
        return view('operator.create');
    }

    public function store(Request $request)
    {
        // ... kode simpan data Anda yang sudah ada ...
    }

    public function edit($id)
    {
        $jemaat = DataJemaat::findOrFail($id);
        return view('operator.edit', compact('jemaat'));
    }

    public function destroy($id)
    {
        $jemaat = DataJemaat::findOrFail($id);
        $jemaat->delete();
        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil dihapus.');
    }
}