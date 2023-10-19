<?php
require "include/conn.php";
$id_alternative = $_POST['id_alternative'];
$id_criteria = $_POST['id_criteria'];
$value = $_POST['value'];

$check_sql = "SELECT * FROM saw_evaluations WHERE id_alternative = '$id_alternative' AND id_criteria = '$id_criteria'";
$check_result = $db_saw->query($check_sql);

if (!$check_result) {
    // Cek kesalahan dalam menjalankan kueri
    echo "Error: " . $check_sql . "<br>" . $db_saw->error;
} else {
    if ($check_result->num_rows > 0) {
        // data sudah ada, tampilkan popup pemberitahuan
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
                window.location.href = 'matrik.php';
            }, 1500);
            </script>
            </body>
            ";
    } else {
        // data belum ada, lakukan operasi INSERT
        $sql = "INSERT INTO saw_evaluations VALUES ('$id_alternative','$id_criteria','$value')";

        if ($db_saw->query($sql) === true) {
            // Operasi INSERT berhasil, tampilkan popup data berhasil ditambahkan
            echo  "
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
                    window.location.href = 'matrik.php';
                }, 1500);
                </script>
                </body>
                ";
        } else {
            // Cek kesalahan dalam menjalankan kueri INSERT
            echo "Error: " . $sql . "<br>" . $db_saw->error;
        }
    }
}

// Tutup koneksi ke database jika perlu
$db_saw->close();
