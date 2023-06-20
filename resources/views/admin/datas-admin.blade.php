@extends('layouts.main')

@section('isi')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4>{{ $desc }}</h4>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="/datas-masuk" class="btn btn-sm btn-outline-secondary me-2">
                        <i class="bi bi-database-fill me-2"></i>Data Masuk
                    </a>
                    <a href="/input" class="btn btn-sm btn-outline-success">
                        <i class="bi bi-plus-square me-2"></i>Add New Data
                    </a>
                </div>
            </div>
        </div>

        {{-- form search --}}
        <form method="get">
            <div class="form-floating mb-3">
                <input type="text" name="cari" id="cari" class="form-control" id="floatingInput"
                    placeholder="Search by ruas" value="{{ $cari }}">
                <label for="floatingInput">Search</label>
            </div>
        </form>

        <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@sortablelink('nomor_dokumen', 'Nomor Dokumen')</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">File</th>
                                <th scope="col">@sortablelink('kategori', 'Kategori')</th>
                                @if (auth()->User()->role == 'Admin')
                                    <th scope="col">Option</th>
                                @endif
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
                                    <td>
                                        <a href="{{ asset('assets/uploads/documents/keluar') . '/' . $item->file }}"
                                            class="link-dark link-underline-opacity-100-hover"
                                            target="_blank">{{ $item->file }}</a>
                                    </td>
                                    <td>{{ $item->kategori }}</td>
                                    @if (auth()->User()->role == 'Admin')
                                        <td>
                                            {{-- button edit --}}
                                            <a class="btn btn-warning btn-sm me-2"
                                                href="/edit-arsip-keluar-{{ $item->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            {{-- end button edit --}}

                                            {{-- button delete --}}
                                            <form action="/datas/{{ $item->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm me-2"
                                                    onclick="return confirm('Yakin ingin menghapus data?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                            {{-- end button delete --}}

                                            {{-- <button type="button" class="btn btn-success btn-sm">Download PDF</button> --}}
                                        </td>
                                    @endif
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    {!! $data->appends(Request::except('page'))->render() !!}
                </div>
            </div>
        </div>
    </main>
@endsection
