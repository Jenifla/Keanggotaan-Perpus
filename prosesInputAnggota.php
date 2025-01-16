<?php
    error_reporting();
    include 'koneksi.php';
        if(isset($_POST['simpan'])){

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
            $path = "foto/".$foto;
        
            if(move_uploaded_file($tmp, $path)){
        
                $query = "INSERT INTO anggota (id_anggota, nama, tanggal_lahir, jenis_kelamin, no_hp, email, keanggotaan, alamat, foto) 
                        VALUES ('$id_anggota','$nama','$tanggal_lahir','$jenis_kelamin', '$no_hp', '$email', '$keanggotaan', '$alamat', '$foto')";
                $result = mysqli_query($koneksi, $query);
        
                if($result){
                    echo "<script>alert('Data berhasil disimpan!'); window.location = 'index.php';</script>";
                }else{
                    echo "<script>alert('Data gagal disimpan!'); window.location = 'inputAnggota.php';</script>";
                }
        
            }else{
                echo "<script>alert('Gagal upload foto!'); window.location = 'inputAnggota.php';</script>";
            }
        
        }
?>
