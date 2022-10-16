<?php include 'layout/header.php'; ?>

<?php
require 'vendor/autoload.php';

if(isset($_POST['submit'])){
    $err ="";
    $ekstensi="";
    $success="";

    $file_name = $_FILES['filexls']['name'];
    $file_data = $_FILES['filexls']['tmp_name'];

    if(empty($file_name)){
        $err .="<li> silakan</li>";
    }else{
        $ekstensi = pathinfo($file_name)['extension'];

    }

    $ekstensi_allowed = array("xls", "xlsx");
    if(!in_array($ekstensi, $ekstensi_allowed)){
        $err .="<li>SILAHKAN BENER</li>";
    }

    if(empty($err)){
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        $jumlahData = 0;
        for($i=1;$i<count ($sheetData);$i++){
            $id_pengguna = $sheetData[$i]['0'];
            $username_pengguna = $sheetData[$i]['1'];
            $alamat_pengguna = $sheetData[$i]['2'];
            $email_pengguna = $sheetData[$i]['3'];
            $password_pengguna = $sheetData[$i]['4'];
            $sql = "INSERT INTO pengguna(id_pengguna, username_pengguna, alamat_pengguna, email_pengguna, password_pengguna) value('$id_pengguna', '$username_pengguna', '$alamat_pengguna', '$email_pengguna', '$password_pengguna')";
            mysqli_query($conn, $sql);
            $jumlahData++;
        }

        if($jumlahData > 0){
            $success = "$jumlahData berhasil dimasukkan ke database";
        }
    }

    if($err){
        ?>
        <div class="alert alert-danger">
            <ul><?php echo $err ?></ul>
        </div>
        <?php    
    }

    if($success){
        ?>
        <div class="alert alert-primary">
            <ul><?php echo $success ?></ul>
        </div>
        <?php 
    } 
}