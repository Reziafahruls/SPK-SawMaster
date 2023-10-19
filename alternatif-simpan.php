<?php
include "include/conn.php";
$name = $_POST['name'];
$nis = $_POST['nis'];
$kelas = $_POST['kelas'];

// Cek apakah data dengan nama yang sama sudah ada
$check_sql = "SELECT * FROM saw_alternatives WHERE name = '$name' AND nis = '$nis' AND kelas = '$kelas'";
$check_result = $db_saw->query($check_sql);

if ($check_result->num_rows > 0) {
    // Data sudah ada, tampilkan popup pemberitahuan
    echo "
        <body>
            
        <link rel='stylesheet' href='assets/plugin/sweetalert2/sweetalert2.min.css'>
        <script src='assets/plugin/sweetalert2/sweetalert2.min.js'></script>
        
        <script>
        Swal.fire(
            'failed!',
            'Data sudah tersedia!.',
            'failed'
            )
            setTimeout(() => {
                window.location.href = 'alternatif.php';
            }, 1000);
            </script>
            </body>
            ";
} else {
    // Data belum ada, lakukan operasi INSERT
    $sql = "INSERT INTO saw_alternatives (name, nis, kelas) VALUES ('$name', '$nis', '$kelas')";

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
            'Data berhasil ditambahkan.',
            'success'
            )
            setTimeout(() => {
                window.location.href = 'alternatif.php';
            }, 1000);
            </script>
            </body>
            ";
    } else {
        echo "Error: " . $sql . "<br>" . $db_saw->error;
    }
    // alert('Data berhasil ditambahkan');
}
