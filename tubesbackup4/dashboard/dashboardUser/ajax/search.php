<?php
require 'functions.php';

if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
  $students = query("SELECT * FROM tb_films WHERE 
                      kode LIKE '%$keyword%' OR
                      judul LIKE '%$keyword%' OR
                      jenis LIKE '%$keyword%' OR
                      tahun LIKE '%$keyword%'");
} else {
  $students = query("SELECT * FROM tb_films");
}
?>
<?php if ($students) :  ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Gambar</th>
        <th scope="col">Kode</th>
        <th scope="col">Judul</th>
        <th scope="col">Jenis</th>
        <th scope="col">Tahun</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($films as $film) : ?>
        <tr>
          <th scope="row"><?= $i++; ?></th>
          <td>
            <img src="img/<?= $film['gambar']; ?>" width="50">
          </td>
          <td><?= $film['kode']; ?></td>
          <td><?= $film['judul']; ?></td>
          <td><?= $film['jenis']; ?></td>
          <td><?= $film['tahun']; ?></td>
          <td>
            <a href="" class="badge text-bg-warning">ubah</a> |
            <a href="" class="badge text-bg-danger">hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else : ?>
  <div class="row">
    <div class="col-md-6">
      <div class="alert alert-danger" role="alert">
        Film(s) not found!
      </div>
    </div>
  </div>
<?php endif; ?>