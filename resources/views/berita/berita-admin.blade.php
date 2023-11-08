<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile KSI</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
                            <a class="nav-link" href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('berita.berita-admin') }}">Berita</a>
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
                            <a class="nav-link" aria-current="page" href="#">Peminjaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container mt-5">
            <section id="card">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php
                        // Hubungkan ke database
                        $koneksi = mysqli_connect("localhost", "root", "", "project_laravel");

                        // Periksa koneksi
                        if (!$koneksi) {
                            die("Koneksi database gagal: " . mysqli_connect_error());
                        }

                        // Query untuk mengambil data berita
                        $query = "SELECT * FROM berita";
                        $result = mysqli_query($koneksi, $query);

                        // Periksa apakah query berhasil
                        if (!$result) {
                            die("Query gagal: " . mysqli_error($koneksi));
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $row["judul"] . '</h5>
                                        <p class="card-text">' . $row["konten"] . '</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Diupload pada ' . $row["created_at"] . '</small>
                                    </div>
                                    <div>
                                        <a href="' . route('berita.edit', $row['id']) . '" class="btn btn-primary">Edit</a>
                                    </div>
                                </div>
                            </div>';
                        }

                        mysqli_close($koneksi);
                        ?>
                    </div>
                </div>
            </section>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    </main>
</body>

</html>