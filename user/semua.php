<?php
    include '../admin/koneksi.php';
    include "../layout/fitur-header.php";
    
    if(isset($_GET['cari'])){
      $cari = $_GET['cari'];
      $sql = "SELECT * FROM artikel WHERE status = '1' AND judul like '%$cari%' ORDER BY tanggal DESC, id_artikel DESC";
    } else {
      $sql = "SELECT * FROM artikel WHERE status = '1' ORDER BY tanggal DESC, id_artikel DESC";
    }
    $query = mysqli_query($koneksi,$sql);
    $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');


    $jumlahDataHalaman = 5;
    $totalData = mysqli_num_rows($query);
    $jumlahHalaman = ceil($totalData/$jumlahDataHalaman);

    $halamanAktif = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

    $awalData = ($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;

    $sql.=" LIMIT $awalData, $jumlahDataHalaman";
    $query = mysqli_query($koneksi,$sql);

?>
<title>Ruang Publik Terpadu Ramah Anak Maya Asri 13 - Artikel</title>
<section class="artikel">
  <div class="container">
    <div class="judul-artikel">
      <h1><?php if(isset($cari)) echo "Hasil Cari Artikel $cari"; else echo 'Semua Artikel'; ?></h1>
    </div>
    <div class="highlight-artikel mt-3">
      <?php while($data = mysqli_fetch_array($query)):?>
      <div class="artikel-card">
        <div class="row">
          <div class="col-lg-3">
            <div class="img-artikel flex-center" style="height: 100%">
              <a href="artikelDetail.php?id=<?= $data['id_artikel'] ?>"><img src="img/<?= $data['gambar'] ?>"
                  alt=""></a>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="flex-center" style="justify-content: unset">
              <div class="isi-artikel-luar">
                <!-- <a href="artikelDetail.html"> -->
                <h2><a href="artikelDetail.php?id=<?= $data['id_artikel'] ?>"><?= $data['judul'] ?></a></h2>
                <!-- </a> -->
                <p class="tanggal-artikel"><em>Dibuat pada tanggal : <?= (int)date('d', strtotime($data['tanggal'])) ?>
                    <?= $month[((int)date('m', strtotime($data['tanggal']))) - 1] ?>
                    <?= (int)date('Y', strtotime($data['tanggal'])) ?></em></p>
                <p>
                  <?php
                      $str = strip_tags($data['isi']);
                      if(strlen($str) > 250){
                          echo substr($str, 0, 250);
                          echo "...";
                      } else {
                          echo $str;
                      }
                    ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
      <nav aria-label="Page navigation" class="d-flex justify-content-end">
        <ul class="pagination">
          <!-- ngak ada cari -->
          <?php if(!isset($_GET['cari'])): ?>
          <li class="page-item <?=  $halamanAktif == 1 ? 'disabled' : '' ?>"><a class="page-link"
              href="?halaman=<?= $halamanAktif - 1 ?>">Sebelum</a></li>
          <?php for($i=1; $i<=$jumlahHalaman; $i++): ?>
          <?php  if($halamanAktif == $i): ?>
          <li class="page-item active"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
          <?php else: ?>
          <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
          <?php  endif; ?>
          <?php endfor; ?>
          <li class="page-item <?=  $halamanAktif==$jumlahHalaman ? 'disabled' : '' ?>"><a class="page-link"
              href="?halaman=<?= $halamanAktif + 1 ?>">Berikut</a></li>
          <!-- kalau ada cari -->
          <?php else: ?>
          <li class="page-item <?=  $halamanAktif == 1 ? 'disabled' : '' ?>"><a class="page-link"
              href="?halaman=<?= $halamanAktif - 1 ?>&cari=<?= $cari ?>">Sebelum</a></li>
          <?php for($i=1; $i<=$jumlahHalaman; $i++): ?>
          <?php  if($halamanAktif == $i): ?>
          <li class="page-item active"><a class="page-link" href="?halaman=<?= $i ?>&cari=<?= $cari ?>"><?= $i ?></a>
          </li>
          <?php else: ?>
          <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>&cari=<?= $cari ?>"><?= $i ?></a></li>
          <?php  endif; ?>
          <?php endfor; ?>
          <li class="page-item <?=  $halamanAktif==$jumlahHalaman ? 'disabled' : '' ?>"><a class="page-link"
              href="?halaman=<?= $halamanAktif + 1 ?>&cari=<?= $cari ?>">Berikut</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
    <?php if(isset($cari)){ ?>
              <div class="judul-artikel mt-5">
                  <h1><?php echo "Hasil Cari Kegiatan $cari" ?></h1>
              </div>
              <div class="row">
              <?php 
                  $sqlkegiatanFoto = "SELECT * FROM gambar WHERE status = '1' AND judul LIKE '%$cari%' ORDER BY tanggal DESC, id_gambar DESC";
                  $querykegiatanFoto = mysqli_query($koneksi,$sqlkegiatanFoto);
                ?>
                <?php while($dataKegiatanFoto = mysqli_fetch_array($querykegiatanFoto)):?>
                      <!--== Single Team Item ==-->
                <div class="col-lg-3 col-md-6">
                  <br>
                  <div class="single-team-vid">
                    <div class="team-img-vid">
                      <a href="../kegiatan/img/<?= $dataKegiatanFoto['gambar'] ?>"><img src="../kegiatan/img/<?= $dataKegiatanFoto['gambar'] ?>" alt=""></a>
                    </div>
                    <div class="team-content-vid">
                      <div class="team-judul-vid">
                        <h3><?php if(strlen($dataKegiatanFoto['judul']) > 25){ echo substr($dataKegiatanFoto['judul'], 0, 25); echo ' ...';} else echo $dataKegiatanFoto['judul']; ?></h3>
                      </div>
                      <div class="team-isi-vid">
                        <p><?php if(strlen($dataKegiatanFoto['isi']) > 35){ echo substr($dataKegiatanFoto['isi'], 0, 25); echo ' ...';} else echo $dataKegiatanFoto['isi']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>
                <?php 
                  $sqlkegiatanVideo = "SELECT * FROM video WHERE status = '1' AND judul LIKE '%$cari%' ORDER BY tanggal DESC, id_video DESC";
                  $querykegiatanVideo = mysqli_query($koneksi,$sqlkegiatanVideo);
                ?>
                <?php while($dataKegiatanVideo = mysqli_fetch_array($querykegiatanVideo)):?>
                      <!--== Single Team Item ==-->
                <div class="col-lg-3 col-md-6">
                  <br>
                  <div class="single-team-vid">
                    <div class="team-img-vid">
                      <iframe width="100%" src="https://www.youtube.com/embed/<?php echo $dataKegiatanVideo['video'];?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="team-content-vid">
                      <div class="team-judul-vid">
                        <h3><?php if(strlen($dataKegiatanVideo['judul']) > 25){ echo substr($dataKegiatanVideo['judul'], 0, 25); echo ' ...';} else echo $dataKegiatanVideo['judul']; ?></h3>
                      </div>
                      <div class="team-isi-vid">
                        <p><?php if(strlen($dataKegiatanVideo['isi']) > 35){ echo substr($dataKegiatanVideo['isi'], 0, 25); echo ' ...';} else echo $dataKegiatanVideo['isi']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>
              </div>
            <?php } ?>
        </div>
      </section>
      
<?php 
  include "../layout/fitur-footer.php";
?>

<script>
  $('.team-img-vid img').height($('.team-img-vid').height());
</script>