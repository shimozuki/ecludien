<?php
function koneksi(){
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db   = "analisis1";

  $koneksi = mysqli_connect($host, $user, $pass, $db);

  if (!$koneksi) {
      die("amit mas koneksi ee gagal niki error e : ".mysqli_connect_error());
  }
  return $koneksi;
}

 ?>
