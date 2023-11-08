<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Tambah Data Buku</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Rakayasa Perangkat Lunak</a>
        </div>
    </nav>
    <div class="container">
        <a href="{{ route('admin.buku') }}">
            <i class="bi-arrow-left h1"></i>
        </a>
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
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <h5 class="card-title text-center">Tambah Data Buku</h5>
                        <form action="{{ route('postTambahBuku') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Kode Buku</label>
                                <input type="text" class="form-control border border-secondary form-control" name="kodeBuku" required value="{{ old('kodeBuku') }}">
                                <span class="text-danger">
                                    @error('kodeBuku')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Judul Buku</label>
                                <input type="text" class="form-control border border-secondary form-control" name="judulBuku" required value="{{ old('judulBuku') }}">
                                <span class="text-danger">
                                    @error('judulBuku')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Penulis</label>
                                <input type="text" class="form-control border border-secondary form-control" name="penulis" required value="{{ old('penulis') }}">
                                <span class="text-danger">
                                    @error('penulis')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Penerbit</label>
                                <input type="text" class="form-control border border-secondary form-control" name="penerbit" required value="{{ old('penerbit') }}">
                                <span class="text-danger">
                                    @error('penerbit')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Tahun Terbit</label>
                                <input type="date" class="form-control border border-secondary form-control" name="tahunTerbit" required value="{{ old('tahunTerbit') }}">
                                <span class="text-danger">
                                    @error('tahunTerbit')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Cover Buku</label>
                                <input class="form-control" type="file" name="gambar">
                                <div class="form-text">Maksimal ukuran gambar cover buku 5MB
                                </div>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Kategori Buku</label>
                                <select class="form-select" aria-label="Floating label select example" name="kategori">
                                    <option value="Programmer" selected>Programmer</option>
                                    <option value="Sains">Sains</option>
                                    <option value="Komik">Komik</option>
                                </select>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Comments</label>
                                <textarea class="form-control" name="deskripsi" placeholder="Tulis deskripsi buku disini...." style="height: 250px" required value="{{ old('deskripsi') }}"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success mt-5">Tambah Data Buku</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>