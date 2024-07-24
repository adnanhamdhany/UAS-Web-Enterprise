<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Buku</h1>
        <form action="<?= base_url('main/add_book'); ?>" method="post">
            <label for="judul_buku">Judul Buku</label>
            <input type="text" id="judul_buku" name="judul_buku" required>
            
            <label for="harga_buku">Harga Buku</label>
            <input type="number" id="harga_buku" name="harga_buku" step="0.01" required>
            
            <label for="nama_penulis">Nama Penulis</label>
            <input type="text" id="nama_penulis" name="nama_penulis" required>
            
            <button type="submit">Tambah</button>
        </form>
    </div>
</body>
</html>
