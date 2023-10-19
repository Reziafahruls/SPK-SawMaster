<?php
require "include/conn.php";

// Peroleh data dari formulir
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = date("Y-m-d", strtotime($_POST['tanggal_lahir']));
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$password = $_POST['password'];
$ulangi_password = $_POST['ulangi_password'];

// Perbarui data pengguna dalam database tanpa kolom 'email'
$sql = "UPDATE saw_users SET 
    username='$username',
    tempat_lahir='$tempat_lahir',
    tanggal_lahir='$tanggal_lahir',
    jenis_kelamin='$jenis_kelamin',
    agama='$agama',
    alamat='$alamat',
    telepon='$telepon'
    WHERE id_user='$id_user'";

$result = $db_saw->query($sql);

if ($result) {
    // Data berhasil diperbarui, tampilkan popup data berhasil diperbarui
    echo "
    <body>
        
    <link rel='stylesheet' href='assets/plugin/sweetalert2/sweetalert2.min.css'>
    <script src='assets/plugin/sweetalert2/sweetalert2.min.js'></script>
    
    <script>
    Swal.fire(
        'Succes!',
        'Data berhasil diperbaharui.',
        'success'
        )
        setTimeout(() => {
            window.location.href = 'user-kelola.php';
        }, 1500);
        </script>
        </body>
        ";
} else {
    // Tangani kesalahan kueri atau koneksi database
    echo "Error: " . $sql . "<br>" . $db_saw->error;
}
