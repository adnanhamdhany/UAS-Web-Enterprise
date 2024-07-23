<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('vendor/css/main/index.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('vendor/css/main/sidebar.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('vendor/css/main/topbar.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('vendor/css/main/book.css'); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h1>Daftar Buku</h1>
        <table>
            <tr>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Harga Buku</th>
                <th>Nama Penulis</th>
            </tr>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?php echo $book['id_buku']; ?></td>
                    <td><?php echo $book['judul_buku']; ?></td>
                    <td><?php echo $book['harga_buku']; ?></td>
                    <td><?php echo $book['nama_penulis']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
