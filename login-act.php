<?php
include 'include/conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = $db_saw->query("SELECT * FROM saw_users WHERE username='$username' AND password='$password'");
$userData = $login->fetch_assoc();

if ($userData) {
    session_start();
    $_SESSION['username'] = $userData['username'];
    $_SESSION['role'] = $userData['role']; // Menyimpan peran pengguna dalam sesi
    $_SESSION['status'] = "login";

    if ($userData['role'] == 'admin') {
        echo '<body>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        Swal.fire({
            icon: "success",
            title: "Login Successful",
            text: "Welcome, ' . $userData['username'] . '!",
            showConfirmButton: true,
            timer: 2000
        }).then(function() {
            window.location.href = "dashboard.php"; // Redirect to admin_dashboard
        });
        </script>
        </body>';
    } else {
        // Display SweetAlert2 success message for regular users
        echo '
        <body>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        Swal.fire({
            icon: "success",
            title: "Login Successful",
            text: "Welcome, ' . $userData['username'] . '!",
            showConfirmButton: true,
            timer: 2000
        }).then(function() {
            window.location.href = "user.php"; // Redirect to user_dashboard
        });
        </script>
        </body>';
    }
} else {
    header("location:login.php");
}
