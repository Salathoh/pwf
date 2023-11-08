<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile KSI</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow>
            <div class="container">
                <a class="navbar-brand" href="{{ route('user.home') }}">D-IV Keamanan Sistem Informasi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('user.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ftr.berita') }}">Berita KSI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ftr.lulusan') }}">Profile Lulusan KSI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ftr.dosen') }}">Profile Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-6 fw-bold">Selamat Datang {{ Auth::user()->name }}</h1>
                <p class="col-md-8 fs-4">Dapatkan informasi terupdate dari Program Studi Keamanan Sistem Informasi dan jangan lewatkan kesempatan untuk mendaftar di program studi ini.</p>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>