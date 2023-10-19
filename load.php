<?php
include "include/conn.php";
if (isset($_GET['page'])) { ?>
    <link rel='stylesheet' href='assets/plugin/sweetalert2/sweetalert2.min.css'>
    <script src='assets/plugin/sweetalert2/sweetalert2.min.js'></script>
    <script>
        Swal.fire(
            'Succes!',
            'Data berhasil ditambahkan!',
            'success'
        )
        setTimeout(() => {
            window.location.href = 'alternatif.php';
        }, 2000);
    </script>
<?php } else { ?>
    <script>
        alert('cok')
    </script>
<?php } ?>