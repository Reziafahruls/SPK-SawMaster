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
                <h3>Detail Data Pengguna</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h4 class="card-title">Detail Data Pengguna</h4>
                        </div> -->

                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form>
                                        <?php
                                        $id = $_GET['id'];
                                        $sql = "SELECT * FROM saw_users WHERE id_user = '$id' ";
                                        $result = $db_saw->query($sql);
                                        $row = $result->fetch_array();
                                        ?>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" value="<?= $row['username']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <input type="text" class="form-control" name="role" value="<?= $row['role']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" value="<?= $row['tempat_lahir']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="text" class="form-control" name="tanggal_lahir" value="<?= $row['tanggal_lahir']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <input type="text" class="form-control" name="jenis_kelamin" value="<?= $row['jenis_kelamin']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <input type="text" class="form-control" name="agama" value="<?= $row['agama']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" value="<?= $row['email']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" class="form-control" name="telepon" value="<?= $row['telepon']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" name="alamat" readonly><?= $row['alamat']; ?></textarea>
                                        </div>
                                    </form>

                                    <div class="form-group">
                                        <a href="user-edit.php?id=<?= $row['id_user']; ?>" class="btn btn-info btn-sm">Edit Pengguna</a>
                                    </div>


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