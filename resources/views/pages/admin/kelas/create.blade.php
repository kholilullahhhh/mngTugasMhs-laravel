@extends('layouts.app', ['title' => 'Tambah Kelas'])
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    @endpush

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kelas</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card">
                                <div class="card-header">
                                    <h4>Form Tambah Kelas</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Nama Kelas -->
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                            Kelas</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input required type="text" name="nm_kelas" class="form-control"
                                                placeholder="Masukkan nama kelas">
                                            @error('nm_kelas')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Ruangan -->
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ruangan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input required type="text" name="ruangan" class="form-control"
                                                placeholder="Masukkan ruangan">
                                            @error('ruangan')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Tombol Aksi -->
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Simpan Kelas</button>
                                            <a href="{{ route('kelas.index') }}" class="btn btn-warning">Kembali</a>
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
        <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
        <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>

        <script>
            $(document).ready(function () {
                // Inisialisasi select2 jika diperlukan
                $('.selectric').selectric();
            });
        </script>
    @endpush
@endsection