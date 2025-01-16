<?php
include 'koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $result = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id'");
    while($row = mysqli_fetch_array($result)){
        $old_photo = $row['foto'];
        if ($old_photo != "") {
            unlink("foto/" . $old_photo);
        }
    }
    
    $hapus = mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota='$id'");
    if($hapus){
        echo "<script>
        alert('Data Berhasil Dihapus');
        window.location.href='index.php';
        </script>";
    } else{
        die("Data gagal dihapus." . mysqli_error($koneksi));
    }
    
} else{
    header("Location: index.php");
}
?>
