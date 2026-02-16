<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Jemaat - GPdI El-Shaddai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .form-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .page-header {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 0;
        }

        .page-title i {
            font-size: 2rem;
            color: var(--primary-color);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .page-title h1 {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
            font-size: 0.9rem;
        }

        .breadcrumb-item a {
            color: var(--text-muted);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--primary-color);
        }

        /* Alert Styles */
        .alert {
            border: none;
            border-radius: 10px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
        }

        /* Card Styles */
        .form-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-header-custom {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 1.5rem 2rem;
            border: none;
        }

        .card-header-custom h5 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-body-custom {
            padding: 2.5rem;
        }

        /* Form Section */
        .form-section {
            margin-bottom: 2.5rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid var(--light-bg);
        }

        .form-section:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .section-title i {
            color: var(--accent-color);
        }

        /* Form Labels - Larger for elderly */
        .form-label {
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 0.6rem;
            font-size: 1rem;
            display: block;
        }

        .required-field::after {
            content: ' *';
            color: var(--danger-color);
        }

        /* Form Controls - Larger and easier to use */
        .form-control,
        .form-select {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 0.875rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.1);
            outline: none;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        /* Radio and Checkbox - Larger for elderly */
        .form-check {
            padding-left: 2rem;
            margin-bottom: 0.75rem;
        }

        .form-check-input {
            width: 1.25rem;
            height: 1.25rem;
            margin-top: 0.15rem;
            cursor: pointer;
            border: 2px solid var(--border-color);
        }

        .form-check-input:checked {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .form-check-label {
            font-size: 1rem;
            color: var(--text-dark);
            cursor: pointer;
            margin-left: 0.5rem;
        }

        /* Help Text */
        .form-text {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-top: 0.5rem;
            display: block;
        }

        /* Radio Group Layout */
        .radio-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 0.75rem;
        }

        /* Checkbox Group for Services */
        .checkbox-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 0.75rem;
        }

        /* Buttons */
        .btn-action {
            padding: 0.875rem 2rem;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--accent-color) 0%, #2980b9 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(52, 152, 219, 0.4);
        }

        .btn-secondary-custom {
            background: white;
            color: var(--text-dark);
            border: 2px solid var(--border-color);
        }

        .btn-secondary-custom:hover {
            background: var(--light-bg);
            border-color: var(--text-muted);
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 2px solid var(--light-bg);
        }

        /* Invalid Feedback */
        .invalid-feedback {
            display: block;
            font-size: 0.9rem;
            color: var(--danger-color);
            margin-top: 0.5rem;
        }

        .is-invalid {
            border-color: var(--danger-color) !important;
        }

        /* Loading Spinner */
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
            border-width: 2px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 1rem 0;
            }

            .page-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
                padding: 1.5rem;
            }

            .card-body-custom {
                padding: 1.5rem;
            }

            .form-section {
                margin-bottom: 1.5rem;
                padding-bottom: 1.5rem;
            }

            .radio-group,
            .checkbox-grid {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-card {
            animation: fadeIn 0.5s ease;
        }

        /* Back Button */
        .btn-back {
            color: var(--text-muted);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .btn-back:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-title">
                <i class="fas fa-user-plus"></i>
                <div>
                    <h1>Tambah Data Jemaat</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="jemaat-list.html">Data Jemaat</a></li>
                            <li class="breadcrumb-item active">Tambah Jemaat</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <a href="jemaat-list.html" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Daftar Jemaat
            </a>
        </div>

        <!-- Alert Success -->
        <div id="alertSuccess" class="alert alert-success" style="display: none;">
            <i class="fas fa-check-circle me-2"></i>
            <span id="successMessage"></span>
        </div>

        <!-- Alert Error -->
        <div id="alertError" class="alert alert-danger" style="display: none;">
            <i class="fas fa-exclamation-circle me-2"></i>
            <span id="errorMessage"></span>
        </div>

        <!-- Form Card -->
        <div class="form-card">
            <div class="card-header-custom">
                <h5>
                    <i class="fas fa-edit"></i>
                    Formulir Data Jemaat
                </h5>
            </div>

            <div class="card-body-custom">
                <form action="{{ route('jemaat.store') }}" method="POST" id="jemaatForm">
                    @csrf

                    <!-- SECTION 1: Data Pribadi -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-id-card"></i>
                            Data Pribadi
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label required-field">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" 
                                       placeholder="Masukkan nama lengkap" required maxlength="100">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" 
                                       placeholder="Contoh: Makassar" maxlength="100">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Golongan Darah</label>
                                <div class="radio-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" 
                                               value="A" id="darah_a">
                                        <label class="form-check-label" for="darah_a">A</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" 
                                               value="B" id="darah_b">
                                        <label class="form-check-label" for="darah_b">B</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" 
                                               value="AB" id="darah_ab">
                                        <label class="form-check-label" for="darah_ab">AB</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" 
                                               value="O" id="darah_o">
                                        <label class="form-check-label" for="darah_o">O</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" 
                                               value="Tidak Tahu" id="darah_tidaktahu">
                                        <label class="form-check-label" for="darah_tidaktahu">Tidak Tahu</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: Kontak & Alamat -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-address-book"></i>
                            Kontak & Alamat
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Nomor HP / WhatsApp</label>
                                <input type="text" name="nomor_hp" class="form-control" 
                                       placeholder="Contoh: 081234567890" maxlength="15">
                                <small class="form-text">
                                    <i class="fas fa-info-circle"></i>
                                    Masukkan angka saja (10-15 digit), contoh: 081234567890
                                </small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" rows="3" 
                                          placeholder="Masukkan alamat lengkap"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: Status Jemaat -->
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
                                    <option value="Anggota Jemaat">Anggota Jemaat</option>
                                    <option value="Simpatisan">Simpatisan</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Kategori Usia</label>
                                <select name="status_anggota" class="form-select">
                                    <option value="">-- Pilih Kategori Usia --</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Remaja">Remaja</option>
                                    <option value="Pemuda">Pemuda</option>
                                    <option value="Ayah/Ibu">Ayah/Ibu</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status Baptis</label>
                                <select name="keterangan_baptis" class="form-select">
                                    <option value="">-- Pilih Status Baptis --</option>
                                    <option value="Sudah">Sudah Baptis</option>
                                    <option value="Belum">Belum Baptis</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 4: Sektor & Unit Doa -->
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
                                    <option value="Sektor Sion">Sektor Sion</option>
                                    <option value="Sektor Pisga">Sektor Pisga</option>
                                    <option value="Sektor Torsina">Sektor Torsina</option>
                                    <option value="Sektor Hermon">Sektor Hermon</option>
                                    <option value="Belum masuk sektor">Belum Masuk Sektor</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Unit Doa</label>
                                <select name="unit_doa" class="form-select">
                                    <option value="">-- Pilih Unit Doa --</option>
                                    <option value="Antara">Antara</option>
                                    <option value="BTP I">BTP I</option>
                                    <option value="BTP II">BTP II</option>
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

                    <!-- SECTION 5: Pelayanan -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-hands-helping"></i>
                            Pelayanan di Gereja
                        </div>

                        <label class="form-label">Bidang Pelayanan</label>
                        <small class="form-text mb-3">
                            <i class="fas fa-info-circle"></i>
                            Anda dapat memilih lebih dari satu bidang pelayanan
                        </small>

                        <div class="checkbox-grid mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="PELNAP" id="pelnap">
                                <label class="form-check-label" for="pelnap">PELNAP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="PELRAP" id="pelrap">
                                <label class="form-check-label" for="pelrap">PELRAP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="PELPAP" id="pelpap">
                                <label class="form-check-label" for="pelpap">PELPAP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="PELWAP" id="pelwap">
                                <label class="form-check-label" for="pelwap">PELWAP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="PELPRIP" id="pelprip">
                                <label class="form-check-label" for="pelprip">PELPRIP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="Bid. Doa" id="bid_doa">
                                <label class="form-check-label" for="bid_doa">Bid. Doa</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="Bid. Multimedia" id="bid_multimedia">
                                <label class="form-check-label" for="bid_multimedia">Bid. Multimedia</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="Bid. Keuangan" id="bid_keuangan">
                                <label class="form-check-label" for="bid_keuangan">Bid. Keuangan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="Bid. Pembangunan" id="bid_pembangunan">
                                <label class="form-check-label" for="bid_pembangunan">Bid. Pembangunan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="Bid. Sosial" id="bid_sosial">
                                <label class="form-check-label" for="bid_sosial">Bid. Sosial</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="Bid. Sarana dan Prasarana" id="bid_sarpras">
                                <label class="form-check-label" for="bid_sarpras">Bid. Sarana dan Prasarana</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="Bani Asaf" id="bani_asaf">
                                <label class="form-check-label" for="bani_asaf">Bani Asaf</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" 
                                       value="Belum Ada" id="belum_ada">
                                <label class="form-check-label" for="belum_ada">Belum Ada Pelayanan</label>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <a href="jemaat-list.html" class="btn-action btn-secondary-custom">
                            <i class="fas fa-times"></i>
                            Batal
                        </a>
                        <button type="submit" class="btn-action btn-primary-custom" id="submitBtn">
                            <i class="fas fa-save"></i>
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form Validation and Submit
        document.getElementById('jemaatForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            const originalText = submitBtn.innerHTML;
            
            // Disable button and show loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
            
            // Simulate form submission (replace with actual AJAX call)
            setTimeout(() => {
                // Show success message
                showAlert('success', 'Data jemaat berhasil disimpan!');
                
                // Reset form
                this.reset();
                
                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
                
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
                
                // Redirect after 2 seconds (optional)
                setTimeout(() => {
                    // window.location.href = 'jemaat-list.html';
                }, 2000);
            }, 1500);
        });

        // Alert Function
        function showAlert(type, message) {
            const alertId = type === 'success' ? 'alertSuccess' : 'alertError';
            const messageId = type === 'success' ? 'successMessage' : 'errorMessage';
            
            document.getElementById(messageId).textContent = message;
            document.getElementById(alertId).style.display = 'block';
            
            // Auto hide after 5 seconds
            setTimeout(() => {
                document.getElementById(alertId).style.display = 'none';
            }, 5000);
        }

        // Phone number validation (numbers only)
        document.querySelector('input[name="nomor_hp"]').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Confirm before leaving if form has data
        let formModified = false;
        document.querySelectorAll('input, select, textarea').forEach(element => {
            element.addEventListener('change', () => {
                formModified = true;
            });
        });

        window.addEventListener('beforeunload', function(e) {
            if (formModified) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
    </script>
</body>
</html>