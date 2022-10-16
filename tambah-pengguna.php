<?php

include 'layout/header.php';

if (isset($_POST['tambah-pengguna'])) {
    if (create_pengguna($_POST) > 0) {
        echo "<script> 
                alert('SUKSES! Data Pengguna Berhasil Ditambahkan');
                document.location.href = 'pengguna.php'
            </script>";
    } else {
        echo "<script> 
                alert('GAGAL! Data Pengguna Tidak Berhasil Ditambahkan');
                document.location.href = 'pengguna.php'
            </script>";
    }
}

?>

<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Data Pengguna</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="container">
                        <form action="" method="post">
                        <div class="form-group">
                                <label for="pengguna" class="form-control-label">Username Pengguna</label>
                                <input class="form-control" type="text" value="" id="pengguna" name="username_pengguna" required>
                            </div>
                            <div class="form-group">
                                <label for="pengguna" class="form-control-label">Alamat</label>
                                <input class="form-control" type="text" value="" id="pengguna" name="alamat_pengguna" required>
                            </div>
                            <div class="form-group">
                                <label for="pengguna" class="form-control-label">Email Pengguna</label>
                                <input class="form-control" type="text" value="" id="pengguna" name="email_pengguna" required>
                            </div>
                            <div class="form-group">
                                <label for="pengguna" class="form-control-label">Password pengguna</label>
                                <input class="form-control" type="password" value="" id="pengguna" name="password_pengguna" required>
                            </div>
                            <button type="submit" class="btn bg-gradient-primary btn-lg w-100" name="tambah-pengguna">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'layout/footer.php'; ?>