<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.108.0" />
    <title>{{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/" />
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="/assets/css/auth/login.css" rel="stylesheet" />
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <div class="card">
            <div class="card-body">
                <form action="/" method="POST">
                    @csrf
                    <img class="mb-3 mt-3" src="/assets/image/logo.png" alt="telkom" width="57" height="57" />
                    <h2 class="h3 mb-3 fw-normal mt-3">
                        Login
                    </h2>
                    {{-- <h2 class="mb-3 mt-3">
                        Login
                    </h2> --}}

                    <div class="form-floating">
                        <input type="text" class="form-control" name="NIP" id="floatingInput"
                            placeholder="Masukkan NIP" autofocus required />
                        <label for="floatingInput">NIP</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="floatingPassword"
                            placeholder="Password" required />
                        <label for="floatingPassword">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">
                        Sign in
                    </button>

                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
