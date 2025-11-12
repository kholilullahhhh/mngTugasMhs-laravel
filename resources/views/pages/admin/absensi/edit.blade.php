@extends('layouts.app', ['title' => 'Edit Tugas'])@section('content')@push('styles')
        <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
        <style>
            .image-preview {
                width: 100%;
                height: 200px;
                border: 2px dashed #ddd;
                border-radius: 5px;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                position: relative;
                background-color: #f8f9fa;
                transition: all 0.3s ease;
            }

            .image-preview:hover {
                border-color: #6777ef;
            }

            #image-label {
                cursor: pointer;
                color: #6777ef;
                font-weight: 600;
            }

            .image-preview img {
                max-width: 100%;
                max-height: 100%;
            }

            .form-section {
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
                margin-bottom: 30px;
            }

            .form-header {
                border-bottom: 1px solid #f0f0f0;
                padding: 15px 20px;
                background-color: #f8f9fa;
                border-radius: 8px 8px 0 0;
            }

            .form-body {
                padding: 20px;
            }

            .required-field::after {
                content: " *";
                color: #ff0000;
            }

            .current-file {
                margin-top: 5px;
                font-size: 0.9em;
                color: #28a745;
                font-weight: 500;
            }
        </style>
    @endpush

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Edit Data Pengumpulan Tugas</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="{{ route('absensi.index') }}">Tugas</a></div>
                        <div class="breadcrumb-item active">Edit Data</div>
                    </div>
                </div>

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('absensi.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input required type="hidden" name="id" value="{{ $data->id }}" class="form-control">
                                <div class="card form-section">
                                    <div class="form-body">
                                        <!-- Tugas -->
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 required-field">Tugas</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select name="agenda_id" class="form-control select2" required>
                                                    <option value="">Pilih Tugas</option>
                                                    @foreach($agendas as $agenda)
                                                        <option value="{{ $agenda->id }}" {{ old('agenda_id', $data->agenda_id) == $agenda->id ? 'selected' : '' }}>
                                                            {{ $agenda->judul }} ({{ \Carbon\Carbon::parse($agenda->tgl_kegiatan)->format('d/m/Y H:i') }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('agenda_id')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Mahasiswa -->
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mahasiswa</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select name="user_id" class="form-control select2">
                                                    <option value="">Pilih Mahasiswa (Opsional)</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}" {{ old('user_id', $data->user_id) == $user->id ? 'selected' : '' }}>
                                                            {{ $user->name }} (NIM: {{ $user->nip ?? '-' }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <small class="text-muted">Biarkan kosong jika Tugas untuk diri sendiri</small>
                                            </div>
                                        </div>

                                        <!-- Status Pengumpulan Tugas -->
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 required-field">Status Terkumpulnya Tugas</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select name="status" class="form-control" required>
                                                    <option value="">Pilih Status Terkumpulnya Tugas</option>
                                                    <option value="terkumpul" {{ old('status', $data->status) == 'terkumpul' ? 'selected' : '' }}>Terkumpul</option>
                                                    <option value="tidak terkumpul" {{ old('status', $data->status) == 'tidak terkumpul' ? 'selected' : '' }}>Tidak Terkumpul</option>
                                                </select>
                                                @error('status')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Keterangan -->
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea name="keterangan" class="form-control" rows="3" placeholder="Tambahkan keterangan jika perlu">{{ old('keterangan', $data->keterangan) }}</textarea>
                                                <small class="text-muted">Wajib diisi jika status Tidak Terkumpul</small>
                                            </div>
                                        </div>

                                        <!-- Laporan -->
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Laporan (PDF)</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="custom-file">
                                                    <input type="file" name="laporan" id="laporan" class="custom-file-input" accept="application/pdf">
                                                    <label class="custom-file-label" for="laporan">
                                                        @if($data->laporan)
                                                            Ganti file laporan (current: {{ $data->laporan }})
                                                        @else
                                                            Pilih file laporan
                                                        @endif
                                                    </label>
                                                </div>
                                                @if($data->laporan)
                                                    <div class="current-file">
                                                        <a href="{{ asset('upload/laporan/' . $data->laporan) }}" target="_blank">
                                                            <i class="fas fa-download"></i> Download Laporan Saat Ini
                                                        </a>
                                                    </div>
                                                @endif
                                                <small class="text-muted">Format: PDF (Maks. 5MB)</small>
                                                @error('laporan')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Status Validasi (Hanya untuk validator) -->
                                        @if(session('role') == 'validator')
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 required-field">Status Validasi Data</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select name="validation_status" class="form-control" required>
                                                        <option value="">Pilih Status Validasi Data</option>
                                                        <option value="pending" {{ old('validation_status', $data->validation_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="validated" {{ old('validation_status', $data->validation_status) == 'validated' ? 'selected' : '' }}>Valid</option>
                                                        <option value="rejected" {{ old('validation_status', $data->validation_status) == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                                    </select>
                                                    @error('validation_status')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" name="validation_status" value="{{ old('validation_status', $data->validation_status) }}">
                                        @endif

                                        <!-- Action Buttons -->
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button type="submit" class="btn btn-primary btn-icon icon-left">
                                                    <i class="fas fa-save"></i> Update Tugas
                                                </button>
                                                <a href="{{ route('absensi.index') }}" class="btn btn-warning btn-icon icon-left">
                                                    <i class="fas fa-arrow-left"></i> Kembali
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @push('scripts')
            <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
            <script src="{{ asset('library/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>
            <script>
                $(document).ready(function () {
                    // Initialize Select2
                    $('.select2').select2({
                        placeholder: 'Pilih opsi',
                        allowClear: true
                    });

                    // Initialize custom file input
                    bsCustomFileInput.init();

                    // Show required field indicator
                    $('select[required]').on('change', function () {
                        if ($(this).val()) {
                            $(this).removeClass('is-invalid').addClass('is-valid');
                        } else {
                            $(this).removeClass('is-valid').addClass('is-invalid');
                        }
                    });
                });
            </script>
        @endpush
@endsection