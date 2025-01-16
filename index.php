<!DOCTYPE html>
<html>

<head>
    <title>Daftar Anggota</title>
    <!-- Menambahkan link ke Bootstrap CSS untuk tampilan tabel yang lebih baik -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    
    <!-- Menambahkan link DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

    <!-- Menambahkan link ke Font Awesome (untuk ikon di edit/hapus) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Link ke file CSS kustom jika ada -->
    <link rel="stylesheet" href="style1.css">

    <!-- Link ke jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Menambahkan link ke DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <div class="container">
    <?php
        error_reporting();
        include 'koneksi.php';
    ?>

    <h1 style="text-align:center; color: #444; font-size:35px;">Data Anggota</h1>
    <center><a href="inputAnggota.php">Tambah Data</a></center>
    <br>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>No Handphone</th>
                <th>Email</th>
                <th>Jenis Keanggotaan</th>
                <th>Alamat</th>
                <th>Foto</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no=0;
        $result = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id_anggota ASC;");
        while ($row = mysqli_fetch_array($result)) {
            $no++;
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $row['id_anggota'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['tanggal_lahir'] . "</td>";
            echo "<td>" . $row['jenis_kelamin'] . "</td>";
            echo "<td>" . $row['no_hp'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['keanggotaan'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "<td> 
            <center><img src='foto/" . $row['foto'] . "' alt='Foto' width='80px' height='80px'></center>
            </td>";
            echo "<td><a href='editAnggota.php?id=" . $row['id_anggota'] . "' >Edit</a></td>";
            echo "<td><a href='hapusAnggota.php?id=" . $row['id_anggota'] . "'>Hapus</a></td>";
            echo "</tr>";  
        }

        mysqli_close($koneksi);
        ?>
        </tbody>
    </table>  

<script> 
    $(document).ready(function () {
        // Inisialisasi DataTable dengan pengaturan untuk pagination dan pencarian
        $('#example').DataTable({
            "paging": true,         // Mengaktifkan pagination
            "searching": true,      // Mengaktifkan fitur pencarian
            "lengthChange": false,  // Menonaktifkan perubahan jumlah baris per halaman
            "pageLength": 10         // Menampilkan 5 baris per halaman
        });
    });
</script>
</div>
</body>

</html>
