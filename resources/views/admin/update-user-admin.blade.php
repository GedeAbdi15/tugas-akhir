@extends('layouts.main')

@section('isi')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            {{-- <h1 class="h2">{{ $desc }}</h1> --}}
            <h4>{{ $desc }}</h4>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="/users">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Manage User</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card">
                <form action="/users-{{ $data->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Nama"
                                value="{{ $data->name }}">
                            <label for="floatingInput">Nama</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="role" placeholder="Role"
                                value="{{ $data->role }}">
                            <label for="floatingInput">Role</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="NIP" placeholder="NIP"
                                value="{{ $data->NIP }}">
                            <label for="floatingInput">NIP</label>
                        </div>

                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" name="password"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <button type="submit" class="btn btn-outline-primary mt-3">Update Data
                            User</button>

                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
