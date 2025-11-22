@extends('layouts.app', ['title' => 'Data Kelas'])

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
        <style>
            .table-internal {
                display: none;
            }
        </style>
    @endpush

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Kelas</h1>
            </div>

            @if (session('role') == 'admin')
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Navigation Buttons -->
                                    <a href="{{ route('kelas.create') }}" class="btn btn-primary text-white my-3">+ Tambah
                                        Kelas</a>

                                    <!-- Tables Section -->
                                    <div class="table-responsive">
                                        <!-- Table Kelas -->
                                        <table class="table table-striped" id="table-kelas">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Ruangan</th>
                                                    <!-- <th>User ID</th> -->
                                                    <th>Tanggal Dibuat</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $i => $data)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $data->nm_kelas ?? '' }}</td>
                                                        <td>{{ $data->ruangan ?? '' }}</td>
                                                        <!-- <td>{{ $data->user->name ?? '' }}</td> -->
                                                        <td>{{ $data->created_at->format('d M Y') ?? '' }}</td>
                                                        <td>
                                                            <a href="{{ route('kelas.edit', $data->id) }}"
                                                                class="btn btn-warning my-2"><i class="fas fa-edit"></i></a>
                                                            <button onclick="deleteData({{ $data->id }}, 'kelas')"
                                                                class="btn btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Tables Section -->
                                    <div class="table-responsive">
                                        <!-- Table Kelas User -->
                                        <table class="table table-striped" id="table-kelas">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Ruangan</th>
                                                    <th>Tanggal Dibuat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kelasUser as $i => $data)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $data->nm_kelas ?? '' }}</td>
                                                        <td>{{ $data->ruangan ?? '' }}</td>
                                                        <td>{{ $data->created_at->format('d M Y') ?? '' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
    </div>

    @push('scripts')
        <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/page/modules-datatables.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                var language = {
                    "sSearch": "Pencarian Data Kelas : ",
                };
                var tableKelas = $('#table-kelas').DataTable({
                    paging: true,
                    searching: true,
                    order: [[0, 'asc']],
                    ordering: false,
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/2.1.0/i18n/id.json',
                    },
                });
            });
        </script>
    @endpush
@endsection