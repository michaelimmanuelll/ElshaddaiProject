<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJemaat extends Model
{
    use HasFactory;

    protected $table = 'data_jemaat'; // Ganti dengan nama tabel kamu

    protected $fillable = [
    'kode_jemaat', // Kolom baru untuk menampung hasil generate barcode
    'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 
    'keterangan_baptis', 'golongan_darah', 'nomor_hp', 'alamat', 
    'status_jemaat', 'status_anggota', 'komisi', 'sektor', 
    'unit_doa', 'pelayanan'
    ];

    
}
