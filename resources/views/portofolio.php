<!DOCTYPE html>
<html>

<head>
    <title>Portofolio Saya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        main {
            display: flex;
            margin: 15px;
        }

        article {
            flex-grow: 2;
            margin-right: 15px;
        }

        aside {
            flex-grow: 1;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Selamat datang di Portofolio Saya</h1>
        <nav>
            <ul>
                <li><a href="#about">Tentang Saya</a></li>
                <li><a href="#work">Pekerjaan Saya</a></li>
                <li><a href="#contact">Kontak Saya</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <article id="about">
            <header>
                <h2>Tentang Saya</h2>
            </header>

            <section>
                <p>Halo! Nama saya [Nama Anda]. Saya adalah seorang [pekerjaan Anda] dengan pengalaman lebih dari [jumlah tahun pengalaman Anda] tahun.</p>
            </section>
        </article>

        <aside id="work">
            <h2>Pekerjaan Saya</h2>
            <!-- Daftar pekerjaan Anda di sini -->
        </aside>
    </main>

    <footer id="contact">
        <h2>Kontak Saya</h2>
        <p>Anda dapat menghubungi saya melalui email: [email Anda]</p>
    </footer>
</body>

</html>