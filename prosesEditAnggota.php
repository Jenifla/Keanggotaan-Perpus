<?php
error_reporting();
include 'koneksi.php';

if(isset($_POST['edit'])){
    $id_anggota = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $keanggotaan = implode(",", $_POST['keanggotaan']);
    $alamat = $_POST['alamat'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if ($foto != "") {
        $path = "foto/";

    $result = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id_anggota'");
    while($row = mysqli_fetch_array($result)){
        $old_photo = $row['foto'];
        if ($old_photo != "") {
            unlink($path . $old_photo);
        }
    }

        $foto = uniqid() . '-' . $foto;
        move_uploaded_file($tmp, $path . $foto);
    } else {
        $result = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id_anggota'");
        while($row = mysqli_fetch_array($result)){
            $foto = $row['foto'];
        }
    }
}

$hasil = mysqli_query($koneksi, "UPDATE anggota SET nama='$nama', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', 
        email='$email', keanggotaan='$keanggotaan', alamat='$alamat', foto='$foto' WHERE id_anggota='$id_anggota'");

if (!$hasil){
    die ("Data Gagal Diubah".mysqli_errno($koneksi).mysqli_error($koneksi));
} else {
    echo "<script>alert('Data Berhasil Diubah');window.location.href='index.php'</script>";
}
?>
