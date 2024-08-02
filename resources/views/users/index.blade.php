<!DOCTYPE html>
<html>
<head>
    <title>Ajax Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Users:</h2>
<ul id="userList">
    <!-- Data akan dimuat di sini oleh JavaScript -->
</ul>

<script>
    $(document).ready(function() {
        // Ketika dokumen sudah dimuat, lakukan permintaan Ajax
        $.ajax({
            url: '{{ route('get.users') }}', // URL ke route yang telah didefinisikan sebelumnya
            method: 'GET', // Metode HTTP yang digunakan (dalam hal ini, GET)
            success: function(response) {
                // Fungsi ini akan dijalankan ketika permintaan berhasil
                // Update konten HTML dengan data yang diterima dari server
                var userList = $('#userList');
                userList.empty(); // Kosongkan konten sebelum memuat data baru

                // Iterasi melalui data yang diterima dari server
                $.each(response, function(index, user) {
                    // Tambahkan setiap pengguna sebagai elemen daftar ke dalam ul
                    userList.append('<li>' + user.fullname + ' (' + user.email + ')</li>');
                });
            },
            error: function(xhr, status, error) {
                // Fungsi ini akan dijalankan ketika terjadi kesalahan dalam permintaan Ajax
                console.error(error); // Log pesan kesalahan ke konsol browser
            }
        });
    });
</script>

</body>
</html>
