<?php

namespace App\Http\Controllers;

use App\Models\DataJemaat;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDataJemaatRequest;

class DataJemaatController extends Controller
{
    public function index(Request $request)
    {
        // Ambil daftar sektor unik
        $sektors = DataJemaat::distinct()
                    ->whereNotNull('sektor')
                    ->pluck('sektor');

        // Mulai query
        $query = DataJemaat::query();

        // FILTER SEKTOR
        if ($request->filled('sektor')) {
            $query->where('sektor', $request->sektor);
        }

        // SEARCH NAMA
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where('nama_lengkap', 'LIKE', '%' . $search . '%');

            // Prioritaskan nama yang paling cocok tampil di atas
            $query->orderByRaw("
                CASE
                    WHEN nama_lengkap LIKE ? THEN 1
                    WHEN nama_lengkap LIKE ? THEN 2
                    ELSE 3
                END
            ", [
                $search . '%',     // Nama diawali keyword
                '%' . $search . '%' // Nama mengandung keyword
            ]);

            // Setelah itu urut alfabet
            $query->orderBy('nama_lengkap', 'asc');

        } else {

            // Jika tidak search -> tampil terbaru
            $query->orderBy('created_at', 'desc');
        }

        // Statistik
        $totalJemaat = (clone $query)->count();
        $totalLaki = (clone $query)->where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = (clone $query)->where('jenis_kelamin', 'Perempuan')->count();
        $totalBaptis = (clone $query)->where('keterangan_baptis', 'Sudah')->count();

        // Pagination
        $data = $query->paginate(10)->withQueryString();

        return view('operator.data_jemaat', compact(
            'data',
            'sektors',
            'totalJemaat',
            'totalLaki',
            'totalPerempuan',
            'totalBaptis'
        ));
    }

    public function create()
    {
        return view('operator.create');
    }

    public function store(StoreDataJemaatRequest $request)
    {
        $validatedData = $request->validated();

        // 2. Olah Array Pelayanan (Checkbox) menjadi Teks
        if ($request->has('pelayanan')) {
            $validatedData['pelayanan'] = implode(', ', $request->pelayanan);
        } else {
            $validatedData['pelayanan'] = null;
        }

        // 3. PANGGIL MESIN GENERATOR DI SINI
        $validatedData['kode_jemaat'] = $this->generateKodeJemaat();

        // 4. Simpan ke database
        \App\Models\DataJemaat::create($validatedData);

        // 5. Kembali ke halaman tabel dengan pesan sukses
        return response()->json([
            'success' => true,
            'message' => 'Data jemaat berhasil ditambahkan'
        ]);
    }

    // Menampilkan halaman form edit data jemaat
    public function edit($id)
    {
        $jemaat = \App\Models\DataJemaat::findOrFail($id);
        return view('operator.edit', compact('jemaat'));
    }

    // Menyimpan perubahan data dari form Edit
    public function update(Request $request, $id)
    {
        $jemaat = DataJemaat::findOrFail($id);

        // 1. Validasi Data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'nullable|string|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'golongan_darah' => 'nullable|string',
            'nomor_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'status_jemaat' => 'nullable|string',
            'status_anggota' => 'nullable|string',
            'keterangan_baptis' => 'nullable|string',
            'sektor' => 'nullable|string',
            'unit_doa' => 'nullable|string', 
            'pelayanan' => 'nullable|array', 
        ]);

        // 2. Olah Array Pelayanan (Checkbox) menjadi Teks
        if ($request->has('pelayanan')) {
            $validatedData['pelayanan'] = implode(', ', $request->pelayanan);
        } else {
            $validatedData['pelayanan'] = null; // Kosongkan jika tidak ada yang dicentang
        }

        // 3. Simpan perubahan ke database
        $jemaat->update($validatedData);

        // 4. Kembali ke halaman tabel dengan pesan sukses
        return redirect()->route('jemaat.index')
                        ->with('success', 'Puji Tuhan! Data jemaat atas nama ' . $jemaat->nama_lengkap . ' berhasil diperbarui.');
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
            'sektor' => 'nullable|string',
            'unit_doa' => 'nullable|string', 
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