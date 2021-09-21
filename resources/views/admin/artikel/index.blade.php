@extends('layouts.admin.master',['title' => $title])

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables/datatables.min.css') }}">
@endpush

@section('admin-content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{$title}}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Tabel Daftar {{$title}}
                </div>
                <div class="card-body">
                <div class="table-responsive">
                   <table class="table table-striped table-post">
                        <thead>
                            <tr>
                                <th width="4%">No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('js')

    <script src="{{ asset('admin/vendors/datatables/datatables.min.js') }}"></script>
    <script>
        load_data();

        function load_data(category = '', status = '') {
            $('.table-post').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('post.index') }}",
                    data: {
                        category: category,
                        status: status,
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        searchable: false,
                        sortable: false
                    },
                    {
                        name: "judul",
                        data: "judul"
                    },
                    {
                        name: "penulis",
                        data: "penulis"
                    },
                    {
                        name: "tanggal",
                        data: "tanggal"
                    },
                    {
                        name: "status",
                        data: "status"
                    },
                    {
                        name: "aksi",
                        data: "aksi"
                    }
                ],
                pageLength: 15,
                "lengthMenu": [15, 25, 50, 75, 100],
                "language": {
                    "emptyTable": "Tidak ada data!"
                },
            });
        }
    </script>
@endpush
