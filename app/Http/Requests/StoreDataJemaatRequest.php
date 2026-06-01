<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataJemaatRequest extends FormRequest
{
    /**
     * Apakah user boleh akses request ini?
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rules validasi
     */
    public function rules(): array
    {
        return [

            'nama_lengkap' => 'required|string|max:255',

            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',

            'tempat_lahir' => 'nullable|string|max:100',

            'tanggal_lahir' => 'nullable|date',

            'golongan_darah' => 'nullable|in:A,B,AB,O,Tidak Tahu',

            'nomor_hp' => 'required|digits_between:10,15',

            'alamat' => 'nullable|string|max:500',

            'status_jemaat' => 'nullable|string',

            'status_anggota' => 'nullable|string',

            'keterangan_baptis' => 'nullable|string',

            'sektor' => 'nullable|string',

            'unit_doa' => 'nullable|string',

            'pelayanan' => 'nullable|array',
        ];
    }

    /**
     * Custom pesan error
     */
    public function messages(): array
    {
        return [

            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',

            'nomor_hp.required' => 'Nomor HP wajib diisi.',

            'nomor_hp.digits_between' => 'Nomor HP harus 10 sampai 15 digit.',

            'tanggal_lahir.date' => 'Format tanggal tidak valid.',
        ];
    }
}