@extends('layouts.admin')

@section('content')

<div class="content__header content__boxed overlapping">
    <div class="content__wrap">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="page-title mb-0 mt-2">Manajemen Data Jemaat</h1>
                <p class="lead">Daftar keseluruhan jemaat GPdI El-Shaddai.</p>
            </div>
        </div>
    </div>
</div>

<div class="content__boxed">
    <div class="content__wrap">

        <div class="row mb-4">
    
            <div class="col-sm-6 col-md-3 shadow-sm">
                <div class="card bg-info text-white overflow-hidden mb-3">
                    <div class="p-3 pb-2">
                        <h5 class="mb-3"><i class="fas fa-users text-reset text-opacity-75 fs-3 me-2"></i> Total Jemaat</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-6">Keseluruhan</span>
                            <span class="fw-bold h1 mb-0">{{ $totalJemaat }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 shadow-sm">
                <div class="card bg-dark text-white overflow-hidden mb-3">
                    <div class="p-3 pb-2">
                        <h5 class="mb-3"><i class="fas fa-mars text-reset text-opacity-75 fs-3 me-2"></i> Laki-Laki</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-6">Total Pria</span>
                            <span class="fw-bold h1 mb-0">{{ $totalLaki }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 shadow-sm">
                <div class="card bg-purple text-white overflow-hidden mb-3">
                    <div class="p-3 pb-2">
                        <h5 class="mb-3"><i class="fas fa-venus text-reset text-opacity-75 fs-3 me-2"></i> Perempuan</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-6">Total Wanita</span>
                            <span class="fw-bold h1 mb-0">{{ $totalPerempuan }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 shadow-sm">
                <div class="card bg-success text-white overflow-hidden mb-3">
                    <div class="p-3 pb-2">
                        <h5 class="mb-3"><i class="fas fa-water text-reset text-opacity-75 fs-3 me-2"></i> Sudah Baptis</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-6">Telah Dibaptis</span>
                            <span class="fw-bold h1 mb-0">{{ $totalBaptis }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route('jemaat.index') }}" method="GET" class="row g-3 align-items-end mb-4">
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
                    
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-uppercase">Cari Nama</label>
                        <input type="text" name="search" class="form-control" placeholder="Ketik nama jemaat..." value="{{ request('search') }}">
                    </div>

                    <div class="col-12 col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
                    </div>
                    
                    <div class="col-12 col-md-2">
                        <a href="{{ route('jemaat.index') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-sync-alt me-1"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm mb-5">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-table me-2"></i>Tabel Jemaat Berdasarkan Urutan Keluarga
                </h6>
                
                <div>
                    <a href="{{ route('jemaat.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fas fa-user-plus me-1"></i> Tambah Jemaat
                    </a>
                </div>

        </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle table-striped small"     id="jemaatTable">
                        
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
                                <th>Sektor</th>
                                <th>Unit Doa</th>
                                <th>Pelayanan</th>
                            </tr>
                        </thead>

                        <tbody id="tableBody">
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

                                        <a href="{{ route('jemaat.edit', $jemaat->id) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <form action="{{ route('jemaat.destroy', $jemaat->id) }}" method="POST" onsubmit="return confirm('Hapus data {{ $jemaat->nama_lengkap }}?')" class="ms-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
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
                    <div class="d-flex justify-content-end mt-4 mb-4">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection