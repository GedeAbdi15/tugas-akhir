@extends('layouts.main')

@section('isi')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            {{-- <h1 class="h2">{{ $desc }}</h1> --}}
            <h4>{{ $desc }}</h4>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="/input-dok-masuk" class="btn btn-sm btn-outline-secondary">Dokumen Masuk
                    </a>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="card">
                <form action="/datas-{{ $data->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="nomor_dokumen"
                                placeholder="Nomor Dokumen" value="{{ $data->nomor_dokumen }}" autofocus>
                            <label for="floatingInput">Nomor Dokumen</label>
                        </div>

                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan Khusus</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan_khusus" placeholder="Isi keterangan"
                            rows="3">{{ $data->keterangan_khusus }}</textarea>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload File</label>
                            <input class="form-control" type="file" name="file" id="formFile">
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                            <select class="form-select" name="kategori" id="inputGroupSelect01">
                                <option selected>{{ $data->kategori }}</option>
                                <option value="Keterangan Usaha">Keterangan Usaha</option>
                                <option value="Keterangan Kematian">Keterangan Kematian</option>
                                <option value="Keterangan Kelahiran">Keterangan Kelahiran</option>
                                <option value="Keterangan Ahli Waris">Keterangan Ahli Waris</option>
                                <option value="Keterangan Tidak Mampu">Keterangan Tidak Mampu</option>
                                <option value="Keterangan Pindah Masuk">Keterangan Pindah Masuk</option>
                                <option value="Keterangan Pindah Keluar">Keterangan Pindah Keluar</option>
                                <option value="Keterangan SKCK">Keterangan SKCK</option>
                                <option value="Keterangan Penelitian">Keterangan Penelitian</option>
                                <option value="Keterangan Belum Menikah">Keterangan Belum Menikah</option>
                                <option value="Keterangan Domisili Usaha">Keterangan Domisili Usaha</option>
                                <option value="Keterangan Domisili Perusahaan/Kantor">Keterangan Domisili Perusahaan/Kantor
                                </option>
                                <option value="Keterangan IMB">Keterangan IMB</option>
                                <option value="Keterangan SITU">Keterangan SITU</option>
                                <option value="Keterangan SIUP">Keterangan SIUP</option>
                                <option value="Keterangan Umum">Keterangan Umum</option>
                                <option value="Surat Keluar Umum">Surat Keluar Umum</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-outline-primary mt-3">
                            Input Data
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
