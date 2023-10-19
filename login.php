<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SAW</title>
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="stylesheet" href="assets/plugin/sweetalert2/sweetalert2.min.css">

    <style>
        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        #auth {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        #auth-center {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .auth-title {
            text-align: center;
        }

        /* Tambahkan gaya untuk notifikasi register berhasil */
        .registration-success {
            background-color: #dff0d8;
            border: 1px solid #d0e9c6;
            color: #3c763d;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="auth">
        <div id="auth-center">
            <h1 class="auth-title">Login</h1>
            <?php
            session_start();

            // Check if a registration success message is present in the URL
            if (isset($_GET['registration_success']) && $_GET['registration_success'] == 1) {
                // Display a Bootstrap alert for registration success
                echo '<div class="registration-success">
                    Registrasi berhasil! Silakan Login!.
                  </div>';
            }
            ?>
            <form action="login-act.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="showPassword" onclick="myFunction()">
                    <label class="form-check-label" for="showPassword">Show Password</label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Log in</button>
            </form>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            setTimeout(function() {
                closeNotification();
            }, 1500);
        }
    </script>
</body>
<script src="assets/plugin/sweetalert2/sweetalert2.min.js"></script>

</html>