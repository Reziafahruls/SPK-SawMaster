<!DOCTYPE html>
<html lang="en">
<?php
require "userlayout/head.php";
require "include/conn.php";
?>

<body>
    <div id="app">
        <?php require "userlayout/sidebar.php"; ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>Data Alternatif Siswa</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel Alternatif Siswa</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p class="card-text">
                                        Data-data mengenai siswa yang akan dievaluasi di representasikan dalam
                                        tabel berikut:
                                    </p>
                                </div>
                                <hr>
                                <div class="row justify-content-end mb-3">
                                    <div class="col-15">
                                        <div class="input-group">
                                            <span class="input-group-text" id="searchIcon">
                                                <i class="bi bi-search"></i>
                                            </span>
                                            <input type="text" class="form-control" id="searchInput" placeholder="Cari Nama...">
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <caption>
                                            Tabel Alternatif A<sub>i</sub>
                                        </caption>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Alternative</th>
                                            <th>Name</th>
                                            <th>NIS</th>
                                            <th>Kelas</th>
                                        </tr>
                                        <?php
                                        $sql = 'SELECT * FROM saw_alternatives';
                                        $result = $db_saw->query($sql);
                                        $i = 0;
                                        while ($row = $result->fetch_object()) {
                                            echo "<tr>
                                            <td class='right'>" . (++$i) . "</td>
                                            <td class='center'>A{$row->id_alternative}</td>
                                            <td class='center'>{$row->name}</td>
                                            <td class='center'>{$row->nis}</td>
                                            <td class='center'>" . (isset($row->kelas) ? $row->kelas : '') . "</td>
                                        </tr>\n";
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
            <?php require "userlayout/footer.php"; ?>
        </div>
    </div>

    <?php require "layout/js.php"; ?>
</body>
<!-- Pastikan Anda menambahkan jQuery sebelum script pencarian -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

</html>