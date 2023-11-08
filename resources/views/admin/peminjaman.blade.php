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
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.home') }}">D-IV Keamanan Sistem Informasi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('berita.berita-admin') }}">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ftr.lulusan') }}">Profile Lulusan KSI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ftr.dosen') }}">Profile Dosen</a>
                        </li>
                        <li class="nav-item dropdown"> <!-- Tambahkan class "dropdown" pada list item ini -->
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <li><a class="dropdown-item" href="{{ route('ftr.lulusan') }}">Profile Lulusan KSI</a></li>
                                <li><a class="dropdown-item" href="{{ route('ftr.dosen') }}">Profile Dosen</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"> <!-- Tambahkan class "dropdown" pada list item ini -->
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Input
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <li><a class="dropdown-item" href="{{ route('berita.form') }}">Input Berita</a></li>
                                <li><a class="dropdown-item" href="{{ route('dosen.form') }}">Input Data Dosen</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('admin.buku') }}">Buku</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('admin.peminjaman') }}">Buku</a>
                        </li>">Peminjaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="p-5 mb-4 bg-light rounded-3">    
                <h2 class="display-10 fw-bold">Selamat Datang {{ Auth::user()->name }}</h2>
        </div>

        <div class="container mt-3">
            @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ Session::get('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-6">
                    <form action="{{ route('admin.home') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="search" name="search" class="form-control rounded" placeholder="Cari nama admin" aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-2">
                    <a class="btn btn-success" href="{{ route('admin.tambah') }}" style="text-decoration: none; margin-left: 30px">Tambah Data +</a>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($data as $index => $userAdmin)
                    <tr>
                        <td>{{ $index + $data->firstItem() }}</td>
                        <td>{{ $userAdmin->name }}</td>
                        <td>{{ $userAdmin->email }}</td>
                        <td>{{ $userAdmin->jenis_kelamin }}</td>
                        <td>{{ $userAdmin->level }}</td>
                        <td>
                            <a class="btn btn-outline-warning" href="/editAdmin/{{ $userAdmin->id }}">Edit</a>
                            <a class="btn btn-outline-danger" href="/deleteAdmin/{{ $userAdmin->id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </main>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>