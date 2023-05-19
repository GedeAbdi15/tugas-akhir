@extends('layouts.main')

@section('isi')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4>{{ Auth::user()->name }}</h4>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </div>

        <h5>Data Dokumen Keluar</h5>
        <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@sortablelink('nomor_dokumen', 'Nomor Dokumen')</th>
                                <th scope="col">Keterangan Khusus</th>
                                <th scope="col">File</th>
                                <th scope="col">@sortablelink('kategori', 'Kategori')</th>
                            </tr>
                        </thead>
                        @php
                            $nomor = 1 + ($data->currentPage() - 1) * $data->perPage();
                        @endphp
                        @foreach ($data as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ $item->nomor_dokumen }}</td>
                                    <td>{{ $item->keterangan_khusus }}</td>
                                    <td>{{ $item->file }}</td>
                                    <td>{{ $item->kategori }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    {{-- {{ $data->links() }} --}}
                    {!! $data->appends(Request::except('page'))->render() !!}
                </div>
            </div>
        </div>

        <h5 class="mt-3 mb-3">Data Dokumen Masuk</h5>
        <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Asal Dokumen</th>
                                <th scope="col">Perihal</th>
                                <th scope="col">@sortablelink('nomor_dokumen', 'Nomor Dokumen')</th>
                                <th scope="col">@sortablelink('tgl_masuk', 'Tanggal Masuk')</th>
                                <th scope="col">File</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        @php
                            $nomor = 1 + ($data->currentPage() - 1) * $data->perPage();
                        @endphp
                        @foreach ($data_m as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ $item->asal_dokumen }}</td>
                                    <td>{{ $item->perihal }}</td>
                                    <td>{{ $item->nomor_dokumen }}</td>
                                    <td>{{ $item->tgl_masuk }}</td>
                                    <td>{{ $item->file }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    {!! $data_m->appends(Request::except('page'))->render() !!}
                </div>
            </div>
        </div>
    </main>
@endsection
