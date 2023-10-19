<!DOCTYPE html>
<html lang="en">
<?php
require "layout/head.php";
require "include/conn.php"; // Make sure this file contains the database connection code
?>

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
                <h3>Kelola User</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel User</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p class="card-text">
                                        Data-data pengguna yang akan dikelola diwakili dalam tabel berikut:
                                    </p>
                                </div>
                                <button type="button" class="btn btn-outline-success btn-sm m-2" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                    Tambah User
                                </button>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <caption>
                                            Tabel User
                                        </caption>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <?php
                                        $sql = 'SELECT * FROM saw_users'; // Assuming the table name is "saw_users"
                                        $result = $db_saw->query($sql); // Change to the correct database connection
                                        $i = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                <td>" . (++$i) . "</td>
                                                <td>{$row['username']}</td>
                                                <td>{$row['password']}</td>
                                                <td>{$row['role']}</td>
                                                <td>{$row['email']}</td>
                                                <td>
                                                    <div class='btn-group mb-1'>
                                                        <div class='dropdown'>
                                                            <button class='btn btn-primary dropdown-toggle me-1 btn-sm' type='button'
                                                                id='dropdownMenuButton' data-bs-toggle='dropdown'
                                                                aria-haspopup='true' aria-expanded='false'>
                                                                Aksi
                                                            </button>
                                                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                                                <a class='dropdown-item' href='user-edit.php?id={$row['id_user']}'>Edit</a>
                                                                <a class='dropdown-item' href='#' onclick='confirmDelete({$row['id_user']})'>Hapus</a>
                                                                <a class='dropdown-item' href='user-detail.php?id={$row['id_user']}'>Detail</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>";
                                        }
                                        $result->free();
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php require "layout/footer.php"; ?>
        </div>
    </div>

    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah User</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="user-simpan.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username" placeholder="Nama Pengguna..." class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select class="form-select" aria-label="Default select example" name="role" required>
                                <option value="" selected disabled>Pilih Role</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="showPassword" onclick="myFunction()">
                            <label class="form-check-label" for="showPassword">Show Password</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" name="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require "layout/js.php"; ?>
</body>
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function confirmDelete(id) {
        Swal.fire({
            title: 'Konfirmasi Hapus!',
            text: "Apakah anda ingin menghapus user ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#008000',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Success',
                    text: "Data Berhasil Dihapus!",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'user-hapus.php?id=' + id;

                    }
                })
                // Swal.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                // )
                // setTimeout(() => {
                //     window.location.href = 'alternatif-hapus.php?id=' + id;
                // }, 2000); // 2000 milidetik = 2 detik
                // window.location.href = 'alternatif-hapus.php?id=' + id;
            }
        }).catch((error) => {
            // Handle kesalahan jika ada
            Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat menghapus data.',
                icon: 'error',
                confirmButtonText: 'Tutup'
            });
        });
    }
</script>

</html>