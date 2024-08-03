<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('vendor/css/main/index.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('vendor/css/main/sidebar.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('vendor/css/main/topbar.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('vendor/css/main/book.css'); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            max-width: 600px; /* Maximum width */
            z-index: 1001; /* Ensure it is above everything else */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="blok1">
            <h1>List Mahasiswa</h1>
            <button class="tambah-btn" id="addMahasiswaBtn">Tambah Mahasiswa</button>
        </div>
        
        <table>
            <tr>
                <th>NIM</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php foreach ($mahasiswas as $mahasiswa): ?>
                <tr>
                    <td><?php echo $mahasiswa['nim']; ?></td>
                    <td><?php echo $mahasiswa['name']; ?></td>
                    <td><?php echo $mahasiswa['status']; ?></td>
                    <td>
                        <button class="detail-btn" data-nim="<?php echo $mahasiswa['nim']; ?>">Detail</button>
                        <button class="edit-btn" data-nim="<?php echo $mahasiswa['nim']; ?>">Edit</button>
                        <a href="<?= base_url('main/delete_mahasiswa/' . $mahasiswa['nim']); ?>" onclick="return confirm('Are you sure you want to delete this mahasiswa?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div id="mahasiswaDetailModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Detail Mahasiswa</h2>
            <div id="mahasiswaDetails">
                <!-- Details will be populated here -->
            </div>
        </div>
    </div>

    <div id="addMahasiswaModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Tambah Mahasiswa</h2>
            <form id="addMahasiswaForm" action="<?= base_url('main/add_mahasiswa'); ?>" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
                
                <label for="gander">Gander</label>
                <input type="text" id="gander" name="gander" required>
                
                <label for="birth">Birth</label>
                <input type="date" id="birth" name="birth" required>
                
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
                
                <label for="contact">Contact</label>
                <input type="text" id="contact" name="contact" required>
                
                <label for="status">Status</label>
                <input type="text" id="status" name="status" required>
                
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <div id="editMahasiswaModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Mahasiswa</h2>
            <form id="editMahasiswaForm" action="<?= base_url('main/update_mahasiswa'); ?>" method="post">
                <input type="hidden" id="edit_nim" name="nim">
                <label for="edit_name">Name</label>
                <input type="text" id="edit_name" name="name" required>
                
                <label for="edit_gander">Gander</label>
                <input type="text" id="edit_gander" name="gander" required>
                
                <label for="edit_birth">Birth</label>
                <input type="date" id="edit_birth" name="birth" required>
                
                <label for="edit_address">Address</label>
                <input type="text" id="edit_address" name="address" required>
                
                <label for="edit_contact">Contact</label>
                <input type="number" id="edit_contact" name="contact" required>
                
                <label for="edit_status">Status</label>
                <input type="text" id="edit_status" name="status" required>
                
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var detailModal = document.getElementById("mahasiswaDetailModal");
            var addModal = document.getElementById("addMahasiswaModal");
            var editModal = document.getElementById("editMahasiswaModal");
            var span = document.getElementsByClassName("close");

            $(".detail-btn").click(function() {
                var nim = $(this).data("nim");

                $.ajax({
                    url: "<?= base_url('main/get_mahasiswa_details'); ?>",
                    type: "POST",
                    data: {nim: nim},
                    success: function(response) {
                        var data = JSON.parse(response);
                        var detailsHtml = "<p>NIM: " + data.nim + "</p>";
                        detailsHtml += "<p>Name: " + data.name + "</p>";
                        detailsHtml += "<p>Gander: " + data.gander + "</p>";
                        detailsHtml += "<p>Birth: " + data.birth + "</p>";
                        detailsHtml += "<p>Address: " + data.address + "</p>";
                        detailsHtml += "<p>Contact: " + data.contact + "</p>";
                        detailsHtml += "<p>Status: " + data.status + "</p>";

                        $("#mahasiswaDetails").html(detailsHtml);
                        detailModal.style.display = "block";
                    }
                });
            });

            $("#addMahasiswaBtn").click(function() {
                addModal.style.display = "block";
            });

            $(".edit-btn").click(function() {
                var nim = $(this).data("nim");

                $.ajax({
                    url: "<?= base_url('main/get_mahasiswa_details'); ?>",
                    type: "POST",
                    data: {nim: nim},
                    success: function(response) {
                        var data = JSON.parse(response);
                        $("#edit_nim").val(data.nim);
                        $("#edit_name").val(data.name);
                        $("#edit_gander").val(data.gander);
                        $("#edit_birth").val(data.birth);
                        $("#edit_address").val(data.address);
                        $("#edit_contact").val(data.contact);
                        $("#edit_status").val(data.status);

                        editModal.style.display = "block";
                    }
                });
            });

            for (var i = 0; i < span.length; i++) {
                span[i].onclick = function() {
                    detailModal.style.display = "none";
                    addModal.style.display = "none";
                    editModal.style.display = "none";
                }
            }

            window.onclick = function(event) {
                if (event.target == detailModal) {
                    detailModal.style.display = "none";
                }
                if (event.target == addModal) {
                    addModal.style.display = "none";
                }
                if (event.target == editModal) {
                    editModal.style.display = "none";
                }
            }
        });
    </script>
</body>
</html>
