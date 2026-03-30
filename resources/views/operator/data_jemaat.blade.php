<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Jemaat - GPdI El-Shaddai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fc; }
        .table-primary { --bs-table-bg: #4e73df; --bs-table-color: white; }
        .card-header { background-color: #f8f9fc; border-bottom: 1px solid #e3e6f0; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="fas fa-church me-2 text-primary"></i> <strong>GPdI El-Shaddai</strong>
        </a>
        <div class="d-flex">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Manajemen Data Jemaat</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Jemaat</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('jemaat.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-user-plus me-1"></i> Tambah Jemaat
            </a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body text-center">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Jemaat</div>
                    <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $data->count() }}</div>
                </div>
            </div>
        </div>
        </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('jemaat.index') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-uppercase">Filter Sektor</label>
                    <select name="sektor" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Semua Sektor --</option>
                        @foreach($sektors as $sektor)
                            <option value="{{ $sektor }}" {{ request('sektor') == $sektor ? 'selected' : '' }}>
                                {{ $sektor }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('jemaat.index') }}" class="btn btn-secondary w-100">
                        <i class="fas fa-sync-alt me-1"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table me-2"></i>Tabel Jemaat Berdasarkan Urutan Keluarga</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle" style="white-space: nowrap;">
        
        <thead class="table-primary text-center">
            <tr>
                <th>Aksi</th>
                <th>Cap Waktu</th>
                <th>Kode Jemaat</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Status Baptis</th>
                <th>Gol. Darah</th>
                <th>No. HP / WA</th>
                <th>Alamat</th>
                <th>Status Jemaat</th>
                <th>Status Anggota</th>
                <th>Komisi</th>
                <th>Sektor</th>
                <th>Unit Doa</th>
                <th>Pelayanan</th>
            </tr>
        </thead>

        <tbody>
            @forelse($data as $jemaat)
            <tr>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        @if($jemaat->status_jemaat == 'Menunggu Verifikasi')
                            <form action="{{ route('jemaat.verifikasi', $jemaat->id) }}" method="POST" onsubmit="return confirm('Verifikasi jemaat {{ $jemaat->nama_lengkap }} dan buatkan Kode Resmi?')" class="me-1">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success" title="Setujui & Verifikasi">
                                    <i class="fas fa-check-circle"></i> Setujui
                                </button>
                            </form>
                        @endif

                        <a href="{{ route('jemaat.edit', $jemaat->id) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        
                        <form action="{{ route('jemaat.destroy', $jemaat->id) }}" method="POST" onsubmit="return confirm('Hapus data {{ $jemaat->nama_lengkap }}?')" class="ms-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
                <td>{{ $jemaat->created_at->format('d/m/Y H:i') }}</td>
                <td class="text-center fw-bold text-success">{{ $jemaat->kode_jemaat ?? 'Belum Digenerate' }}</td>
                <td>{{ $jemaat->nama_lengkap }}</td>
                <td>{{ $jemaat->tempat_lahir }}</td>
                <td>{{ $jemaat->tanggal_lahir }}</td>
                <td>{{ $jemaat->jenis_kelamin }}</td>
                <td class="text-center">
                    <span class="badge {{ $jemaat->keterangan_baptis == 'Sudah' ? 'bg-success' : 'bg-warning' }}">
                        {{ $jemaat->keterangan_baptis }}
                    </span>
                </td>
                <td class="text-center">{{ $jemaat->golongan_darah }}</td>
                <td>{{ $jemaat->nomor_hp }}</td>
                <td>{{ $jemaat->alamat }}</td>
                <td>{{ $jemaat->status_jemaat }}</td>
                <td>{{ $jemaat->status_anggota }}</td>
                <td>{{ $jemaat->komisi ?? '-' }}</td>
                <td>{{ $jemaat->sektor }}</td>
                <td>{{ $jemaat->unit_doa }}</td>
                <td>{{ $jemaat->pelayanan ?? 'Tidak Ada' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="17" class="text-center text-muted py-4">Data jemaat tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
        </div>
        </div>
    </div>

</div>

<footer class="bg-white py-4 mt-auto border-top">
    <div class="container-fluid text-center small text-muted">
        &copy; 2026 GPdI El-Shaddai | Sistem Informasi Data Jemaat
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>