@extends('layouts.main')

@section('isi')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            {{-- <h1 class="h2">{{ $desc }}</h1> --}}
            <h4>{{ $desc }}</h4>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="/input" class="btn btn-sm btn-outline-success">
                        <i class="bi bi-plus-square me-2"></i>Dokumen Keluar
                    </a>
                    {{-- <a href="/datas-masuk" class="btn btn-sm btn-outline-secondary">Arsip Masuk
                    </a> --}}
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="card">
                <form action="/input-dok-masuk" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="asal_dokumen"
                                placeholder="Nomor Dokumen">
                            <label for="floatingInput">Asal Dokumen</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="perihal"
                                placeholder="Nomor Dokumen">
                            <label for="floatingInput">Perihal</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="nomor_dokumen"
                                placeholder="Nomor Dokumen">
                            <label for="floatingInput">Nomor Dokumen</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="tgl_masuk"
                                placeholder="Nomor Dokumen">
                            <label for="floatingInput">Tanggal Masuk</label>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload File</label>
                            <input class="form-control" type="file" name="file" id="formFile">
                        </div>

                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan Khusus</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan" placeholder="Isi keterangan"
                            rows="3"></textarea>

                        <button type="submit" class="btn btn-outline-primary mt-3">
                            Input Data
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
