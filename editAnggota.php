<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Anggota</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    error_reporting();
    include 'koneksi.php';
        if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        $result = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id'");
            while($row = mysqli_fetch_array($result)){
                $id_anggota = $row['id_anggota'];
                $nama = $row['nama'];
                $tanggal_lahir = $row['tanggal_lahir'];
                $jenis_kelamin = $row['jenis_kelamin'];
                $no_hp = $row['no_hp'];
                $email = $row['email'];
                $keanggotaan = $row['keanggotaan'];
                $alamat = $row['alamat'];
                $foto = $row['foto'];
            }
        } else{
            header("Location: index.php");
        }
        $ang =explode(",", $keanggotaan);

?>
    <form action="prosesEditAnggota.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <legend>Data Anggota</legend>
            <table>
            <tr>
            <td>    <label for="id_anggota">ID Anggota</label></td>
            <td>:</td>
            <td>    <input type="text" id="id_anggota" name="id_anggota" required readonly value="<?php echo $id_anggota; ?>"></td>
        </tr>
            <tr>
            <td>        <label for="nama">Nama:</label></td>
            <td>:</td>
            <td>    <input type="text" id="nama" name="nama" value="<?php echo $nama;?>" required></td>
        </tr>
            
            <tr>
            <td>    <label for="tanggal_lahir">Tanggal Lahir</label></td>
            <td>:</td>
            <td>    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir;?>" required></td>
        </tr>

        <tr>
            <td>    <label for="jenis_kelamin">Jenis Kelamin</label></td>
            <td>:</td>
            <td>    
                <input type="radio" name="jenis_kelamin" value="Laki Laki" <?php if ($jenis_kelamin == 'Laki Laki') echo 'checked'; ?>>Laki-Laki
                <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($jenis_kelamin == 'Perempuan') echo 'checked'; ?>>Perempuan
            </td>
        </tr>

        <tr>
            <td>    <label for="no_hp">No Handphone</label></td>
            <td>:</td>
            <td>    <input type="text" id="no_hp" name="no_hp" value="<?php echo $no_hp;?>" required></td>
        </tr>

        <tr>
            <td>    <label for="email">Email</label></td>
            <td>:</td>
            <td>    <input type="email" id="email" name="email" value="<?php echo $email;?>"required></td>
        </tr>

        <tr>
    <td><label for="keanggotaan">Jenis Keanggotaan</label></td>
    <td>:</td>
    <td>
        <input type="checkbox" name="keanggotaan[]" value="Pelajar" <?php in_array('Pelajar', $ang) ? print('checked') : ''; ?>>Pelajar
        <input type="checkbox" name="keanggotaan[]" value="Mahasiswa" <?php in_array('Mahasiswa', $ang) ? print('checked') : ''; ?>>Mahasiswa
        <input type="checkbox" name="keanggotaan[]" value="Peneliti" <?php in_array('Peneliti', $ang) ? print('checked') : ''; ?>>Peneliti
        <input type="checkbox" name="keanggotaan[]" value="Umum" <?php in_array('Umum', $ang) ? print('checked') : ''; ?>>Umum
    </td>
</tr>


            <tr>
            <td>    <label for="alamat">Alamat</label></td>
            <td>:</td>
            <td> 
                <textarea id="alamat" name="alamat" required> <?php echo $alamat; ?></textarea></td>
        </tr>
            
            <tr>
            <td>    <label for="foto">Foto</label></td>
            <td>:</td>
            <td>    <input type="file" id="foto" name="foto" /><br>
                <?php if (!empty($foto)) { echo $foto;}?></td>
        </tr>
            
            <tr>
            <td></td>
            <td></td>
            <td>    <input type="submit" id="edit" name="edit" value="Edit"required></td>
        </tr>

            </table>
    </form>
</body>
</html>
