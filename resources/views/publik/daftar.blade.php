<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Jemaat - GPdI El-Shaddai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .form-container { max-width: 600px; margin: 2rem auto; padding: 0 15px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .card-header { background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); color: white; border-radius: 15px 15px 0 0 !important; padding: 20px; text-align: center; }
        .form-label { font-weight: 600; color: #555; font-size: 0.9rem; }
        .section-title { font-size: 1rem; font-weight: bold; color: #4e73df; border-bottom: 2px solid #e3e6f0; padding-bottom: 5px; margin-bottom: 15px; margin-top: 20px; }
    </style>
</head>
<body>

<div class="form-container">
    <div class="card">
        <div class="card-header">
            <i class="fas fa-church fa-3x mb-2"></i>
            <h4 class="mb-0">Pendaftaran Jemaat</h4>
            <p class="mb-0 small text-white-50">GPdI El-Shaddai</p>
        </div>
        
        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success text-center border-0 shadow-sm rounded-3">
                    <i class="fas fa-check-circle fa-2x mb-2 text-success"></i><br>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger border-0 shadow-sm rounded-3">
                    <strong>Gagal mengirim data! Mohon periksa:</strong>
                    <ul class="mb-0 mt-1 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pendaftaran.simpan') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap *</label>
                    <input type="text" name="nama_lengkap" class="form-control" required placeholder="Sesuai KTP">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tempat Lahir *</label>
                        <input type="text" name="tempat_lahir" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir *</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin *</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Golongan Darah</label>
                        <select name="golongan_darah" class="form-select">
                            <option value="">-- Pilih --</option>
                            <option value="A">A</option><option value="B">B</option>
                            <option value="AB">AB</option><option value="O">O</option>
                            <option value="Tidak Tahu">Tidak Tahu</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor WhatsApp *</label>
                    <input type="number" name="nomor_hp" class="form-control" required placeholder="Contoh: 08123456789">
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Domisili *</label>
                    <textarea name="alamat" class="form-control" rows="2" required placeholder="Jalan, RT/RW, Kelurahan"></textarea>
                </div>

                <div class="section-title"><i class="fas fa-pray me-2"></i>Data Gerejawi</div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Status Baptis</label>
                        <select name="keterangan_baptis" class="form-select">
                            <option value="">-- Pilih --</option>
                            <option value="Sudah">Sudah Baptis</option>
                            <option value="Belum">Belum Baptis</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status Jemaat *</label>
                        <select name="status_jemaat" class="form-select" required>
                            <option value="Menunggu Verifikasi">Menunggu Verifikasi (Pendaftar Baru)</option>
                            <option value="Anggota Jemaat">Anggota Jemaat</option>
                            <option value="Simpatisan">Simpatisan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status Anggota *</label>
                        <select name="status_anggota" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Simpatisan">Simpatisan</option>
                            <option value="Jemaat Tetap">Jemaat Tetap</option>
                            <option value="Pengurus">Pengurus</option>
                            <option value="Pelayan Tuhan">Pelayan Tuhan</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Komisi</label>
                        <select name="komisi" class="form-select">
                            <option value="">-- Pilih Komisi --</option>
                            <option value="Pelayanan Anak">Pelayanan Anak</option>
                            <option value="Remaja">Remaja</option>
                            <option value="Pemuda">Pemuda</option>
                            <option value="Kaum Wanita">Kaum Wanita</option>
                            <option value="Kaum Pria">Kaum Pria</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Sektor</label>
                        <select name="sektor" class="form-select">
                            <option value="">-- Pilih Sektor --</option>
                            <option value="Sektor Sion">Sektor Sion</option>
                            <option value="Sektor Hermon">Sektor Hermon</option>
                            <option value="Sektor Pisga">Sektor Pisga</option>
                            <option value="Sektor Torsina">Sektor Torsina</option>
                            <option value="Belum Masuk">Belum Masuk Sektor</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Unit Doa (Pilih salah satu)</label>
                    <div class="row bg-white border rounded p-3 m-0 shadow-sm">
                        <div class="col-md-6 col-12">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Antara" id="ud1">
                                <label class="form-check-label small" for="ud1">Antara</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="BTP" id="ud2">
                                <label class="form-check-label small" for="ud2">BTP</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="SMU. Soleman" id="ud3">
                                <label class="form-check-label small" for="ud3">SMU. Soleman</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Bontoramba" id="ud4">
                                <label class="form-check-label small" for="ud4">Bontoramba</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Katimbang" id="ud5">
                                <label class="form-check-label small" for="ud5">Katimbang</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Gereja" id="ud6">
                                <label class="form-check-label small" for="ud6">Gereja</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Telkomas" id="ud7">
                                <label class="form-check-label small" for="ud7">Telkomas</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Lanraki" id="ud8">
                                <label class="form-check-label small" for="ud8">Lanraki</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Angkatan Laut" id="ud9">
                                <label class="form-check-label small" for="ud9">Angkatan Laut</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Daya" id="ud10">
                                <label class="form-check-label small" for="ud10">Daya</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="G. Daya Permai" id="ud11">
                                <label class="form-check-label small" for="ud11">G. Daya Permai</label>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Batara Ugi" id="ud12">
                                <label class="form-check-label small" for="ud12">Batara Ugi</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Hartaco" id="ud13">
                                <label class="form-check-label small" for="ud13">Hartaco</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Mangga III" id="ud14">
                                <label class="form-check-label small" for="ud14">Mangga III</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Villa Mutiara" id="ud15">
                                <label class="form-check-label small" for="ud15">Villa Mutiara</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Sudiang I" id="ud16">
                                <label class="form-check-label small" for="ud16">Sudiang I</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Sudiang II" id="ud17">
                                <label class="form-check-label small" for="ud17">Sudiang II</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Sudiang III" id="ud18">
                                <label class="form-check-label small" for="ud18">Sudiang III</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Pepabri" id="ud19">
                                <label class="form-check-label small" for="ud19">Pepabri</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Per. Sudiang" id="ud20">
                                <label class="form-check-label small" for="ud20">Per. Sudiang</label>
                            </div>
                            
                            <div class="form-check mt-3 mb-2">
                                <input class="form-check-input" type="radio" name="unit_doa" value="Belum Masuk Unit Doa" id="ud21">
                                <label class="form-check-label small fw-bold text-danger" for="ud21">Belum Masuk Unit Doa</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Bidang Pelayanan (Bisa pilih lebih dari 1)</label>
                    <div class="row bg-white border rounded p-3 m-0 shadow-sm">
                        <div class="col-6">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="PELNAP" id="pel1">
                                <label class="form-check-label small" for="pel1">PELNAP</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="PELRAP" id="pel2">
                                <label class="form-check-label small" for="pel2">PELRAP</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="PELPAP" id="pel3">
                                <label class="form-check-label small" for="pel3">PELPAP</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="PELWAP" id="pel4">
                                <label class="form-check-label small" for="pel4">PELWAP</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="PELPRIP" id="pel5">
                                <label class="form-check-label small" for="pel5">PELPRIP</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bid. Doa" id="pel6">
                                <label class="form-check-label small" for="pel6">Bid. Doa</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bid. Multimedia" id="pel7">
                                <label class="form-check-label small" for="pel7">Bid. Multimedia</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bid. Keuangan" id="pel8">
                                <label class="form-check-label small" for="pel8">Bid. Keuangan</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bid. Sosial" id="pel9">
                                <label class="form-check-label small" for="pel9">Bid. Sosial</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bid. Sarana dan Prasarana" id="pel10">
                                <label class="form-check-label small" for="pel10">Bid. Sarana dan Prasarana</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Bani Asaf" id="pel11">
                                <label class="form-check-label small" for="pel11">Bani Asaf</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" value="Belum Ada" id="pel12">
                                <label class="form-check-label small" for="pel12">Belum Ada</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 shadow-sm py-2">
                    Kirim Data Pendaftaran <i class="fas fa-paper-plane ms-1"></i>
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>