@extends('layouts.main')

@section('isi')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            {{-- <h4 class="h2">{{ $desc }}</h4> --}}
            <h4 class=>{{ $desc }}</h4>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="/add-users" class="btn btn-sm btn-outline-success">
                        <i class="bi bi-person-add me-2"></i>Add User
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
                                <th scope="col">@sortablelink('name', 'Nama')</th>
                                <th scope="col">@sortablelink('role', 'Role')</th>
                                <th scope="col">@sortablelink('NIP', 'NIP')</th>
                                {{-- <th scope="col">Password</th> --}}
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        @php
                            $nomor = 1 + ($data->currentPage() - 1) * $data->perPage();
                        @endphp
                        @foreach ($data as $item)
                            <tbody>
                                <tr>
                                    {{-- <td class="hidden">{{ $item->id }}</td> --}}
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>{{ $item->NIP }}</td>
                                    <td>
                                        {{-- button edit --}}
                                        <a class="btn btn-warning btn-sm me-2" href="/users-{{ $item->id }}"
                                            role="button">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        {{-- end button edit --}}

                                        <form action="/delete-users/{{ $item->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm me-2"
                                                onclick="return confirm('Anda yakin ingin menghapus user ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
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


@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            read(id);
        });

        function read(id) {
            $.get("{{ url('users') }}/" + id, {}, function(data, status) {
                // $('#read').html(data);
                $("#showModal").modal('show');
            });
        }

        // function show(id) {
        //     $.ajax({
        //         type: "POST",
        //         url: "/users/{id}",
        //         data: [
        //             'name=' + name,
        //             'role=' + role,
        //             'NIP=' + NIP,
        //             'password=' + password,
        //         ],
        //         success: function(data) {
        //             // console.log(response);
        //             read(id);
        //         }
        //     });
        // }
    </script>
@endsection
