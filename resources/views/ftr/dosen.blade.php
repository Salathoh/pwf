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
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadowy">
            <div class="container">
                <a class="navbar-brand" href="{{ route('user.home') }}">Prodi KSI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ftr.berita') }}">Berita KSI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ftr.lulusan') }}">Profile Lulusan KSI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('ftr.dosen') }}">Profile Dosen</a>
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
                        $query = "SELECT * FROM data_dosen";
                        $result = mysqli_query($koneksi, $query);

                        // Periksa apakah query berhasil
                        if (!$result) {
                            die("Query gagal: " . mysqli_error($koneksi));
                        }

                        // Loop untuk menampilkan data berita dari database

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col mb-5">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Nama: ' . $row["nama"] . '</h5>
                                    <p class="card-text">NIP: ' . $row["nip"] . '</p>
                                    <p class="card-text">Mata Kuliah: ' . $row["mata_kuliah"] . '</p>
                                    <p class="card-text">Email: ' . $row["email"] . '</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Diupload pada ' . $row["created_at"] . '</small>
                                </div>
                            </div>
                        </div>';
                        }
                        // Tutup koneksi database
                        mysqli_close($koneksi);
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
    </main>
</body>

</html>