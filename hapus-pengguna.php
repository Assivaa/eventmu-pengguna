<?php

include 'config/app.php';

$id = (int)$_GET['id_pengguna'];



if (delete_pengguna($id) > 0) {
    echo "<script> 
                alert('SUKSES! Data pengguna Berhasil Dihapus');
                document.location.href = 'pengguna.php'
            </script>";
} else {
    echo "<script> 
                alert('GAGAL! Data pengguna Tidak Berhasil Dihapus');
                document.location.href = 'pengguna.php'
            </script>";
}
