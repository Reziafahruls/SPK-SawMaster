<!DOCTYPE html>
<html lang="en">
<?php
require "userlayout/head.php";
require "include/conn.php";
require "W.php";
require "R.php";
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
        <h3>Nilai Preferensi (P)</h3>
      </div>
      <div class="page-content">
        <section class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h4 class="card-title">Tabel Nilai Preferensi (P)</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <p class="card-text">
                    Nilai preferensi (P) merupakan penjumlahan dari perkalian matriks ternormalisasi R dengan vektor bobot W.</p>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped mb-0">
                    <caption>
                      Nilai Preferensi (P)
                    </caption>
                    <tr>
                      <th>No</th>
                      <th>Alternatif</th>
                      <th>Hasil</th>
                      <th>Rank</th> <!-- Kolom baru untuk menampilkan peringkat -->
                    </tr>
                    <?php
                    $P = array();
                    $m = count($W);
                    $no = 0;
                    $rank = array(); // Array untuk menyimpan peringkat

                    if (isset($R)) { // Check if $R is set
                      foreach ($R as $i => $r) {
                        for ($j = 0; $j < $m; $j++) {
                          $P[$i] = (isset($P[$i]) ? $P[$i] : 0) + $r[$j] * $W[$j];
                        }

                        // Simpan nilai P dan indeksnya ke dalam array rank
                        $rank[$i] = $P[$i];
                      }

                      // Urutkan array rank untuk mendapatkan peringkat
                      arsort($rank);
                      $ranking = 1;
                      foreach ($rank as $index => $value) {
                        $rank[$index] = $ranking++;
                      }

                      // Sekarang isi kolom Rank dengan peringkat yang sesuai
                      foreach ($rank as $index => $ranking) {
                        echo "<tr class='center'>
              <td>" . (++$no) . "</td>
              <td>A{$index}</td>
              <td>{$P[$index]}</td>
              <td>{$ranking}</td> <!-- Kolom untuk menampilkan peringkat -->
            </tr>";
                      }
                    } else {
                      echo "<tr><td colspan='4'>Data tidak tersedia</td></tr>";
                    }
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
  <?php require "userlayout/js.php"; ?>
</body>

</html>