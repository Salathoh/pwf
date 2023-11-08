<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Input Berita</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.home') }}">D-IV Keamanan Sistem Informasi</a>
            </div>
        </nav>

        <div class="container mt-5">
            <h1>Edit Berita</h1>
            <form method="POST" action="{{ route('berita.update', $berita->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}">
                </div>
                <div class="mb-3">
                    <label for="konten" class="form-label">Konten</label>
                    <textarea class="form-control" id="konten" name="konten" rows="5">{{ $berita->konten }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>