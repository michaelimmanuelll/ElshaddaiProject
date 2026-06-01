@extends('layouts.admin')

@section('content')

<div class="content__header content__boxed overlapping">
    <div class="content__wrap">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

            <div>
                <h1 class="page-title mb-1">Tambah Data Jemaat</h1>
                <p class="lead mb-0">
                    Form input data jemaat GPdI El-Shaddai
                </p>
            </div>

            <div>
                <a href="{{ route('jemaat.index') }}" class="btn btn-light">
                    <i class="fas fa-arrow-left me-1"></i>
                    Kembali
                </a>
            </div>

        </div>

    </div>
</div>

<div class="content__boxed">
    <div class="content__wrap">


        {{-- ALERT ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi Kesalahan!</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="formJemaat">
            @csrf

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-id-card me-2"></i>
                        Data Pribadi
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label fw-bold">
                                Nama Lengkap
                            </label>

                            <input type="text"
                                name="nama_lengkap"
                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                value="{{ old('nama_lengkap') }}"
                                placeholder="Contoh: Johny Sumarauw">

                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">
                                Jenis Kelamin
                            </label>

                            <select name="jenis_kelamin" class="form-select">
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">
                                Tempat Lahir
                            </label>

                            <input type="text"
                                name="tempat_lahir"
                                class="form-control"
                                value="{{ old('tempat_lahir') }}"
                                placeholder="Contoh: Makassar">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">
                                Tanggal Lahir
                            </label>

                            <input type="date"
                                   name="tanggal_lahir"
                                   class="form-control"
                                   value="{{ old('tanggal_lahir') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">
                                Golongan Darah
                            </label>

                            <select name="golongan_darah" class="form-select">
                                <option value="">-- Pilih --</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                                <option value="Tidak Tahu">Tidak Tahu</option>
                            </select>
                        </div>

                    </div>

                </div>
            </div>

            {{-- KONTAK --}}
            <div class="card shadow-sm mb-4">

                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-phone-alt me-2"></i>
                        Kontak & Alamat
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label fw-bold">
                                Nomor HP / WhatsApp
                            </label>

                            <input type="text"
                                name="nomor_hp"
                                class="form-control @error('nomor_hp') is-invalid @enderror"
                                value="{{ old('nomor_hp') }}"
                                placeholder="Contoh: 081234567890"
                                maxlength="15"
                                autocomplete="tel"
                                required>

                            <small class="text-muted">
                                Masukkan nomor aktif tanpa spasi atau simbol.
                            </small>

                            @error('nomor_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">
                                Alamat
                            </label>

                            <textarea name="alamat"
                                class="form-control"
                                rows="3"
                                placeholder="Contoh: Jl. Perintis Kemerdekaan No. 10">{{ old('alamat') }}</textarea>
                        </div>

                    </div>

                </div>
            </div>

            {{-- STATUS --}}
            <div class="card shadow-sm mb-4">

                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-church me-2"></i>
                        Status Jemaat
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-md-4">
                            <label class="form-label fw-bold">
                                Status Jemaat
                            </label>

                            <select name="status_jemaat" class="form-select">
                                <option value="">-- Pilih --</option>
                                <option value="Anggota Jemaat">Anggota Jemaat</option>
                                <option value="Simpatisan">Simpatisan</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">
                                Kategori Usia
                            </label>

                            <select name="status_anggota" class="form-select">
                                <option value="">-- Pilih --</option>
                                <option value="Anak">Anak</option>
                                <option value="Remaja">Remaja</option>
                                <option value="Pemuda">Pemuda</option>
                                <option value="Ayah/Ibu">Ayah/Ibu</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">
                                Status Baptis
                            </label>

                            <select name="keterangan_baptis" class="form-select">
                                <option value="">-- Pilih --</option>
                                <option value="Sudah">Sudah Baptis</option>
                                <option value="Belum">Belum Baptis</option>
                            </select>
                        </div>

                    </div>

                </div>
            </div>

            {{-- SEKTOR & UNIT DOA --}}
<div class="card shadow-sm mb-4">

    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0">
            <i class="fas fa-map-marker-alt me-2"></i>
            Sektor & Unit Doa
        </h5>
    </div>

    <div class="card-body">

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label fw-bold">
                    Sektor
                </label>

                <select name="sektor" class="form-select">
                    <option value="">-- Pilih Sektor --</option>
                    <option value="Sektor Sion">Sektor Sion</option>
                    <option value="Sektor Pisga">Sektor Pisga</option>
                    <option value="Sektor Torsina">Sektor Torsina</option>
                    <option value="Sektor Hermon">Sektor Hermon</option>
                    <option value="Belum masuk sektor">Belum Masuk Sektor</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">
                    Unit Doa
                </label>

                <select name="unit_doa" class="form-select">
                    <option value="">-- Pilih Unit Doa --</option>
                    <option value="Antara">Antara</option>
                    <option value="BTP">BTP</option>
                    <option value="SMU.Soleman">SMU.Soleman</option>
                    <option value="Bontoramba">Bontoramba</option>
                    <option value="Katimbang">Katimbang</option>
                    <option value="Gereja">Gereja</option>
                    <option value="Telkomas">Telkomas</option>
                    <option value="Lanraki">Lanraki</option>
                    <option value="Angkatan Laut">Angkatan Laut</option>
                    <option value="Daya">Daya</option>
                    <option value="G. Daya Permai">G. Daya Permai</option>
                    <option value="Batara Ugi">Batara Ugi</option>
                    <option value="Hartaco">Hartaco</option>
                    <option value="Mangga III">Mangga III</option>
                    <option value="Villa Mutiara">Villa Mutiara</option>
                    <option value="Sudiang I">Sudiang I</option>
                    <option value="Sudiang II">Sudiang II</option>
                    <option value="Sudiang III">Sudiang III</option>
                    <option value="Pepabri">Pepabri</option>
                    <option value="Per. Sudiang">Per. Sudiang</option>
                    <option value="Belum Masuk Unit Doa">Belum Masuk Unit Doa</option>
                </select>
            </div>

        </div>

    </div>

</div>

{{-- PELAYANAN --}}
<div class="card shadow-sm mb-4">

    <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">
            <i class="fas fa-hands-helping me-2"></i>
            Pelayanan di Gereja
        </h5>
    </div>

    <div class="card-body">

        <div class="row g-3">

            @php
                $pelayananList = [
                    'PELNAP',
                    'PELRAP',
                    'PELPAP',
                    'PELWAP',
                    'PELPRIP',
                    'Bid. Doa',
                    'Bid. Multimedia',
                    'Bid. Keuangan',
                    'Bid. Pembangunan',
                    'Bid. Sosial',
                    'Bid. Sarana dan Prasarana',
                    'Bani Asaf',
                    'Belum Ada'
                ];
            @endphp

            @foreach($pelayananList as $pelayanan)
                <div class="col-md-4">
                    <div class="form-check">

                        <input class="form-check-input"
                               type="checkbox"
                               name="pelayanan[]"
                               value="{{ $pelayanan }}"
                               id="{{ Str::slug($pelayanan) }}"

                               {{ is_array(old('pelayanan')) && in_array($pelayanan, old('pelayanan')) ? 'checked' : '' }}>

                        <label class="form-check-label"
                               for="{{ Str::slug($pelayanan) }}">

                            {{ $pelayanan }}

                        </label>

                    </div>
                </div>
            @endforeach

        </div>

    </div>

</div>

            {{-- TOMBOL --}}
            <div class="d-flex flex-column flex-md-row justify-content-end gap-2 mb-5">

                <a href="{{ route('jemaat.index') }}"
                   class="btn btn-outline-secondary">

                    <i class="fas fa-times me-1"></i>
                    Batal
                </a>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="fas fa-save me-1"></i>
                    Simpan Data
                </button>

            </div>

        </form>

    </div>
</div>

<script>
document.querySelector('input[name="nomor_hp"]').addEventListener('input', function () {

    // Hanya izinkan angka
    this.value = this.value.replace(/[^0-9]/g, '');

});
</script>

@endsection

@push('scripts')
<script>

$('#formJemaat').submit(function(e) {

    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({

        url: "{{ route('jemaat.store') }}",
        type: "POST",
        data: formData,

        processData: false,
        contentType: false,

        success: function(response) {

            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data jemaat berhasil ditambahkan',
                confirmButtonColor: '#3085d6'
            });

            $('#formJemaat')[0].reset();

        },

        error: function(xhr) {

            let errors = xhr.responseJSON.errors;

            let errorText = '';

            $.each(errors, function(key, value) {
                errorText += value[0] + '<br>';
            });

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: errorText
            });

        }

    });

});

</script>
@endpush
