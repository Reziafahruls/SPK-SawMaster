<?php

include('include/conn.php');
session_start();

if (isset($_POST['btn_registrasi'])) {
    // print_r($_POST);


    $username = $_POST['username'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = date("Y-m-d", strtotime($_POST['tanggal_lahir']));
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $password = ($_POST['password']);
    $ulangi_password = ($_POST['ulangi_password']);

    if ($password != $ulangi_password) {
        echo "Error: Password tidak sama";
        echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
        die;
    }

    // Insert tabel user
    // $sql_user = "INSERT INTO users () values ('')";
    $sql_user = "INSERT INTO saw_users 
    (username, password, role, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, email, telepon, ulangi_password) values ('$username', '$password', 'user','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat','$email','$telepon', '$ulangi_password')";
    $result_user = mysqli_query($db_saw, $sql_user);

    if ($result_user) {
        $data_user = mysqli_query($db_saw, "SELECT LAST_INSERT_ID()");
        while ($u = mysqli_fetch_array($data_user)) {
            $id_user = $u[0];
        }
        // Redirect to login.php with a success message
        header('location: login.php?registration_success=1');
    } else {
        // jika query users gagal
        echo "Error insert users: " . mysqli_error($db_saw);
        echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
        die;
    }
}
