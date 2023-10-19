<?php
require "include/conn.php";

// Periksa apakah 'id' telah diatur dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Persiapkan dan eksekusi kueri SQL
    $sql = "SELECT * FROM saw_users WHERE id_user = '$id'";
    $result = $db_saw->query($sql);

    // Periksa apakah kueri berhasil dieksekusi
    if ($result) {
        $row = $result->fetch_assoc();
    } else {
        // Tangani kesalahan kueri database di sini
        die("Kesalahan kueri database: " . $db_saw->error);
    }
} else {
    // Tangani kasus di mana 'id' tidak diatur dalam URL
    die("ID Pengguna tidak disediakan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require "layout/head.php"; ?>

<body>
    <div id="app">
        <?php require "layout/sidebar.php"; ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>Edit Pengguna</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form action="user-edit-act.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="id_user" value="<?= $row['id_user']; ?>" hidden>
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" value="<?= $row['username']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Pilih Role</label>
                                            <select class="form-select" aria-label="Default select example" name="role" required>
                                                <option value="" selected disabled>Pilih Role</option>
                                                <option value="Admin" <?= $row['role'] === 'Admin' ? 'selected' : ''; ?>>Admin</option>
                                                <option value="User" <?= $row['role'] === 'User' ? 'selected' : ''; ?>>User</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" value="<?= $row['tempat_lahir']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" value="<?= $row['tanggal_lahir']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin" required>
                                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki" <?= $row['jenis_kelamin'] === 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                                <option value="Perempuan" <?= $row['jenis_kelamin'] === 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="agama">Pilih Agama</label>
                                            <select class="form-select" aria-label="Default select example" name="agama" required>
                                                <option value="" selected disabled>Pilih Jenis Agama</option>
                                                <option value="Islam" <?= $row['agama'] === 'Islam' ? 'selected' : ''; ?>>Islam</option>
                                                <option value="Kristen" <?= $row['agama'] === 'Kristen' ? 'selected' : ''; ?>>Kristen</option>
                                                <option value="Katolik" <?= $row['agama'] === 'Katolik' ? 'selected' : ''; ?>>Katolik</option>
                                                <option value="Hindu" <?= $row['agama'] === 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                                                <option value="Budha" <?= $row['agama'] === 'Budha' ? 'selected' : ''; ?>>Budha</option>
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="email">Email</label>
                                                <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="telepon">Telepon</label>
                                                <input name="telepon" type="text" class="form-control" id="telepon" placeholder="Telepon">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" class="form-control" name="telepon" value="<?= $row['telepon']; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ulangi_password">Ulangi Password</label>
                                            <input name="ulangi_password" type="password" class="form-control" id="ulangi_password" placeholder="Ulangi Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" name="alamat"><?= $row['alamat']; ?></textarea>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-info btn-sm" value="Perbarui Pengguna">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php require "layout/footer.php"; ?>
        </div>
    </div>
    <?php require "layout/js.php"; ?>
</body>

</html>