<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kaca Mata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/customer">OPTIC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url("/customer")}}">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url("/kacamata")}}">Kaca Mata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url("/logout")}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex justify-content-center mt-5">
        <div class="shadow p-3 bg-body rounded">
            <h1 class="text-center mb-5">
                TAMBAH KACA MATA
            </h1> 
            @if ($message = Session::get('success'))
                <div class="alert alert-success mx-4">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('fail'))
                <div class="alert alert-danger mx-4">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form method="POST">
                @csrf
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis Kacamata</label>
                    <input type="text" class="form-control" id="jenis" name="jenis">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Kacamata</label>
                    <input type="number" class="form-control" id="harga" name="harga">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
        let jquery_datatable = $("#table").DataTable()
    </script>
</body>
</html>