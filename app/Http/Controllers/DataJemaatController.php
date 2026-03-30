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
        $data = $query->orderBy('created_at', 'desc')->get();

        return view('operator.data_jemaat', compact('data', 'sektors'));
    }

    

    public function create()
    {
        return view('operator.create');
    }

    public function store(Request $request)
    {
        // Validasi data input dari form...
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            // ... (validasi lainnya) ...
        ]);

        // PANGGIL MESIN GENERATOR DI SINI
        $validatedData['kode_jemaat'] = $this->generateKodeJemaat();

        // Simpan ke database
        \App\Models\DataJemaat::create($validatedData);

        return redirect()->route('jemaat.index')
                         ->with('success', 'Data jemaat berhasil ditambahkan dengan Kode: ' . $validatedData['kode_jemaat']);
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

    /**
     * Fungsi untuk membuat Kode Jemaat Otomatis (Format: ELS-YYYY-NNNN)
     */
    private function generateKodeJemaat()
    {
        // 1. Buat awalan kode berdasarkan tahun saat ini (Contoh: ELS-2026-)
        $tahun = date('Y');
        $prefix = 'ELS-' . $tahun . '-';

        // 2. Cari jemaat terakhir yang mendaftar di tahun ini
        $jemaatTerakhir = \App\Models\DataJemaat::where('kode_jemaat', 'like', $prefix . '%')
                                                ->orderBy('kode_jemaat', 'desc')
                                                ->first();

        // 3. Tentukan nomor urut berikutnya
        if (!$jemaatTerakhir) {
            // Jika belum ada jemaat sama sekali di tahun ini, mulai dari 1
            $nomorUrut = 1;
        } else {
            // Jika sudah ada, ambil 4 angka terakhir dari kodenya, lalu tambah 1
            $kodeTerakhir = $jemaatTerakhir->kode_jemaat;
            $nomorTerakhir = (int) substr($kodeTerakhir, -4); // Mengambil 4 karakter dari belakang
            $nomorUrut = $nomorTerakhir + 1;
        }

        // 4. Gabungkan Prefix dan Nomor Urut (dijadikan 4 digit dengan angka 0 di depan)
        // Hasilnya: ELS-2026-0001
        $kodeBaru = $prefix . str_pad($nomorUrut, 4, '0', STR_PAD_LEFT);

        return $kodeBaru;
    }

    public function verifikasi($id)
    {
        $jemaat = \App\Models\DataJemaat::findOrFail($id);

        // Pastikan kita hanya memverifikasi data yang statusnya 'Menunggu Verifikasi'
        if ($jemaat->status_jemaat == 'Menunggu Verifikasi') {
            
            // 1. Ubah statusnya menjadi Anggota Jemaat resmi
            $jemaat->status_jemaat = 'Anggota Jemaat';
            
            // 2. Berikan Kode Jemaat otomatis dengan memanggil fungsi generator kita
            $jemaat->kode_jemaat = $this->generateKodeJemaat();
            
            // 3. Simpan perubahan ke database
            $jemaat->save();

            return redirect()->route('jemaat.index')
                             ->with('success', 'Puji Tuhan! Jemaat atas nama ' . $jemaat->nama_lengkap . ' berhasil diverifikasi dengan kode: ' . $jemaat->kode_jemaat);
        }

        return redirect()->route('jemaat.index')->with('error', 'Data ini sudah diverifikasi atau tidak valid.');
    }

    // Menampilkan halaman form publik
    public function formPendaftaran()
    {
        // Mengambil daftar sektor untuk pilihan di form
        $sektors = \App\Models\DataJemaat::distinct()->whereNotNull('sektor')->pluck('sektor');
        return view('publik.daftar', compact('sektors'));
    }

    // Menyimpan data dari form publik
    // Menyimpan data dari form publik
    public function simpanPendaftaran(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'keterangan_baptis' => 'nullable|string',
            'golongan_darah' => 'nullable|string',
            'nomor_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'status_jemaat' => 'required|string',
            'status_anggota' => 'required|string',
            'komisi' => 'nullable|string',
            'sektor' => 'nullable|string',
            // PERHATIKAN BARIS INI: Wajib string, bukan array!
            'unit_doa' => 'nullable|string', 
            // PERHATIKAN BARIS INI: Pelayanan tetap array karena dia pakai checkbox
            'pelayanan' => 'nullable|array', 
        ]);

        // Gabungkan array Pelayanan saja menjadi teks
        if ($request->has('pelayanan')) {
            $validatedData['pelayanan'] = implode(', ', $request->pelayanan);
        } else {
            $validatedData['pelayanan'] = null;
        }

        // Paksa status ke Ruang Tunggu
        $validatedData['status_jemaat'] = 'Menunggu Verifikasi'; 
        $validatedData['kode_jemaat'] = null;

        // Simpan ke Database
        \App\Models\DataJemaat::create($validatedData);

        return redirect()->route('pendaftaran.publik')
                         ->with('success', 'Puji Tuhan! Data berhasil dikirim. Silakan tunggu verifikasi dari Admin.');
    }
}