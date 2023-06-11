<?php
require('functions.php');

$title = 'Home';
if(isset($_GET['button-search'])) {

    $keyword = $_GET['keyword'];
    $films = query("SELECT * FROM tb_films WHERE
    judul LIKE '%$keyword%' OR
                      kode LIKE '%$keyword%' OR
                      jenis LIKE '%$keyword%' OR
                      tahun LIKE '%$keyword%'");
} else {
    $films = query("SELECT * FROM tb_films");
}


require('views/index.view.php');
