<!DOCTYPE html>
<html lang="end">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" cpntent="width=device-width, initial-scale=1.0">
        <title> Dashboard Penjualan </title>
        <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    </head>
    <body>
        <div class="sidebar">
        <h2> Dashboard Penjualan </h2>
            <ul>
                <li><a href="{{ url(Auth::user()->role.'/home') }}">Home</a></li>
                <li><a href="{{ url(Auth::user()->role.'/produk') }}">Produk</a></li>
                <li><a href="#">Penjualan</a></li>
                <li><a href="{{ url(Auth::user()->role.'/laporan') }}">Laporan</a></li>
                <form action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-decoration-none bg-transparent border-0 text-white" style="font-size: 18px;">Logout</button>
                </form>
            </ul>
        </div>

        <!-- Main Content -->
        <div>
        <div class="main-content">
        <header style="display: flex; justify-content:space-between">
            <div>
                <h1> Daftar Produk </h1>
                <p> Temukan produk terbaik untuk kebutuhan anda </p>
                </div>
                <div>
                    <button class="card-button"><a class="text-decoration-none text-wh" href="{{ url(Auth::user()->role.'/produk/add') }}"> Add Product </a></button>
                </div>
                <header>
                <div>
                    <div class="container">
                        <h1> Create Product </h1>
                        <form action="{{ url(Auth::user()->role.'/produk/add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_produk"> Nama Produk </label>
                            <input type="text" name="nama_produk" clas="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi"> Deskripsi </label>
                            <input type="text" name="deskripsi" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="harga"> Harga </label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>

                        <div class="form-grooup">
                            <label for=jumlah_produk> Jumlah Produk </label>
                            <input type="text" name="jumlah_produk" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="image"> Gambar </label>
                            <input type="file" name="image" class="form-control" required>

                    <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>

        <footer>
            <p>&copy; 2024 Aplikasi Penjualan. All rights reserved.</p>
        </footer>
    </body>
</html>
