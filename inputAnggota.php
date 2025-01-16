<!DOCTYPE html>
<html>
<head>
    <title>Input Data Anggota</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
        error_reporting();
        include 'koneksi.php';
    ?>
    <form action="prosesInputAnggota.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <legend>Data Anggota</legend>
            <table>
            <tr>
            <td>    <label for="id_anggota">ID Anggota</label></td>
            <td>:</td>
            <td>    <input type="text" id="id_anggota" name="id_anggota" required></td>
            </tr>

            <tr>
            <td>        <label for="nama">Nama</label></td>
            <td>:</td>
            <td>    <input type="text" id="nama" name="nama" required></td>
            </tr>
            
            <tr>
            <td>    <label for="tanggal_lahir">Tanggal Lahir</label></td>
            <td>:</td>
            <td>    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required></td>
            </tr>

            <tr>
            <td>    <label for="jenis_kelamin">Jenis Kelamin</label></td>
            <td>:</td>
            <td>
                <input type="radio" id="jenis_kelamin_l" name="jenis_kelamin" value="Laki Laki">Laki-Laki
                <input type="radio" id="jenis_kelamin_p" name="jenis_kelamin" value="Perempuan">Perempuan
              </td>
            </tr>

            <tr>
            <td>    <label for="no_hp">No Handphone</label></td>
            <td>:</td>
            <td>    <input type="text" id="no_hp" name="no_hp" required></td>
            </tr>

            <tr>
            <td>    <label for="email">Email</label></td>
            <td>:</td>
            <td>    <input type="email" id="email" name="email" required></td>
            </tr>

            <tr>
            <td>    <label for="keanggotaan">Jenis Keanggotaan</label></td>
            <td>:</td>
            <td>     
                <input type="checkbox" name="keanggotaan[]" value="Pelajar">Pelajar
                <input type="checkbox" name="keanggotaan[]" value="Mahasiswa">Mahasiswa
                <input type="checkbox" name="keanggotaan[]" value="Peneliti">Peneliti
                <input type="checkbox" name="keanggotaan[]" value="Umum">Umum
            </tr>

            <tr>
            <td>    <label for="alamat">Alamat</label></td>
            <td>:</td>
            <td> 
                <textarea id="alamat" name="alamat" required></textarea>
            </td>
            </tr>
            
            <tr>
            <td>    <label for="foto">Foto</label></td>
            <td>:</td>
            <td>  
                <input type="file" id="foto" name="foto" required>
            </tr>
            
            <tr>
            <td></td>
            <td></td>
            <td>    <input type="submit" id="simpan" name="simpan" value="Simpan"required></td>
            </tr>

            </table>
</form>

</body>
</html>
