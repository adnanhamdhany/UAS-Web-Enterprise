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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="blok1">
            <h1>Daftar Buku</h1>
            <button class="tambah-btn" id="addBookBtn">Tambah Buku</button>
        </div>
        
        <table>
            <tr>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Harga Buku</th>
                <th>Nama Penulis</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?php echo $book['id_buku']; ?></td>
                    <td><?php echo $book['judul_buku']; ?></td>
                    <td><?php echo $book['harga_buku']; ?></td>
                    <td><?php echo $book['nama_penulis']; ?></td>
                    <td>
                        <a href="<?= base_url('main/edit_book_view/' . $book['id_buku']); ?>">Edit</a> | 
                        <a href="<?= base_url('main/delete_book/' . $book['id_buku']); ?>" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div id="addBookModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Tambah Buku</h2>
            <form id="addBookForm">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" id="judul_buku" name="judul_buku" required>
                
                <label for="harga_buku">Harga Buku</label>
                <input type="number" id="harga_buku" name="harga_buku" step="0.01" required>
                
                <label for="nama_penulis">Nama Penulis</label>
                <input type="text" id="nama_penulis" name="nama_penulis" required>
                
                <button type="submit">Tambah</button>
            </form>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("addBookModal");

        // Get the button that opens the modal
        var btn = document.getElementById("addBookBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Submit the form via AJAX
        $("#addBookForm").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "<?= base_url('main/add_book'); ?>",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    modal.style.display = "none";
                    location.reload();
                }
            });
        });
    </script>
</body>
</html>
