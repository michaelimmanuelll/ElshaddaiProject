<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJemaat extends Model
{
    use HasFactory;

    protected $table = 'data_jemaat'; // Ganti dengan nama tabel kamu

    protected $fillable = [
        'id',
        'nama_lengkap',
        'kd_cabang',    
        'kd_keluarga',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'keterangan_baptis',
        'golongan_darah',
        'nomor_hp',
        'alamat',
        'status_jemaat',
        'status_anggota',
        'sektor',
        'unit_doa',
        'pelayanan',

    ];

    
}
