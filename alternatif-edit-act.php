<?php
require "include/conn.php";

$id = $_POST['id_alternative'];
$name = $_POST['name'];
$nis = $_POST['nis'];
$kelas = $_POST['kelas'];
$sql = "UPDATE saw_alternatives SET name='$name', nis='$nis', kelas='$kelas' WHERE id_alternative='$id'";
$result = $db_saw->query($sql);
if ($db_saw->query($sql) === true) {
    // Operasi INSERT berhasil, tampilkan popup data berhasil ditambahkan
    // alert('Data Ini Sudah Di Daftarkan');
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
            window.location.href = 'alternatif.php';
        }, 1500);
        </script>
        </body>
        ";
} else {
    echo "Error: " . $sql . "<br>" . $db_saw->error;
}
