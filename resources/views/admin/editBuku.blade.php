<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Edit Data Buku</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand" href="/">D-IV Keamanan Sistem Informasi</a>
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
                        <h5 class="card-title text-center">Update Data Buku</h5>
                        <form action="/postEditBuku/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Kode Buku</label>
                                <input type="text" class="form-control border border-secondary form-control" name="kodeBuku" required value="{{ $data->kode_buku }}"><span class="text-danger">
                                    @error('kodeBuku')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Judul Buku</label>
                                <input type="text" class="form-control border border-secondary form-control" name="judulBuku" required value="{{ $data->judul_buku }}"><span class="text-danger">
                                    @error('judulBuku')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Penulis</label>
                                <input type="text" class="form-control border border-secondary form-control" name="penulis" required value="{{ $data->penulis }}"><span class="text-danger">
                                    @error('penulis')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Penerbit</label>
                                <input type="text" class="form-control border border-secondary form-control" name="penerbit" required value="{{ $data->penerbit }}"><span class="text-danger">
                                    @error('penerbit')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Tahun Terbit</label>
                                <input type="text" class="form-control border border-secondary form-control" name="tahunTerbit" required value="{{ $data->tahun_terbit }}"><span class="text-danger">
                                    @error('tahunTerbit')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Cover Buku</label>
                                <input class="form-control mb-2" placeholder="Nama file lama: {{ $data->gambar }}" disabled>
                                <input class="form-control" type="file" name="gambar">
                                <div class="form-text">Maksimal ukuran gambar cover buku 5MB</div>
                                <img class="mt-3" style="width: 100px" src="{{ asset('/images/' . $data->gambar) }}" alt="cover buku">
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Kategori Buku</label>
                                <select class="form-select" aria-label="Floating label select example" name="kategori">
                                    @foreach ($kategori as $option)
                                    <option value="{{ $option }}" @if ($option==$data->kategori) selected @endif>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Comments</label>
                                <textarea class="form-control" name="deskripsi" style="height: 250px" required>{{ $data->deskripsi }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success mt-5">Update Data Buku</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>