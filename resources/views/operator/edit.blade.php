@extends('layouts.admin')

@section('content')

    <div class="form-container">
        <div class="page-header">
            <div class="page-title">
                <i class="fas fa-user-edit"></i>
                <div>
                    <h1>Edit Data Jemaat</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/jemaat') }}">Data Jemaat</a></li>
                            <li class="breadcrumb-item active">Edit Jemaat</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <a href="{{ url('/jemaat') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            <div class="card-header-custom">
                <h5>
                    <i class="fas fa-edit"></i>
                    Memperbarui Data: {{ $jemaat->nama_lengkap }}
                </h5>
            </div>

            <div class="card-body-custom">
                <form action="{{ route('jemaat.update', $jemaat->id) }}" method="POST" id="jemaatForm">
                    @csrf
                    @method('PUT')
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-id-card"></i>
                            Data Pribadi
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label required-field">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" 
                                       value="{{ old('nama_lengkap', $jemaat->nama_lengkap) }}" required maxlength="100">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin', $jemaat->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $jemaat->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" 
                                       value="{{ old('tempat_lahir', $jemaat->tempat_lahir) }}" maxlength="100">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control"
                                       value="{{ old('tanggal_lahir', $jemaat->tanggal_lahir) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Golongan Darah</label>
                                <div class="radio-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" value="A" id="darah_a" {{ old('golongan_darah', $jemaat->golongan_darah) == 'A' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="darah_a">A</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" value="B" id="darah_b" {{ old('golongan_darah', $jemaat->golongan_darah) == 'B' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="darah_b">B</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" value="AB" id="darah_ab" {{ old('golongan_darah', $jemaat->golongan_darah) == 'AB' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="darah_ab">AB</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" value="O" id="darah_o" {{ old('golongan_darah', $jemaat->golongan_darah) == 'O' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="darah_o">O</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" value="Tidak Tahu" id="darah_tidaktahu">
                                        <label class="form-check-label" for="darah_tidaktahu">Tidak Tahu</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-address-book"></i>
                            Kontak & Alamat
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Nomor HP / WhatsApp</label>
                                <input type="text" name="nomor_hp" class="form-control" 
                                       value="{{ old('nomor_hp', $jemaat->nomor_hp) }}" maxlength="15">
                                <small class="form-text">Masukkan angka saja, contoh: 081234567890</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $jemaat->alamat) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-church"></i>
                            Status Jemaat
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Status Jemaat</label>
                                <select name="status_jemaat" class="form-select">
                                    <option value="">-- Pilih Status Jemaat --</option>
                                    <option value="Anggota Jemaat" {{ old('status_jemaat', $jemaat->status_jemaat) == 'Anggota Jemaat' ? 'selected' : '' }}>Anggota Jemaat</option>
                                    <option value="Simpatisan" {{ old('status_jemaat', $jemaat->status_jemaat) == 'Simpatisan' ? 'selected' : '' }}>Simpatisan</option>
                                    <option value="Menunggu Verifikasi" {{ old('status_jemaat', $jemaat->status_jemaat) == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Kategori Usia</label>
                                <select name="status_anggota" class="form-select">
                                    <option value="">-- Pilih Kategori Usia --</option>
                                    <option value="Anak" {{ old('status_anggota', $jemaat->status_anggota) == 'Anak' ? 'selected' : '' }}>Anak</option>
                                    <option value="Remaja" {{ old('status_anggota', $jemaat->status_anggota) == 'Remaja' ? 'selected' : '' }}>Remaja</option>
                                    <option value="Pemuda" {{ old('status_anggota', $jemaat->status_anggota) == 'Pemuda' ? 'selected' : '' }}>Pemuda</option>
                                    <option value="Ayah/Ibu" {{ old('status_anggota', $jemaat->status_anggota) == 'Ayah/Ibu' ? 'selected' : '' }}>Ayah/Ibu</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status Baptis</label>
                                <select name="keterangan_baptis" class="form-select">
                                    <option value="">-- Pilih Status Baptis --</option>
                                    <option value="Sudah" {{ old('keterangan_baptis', $jemaat->keterangan_baptis) == 'Sudah' ? 'selected' : '' }}>Sudah Baptis</option>
                                    <option value="Belum" {{ old('keterangan_baptis', $jemaat->keterangan_baptis) == 'Belum' ? 'selected' : '' }}>Belum Baptis</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-map-marker-alt"></i>
                            Sektor & Unit Doa
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Sektor</label>
                                <select name="sektor" class="form-select">
                                    <option value="">-- Pilih Sektor --</option>
                                    <option value="Sektor Sion" {{ old('sektor', $jemaat->sektor) == 'Sektor Sion' ? 'selected' : '' }}>Sektor Sion</option>
                                    <option value="Sektor Pisga" {{ old('sektor', $jemaat->sektor) == 'Sektor Pisga' ? 'selected' : '' }}>Sektor Pisga</option>
                                    <option value="Sektor Torsina" {{ old('sektor', $jemaat->sektor) == 'Sektor Torsina' ? 'selected' : '' }}>Sektor Torsina</option>
                                    <option value="Sektor Hermon" {{ old('sektor', $jemaat->sektor) == 'Sektor Hermon' ? 'selected' : '' }}>Sektor Hermon</option>
                                    <option value="Belum masuk sektor" {{ old('sektor', $jemaat->sektor) == 'Belum masuk sektor' ? 'selected' : '' }}>Belum Masuk Sektor</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Unit Doa</label>
                                <select name="unit_doa" class="form-select">
                                    <option value="">-- Pilih Unit Doa --</option>
                                    <option value="Antara" {{ old('unit_doa', $jemaat->unit_doa) == 'Antara' ? 'selected' : '' }}>Antara</option>
                                    <option value="BTP" {{ old('unit_doa', $jemaat->unit_doa) == 'BTP' ? 'selected' : '' }}>BTP</option>
                                    <option value="SMU.Soleman" {{ old('unit_doa', $jemaat->unit_doa) == 'SMU.Soleman' ? 'selected' : '' }}>SMU.Soleman</option>
                                    <option value="Bontoramba" {{ old('unit_doa', $jemaat->unit_doa) == 'Bontoramba' ? 'selected' : '' }}>Bontoramba</option>
                                    <option value="Katimbang" {{ old('unit_doa', $jemaat->unit_doa) == 'Katimbang' ? 'selected' : '' }}>Katimbang</option>
                                    <option value="Gereja" {{ old('unit_doa', $jemaat->unit_doa) == 'Gereja' ? 'selected' : '' }}>Gereja</option>
                                    <option value="Telkomas" {{ old('unit_doa', $jemaat->unit_doa) == 'Telkomas' ? 'selected' : '' }}>Telkomas</option>
                                    <option value="Lanraki" {{ old('unit_doa', $jemaat->unit_doa) == 'Lanraki' ? 'selected' : '' }}>Lanraki</option>
                                    <option value="Angkatan Laut" {{ old('unit_doa', $jemaat->unit_doa) == 'Angkatan Laut' ? 'selected' : '' }}>Angkatan Laut</option>
                                    <option value="Daya" {{ old('unit_doa', $jemaat->unit_doa) == 'Daya' ? 'selected' : '' }}>Daya</option>
                                    <option value="G. Daya Permai" {{ old('unit_doa', $jemaat->unit_doa) == 'G. Daya Permai' ? 'selected' : '' }}>G. Daya Permai</option>
                                    <option value="Batara Ugi" {{ old('unit_doa', $jemaat->unit_doa) == 'Batara Ugi' ? 'selected' : '' }}>Batara Ugi</option>
                                    <option value="Hartaco" {{ old('unit_doa', $jemaat->unit_doa) == 'Hartaco' ? 'selected' : '' }}>Hartaco</option>
                                    <option value="Mangga III" {{ old('unit_doa', $jemaat->unit_doa) == 'Mangga III' ? 'selected' : '' }}>Mangga III</option>
                                    <option value="Villa Mutiara" {{ old('unit_doa', $jemaat->unit_doa) == 'Villa Mutiara' ? 'selected' : '' }}>Villa Mutiara</option>
                                    <option value="Sudiang I" {{ old('unit_doa', $jemaat->unit_doa) == 'Sudiang I' ? 'selected' : '' }}>Sudiang I</option>
                                    <option value="Sudiang II" {{ old('unit_doa', $jemaat->unit_doa) == 'Sudiang II' ? 'selected' : '' }}>Sudiang II</option>
                                    <option value="Sudiang III" {{ old('unit_doa', $jemaat->unit_doa) == 'Sudiang III' ? 'selected' : '' }}>Sudiang III</option>
                                    <option value="Pepabri" {{ old('unit_doa', $jemaat->unit_doa) == 'Pepabri' ? 'selected' : '' }}>Pepabri</option>
                                    <option value="Per. Sudiang" {{ old('unit_doa', $jemaat->unit_doa) == 'Per. Sudiang' ? 'selected' : '' }}>Per. Sudiang</option>
                                    <option value="Belum Masuk Unit Doa" {{ old('unit_doa', $jemaat->unit_doa) == 'Belum Masuk Unit Doa' ? 'selected' : '' }}>Belum Masuk Unit Doa</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-hands-helping"></i>
                            Pelayanan di Gereja
                        </div>

                        @php
                            $pelayananArr = old('pelayanan', explode(', ', $jemaat->pelayanan ?? ''));
                            if (!is_array($pelayananArr)) {
                                $pelayananArr = [$pelayananArr];
                            }
                        @endphp

                        <div class="checkbox-grid mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="PELNAP" id="pelnap" {{ in_array('PELNAP', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="pelnap">PELNAP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="PELRAP" id="pelrap" {{ in_array('PELRAP', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="pelrap">PELRAP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="PELPAP" id="pelpap" {{ in_array('PELPAP', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="pelpap">PELPAP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="PELWAP" id="pelwap" {{ in_array('PELWAP', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="pelwap">PELWAP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="PELPRIP" id="pelprip" {{ in_array('PELPRIP', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="pelprip">PELPRIP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bid. Doa" id="bid_doa" {{ in_array('Bid. Doa', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="bid_doa">Bid. Doa</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bid. Multimedia" id="bid_multimedia" {{ in_array('Bid. Multimedia', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="bid_multimedia">Bid. Multimedia</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bid. Keuangan" id="bid_keuangan" {{ in_array('Bid. Keuangan', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="bid_keuangan">Bid. Keuangan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bid. Pembangunan" id="bid_pembangunan" {{ in_array('Bid. Pembangunan', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="bid_pembangunan">Bid. Pembangunan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bid. Sosial" id="bid_sosial" {{ in_array('Bid. Sosial', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="bid_sosial">Bid. Sosial</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bid. Sarana dan Prasarana" id="bid_sarpras" {{ in_array('Bid. Sarana dan Prasarana', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="bid_sarpras">Bid. Sarana dan Prasarana</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bani Asaf" id="bani_asaf" {{ in_array('Bani Asaf', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="bani_asaf">Bani Asaf</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Belum Ada" id="belum_ada" {{ in_array('Belum Ada', $pelayananArr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="belum_ada">Belum Ada Pelayanan</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ url('/jemaat') }}" class="btn-action btn-secondary-custom">
                            <i class="fas fa-times"></i>
                            Batal
                        </a>
                        <button type="submit" class="btn-action btn-primary-custom">
                            <i class="fas fa-save"></i>
                            Perbarui Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@push('styles')
<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #34495e;
        --accent-color: #3498db;
        --success-color: #27ae60;
        --danger-color: #e74c3c;
        --light-bg: #f8f9fa;
        --border-color: #dee2e6;
        --text-dark: #2c3e50;
        --text-muted: #6c757d;
    }

    .form-label {
    font-size: 14px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 6px;
    display: block;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 10px 14px;
        font-size: 14px;
        transition: 0.3s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.15rem rgba(52,152,219,0.2);
    }

    .form-check-label {
        font-size: 14px;
        color: #495057;
    }

    .form-text {
        font-size: 12px;
        color: #6c757d;
    }

    .page-title h1 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .breadcrumb {
        margin-bottom: 0;
    }

    .btn-back {
    background: #3498db;
    color: white;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .btn-back:hover {
        background: #217dbb;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .btn-action {
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-primary-custom:hover {
        background: #217dbb;
    }

    .btn-secondary-custom:hover {
        background: #f1f1f1;
    }

    .checkbox-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 10px;
    }

    .radio-group {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 10px;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }

    .form-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .page-header {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .form-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    }

    .card-header-custom {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        color: white;
        padding: 1.5rem 2rem;
    }

    .card-header-custom h5 {
        color: white;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-body-custom {
        padding: 2rem;
    }

    .section-title {
        font-weight: 600;
        margin-bottom: 1rem;
        color: #2c3e50;
    }

    .form-section {
        margin-bottom: 2rem;
    }

    .btn-primary-custom {
        background: #3498db;
        color: white;
        border: none;
    }

    .btn-secondary-custom {
        border: 1px solid #dee2e6;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
    }
</style>
@endpush

@push('scripts')
<script>
    const noHpInput = document.querySelector('input[name="nomor_hp"]');

    if(noHpInput) {
        noHpInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    }
</script>
@endpush