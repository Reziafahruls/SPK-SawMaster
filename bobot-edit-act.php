<?php
require "include/conn.php";

$id = $_POST['id_criteria'];
$criteria = $_POST['criteria'];
$weight = $_POST['weight'];
$attribute = $_POST['attribute'];

$sql = "UPDATE saw_criterias SET criteria='$criteria', weight='$weight', attribute='$attribute' WHERE id_criteria='$id'";
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
            window.location.href = 'bobot.php';
        }, 1500);
        </script>
        </body>
        ";
} else {
    echo "Error: " . $sql . "<br>" . $db_saw->error;
}
