<?php
// Sesuaikan dengan URL project kalian
define('BASE_URL', '/pw2023_223040124/tubespw/');

function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '', 'tubespw') or die('KONEKSI GAGAL!');
  return $conn;
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $kode = $data['kode'];
  $judul = $data['judul'];
  $jenis = $data['jenis'];
  $tahun = $data['tahun'];
  $gambar = $data['gambar'];

  $query = "INSERT INTO 
              tb_films 
            VALUES (null, '$kode', '$judul', '$jenis', '$tahun', '$gambar')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function dd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die;
}

function uriIS($uri)
{
  return ($_SERVER["REQUEST_URI"] === $uri) ? 'active' : '';
}