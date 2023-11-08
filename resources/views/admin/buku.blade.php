<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Buku</title>
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
                            <a class="nav-link" aria-current="page" href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('berita.berita-admin') }}">Berita</a>
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
                            <a class="nav-link active" aria-current="page" href="{{ route('admin.buku') }}">Buku</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Peminjaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-3">
            @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        <div class="row mt-4">
            <div class="col"></div>
            <div class="col-6">
                <form action="{{ route('admin.buku') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="search" name="search" class="form-control rounded" placeholder="Cari nama buku" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary">search</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col-2">
                <a class="btn btn-success" href="{{ route('admin.tambahBuku') }}" style="text-decoration: none; margin-left: 30px">Tambah Data +</a>
            </div>
        </div>
        <table class="table" style="margin-top: 10px">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $index => $buku)
                <tr>
                    <td scope="row">{{ $index + $data->firstItem() }}</td>
                    <td>
                        <img style="width: 50px" src="{{ asset('/images/' . $buku->gambar) }}" alt="cover buku">
                    </td>
                    <td>{{ $buku->kode_buku }}</td>
                    <td>{{ $buku->judul_buku }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->kategori }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                    <td>
                        <a class="btn btn-outline-warning" href="/admin/editBuku/{{ $buku->id }}">Edit</a>
                        <a class="btn btn-outline-danger" href="/admin/deleteBuku/{{ $buku->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table><br>
        {{ $data->links() }}
    </div><br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>