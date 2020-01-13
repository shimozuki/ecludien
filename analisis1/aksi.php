<?php
    $driver = $_POST['id_driver'];
    $jumlah = $_POST['jumlah'];
    $koneksi  = koneksi();



    mysqli_query($koneksi,"CREATE TEMPORARY TABLE pencarian(
        Urutan int AUTO_INCREMENT primary key,
        Nama varchar(200),
        Radius int,
        Kordinat DECIMAL(10,2),
        Jarak DECIMAL(10,4),
        Status char(1));
    ");

    mysqli_query($koneksi,"CREATE TEMPORARY TABLE hasil(
        Nomor int AUTO_INCREMENT primary key,
        Nama varchar(200),
        Radius int,
        Kordinat DECIMAL(10,2),
        Jarak DECIMAL(10,4),
        Status int(1));
    ");

    // pengurutan data
    $no    = mysqli_query($koneksi,"SELECT max(no_urut) as max FROM jarak WHERE id_driver='$driver';");
    $nomax = mysqli_fetch_array($no);
    $max = $nomax['max'];

    // Data x1 y1
    $pencarian1  = mysqli_query($koneksi,"SELECT * FROM driver
                  INNER JOIN jarak ON driver.id_driver = jarak.id_driver
                  WHERE driver.id_driver='$driver' AND jarak.no_urut='$max'");
    $datax1  = mysqli_fetch_array($pencarian1);
    $jk   = $datax1['jk'];

    // Data x2 y2
    $pencarian2 = mysqli_query($koneksi,"SELECT * FROM driver
                INNER JOIN jarak ON driver.id_driver = jarak.id_driver
                WHERE driver.jenis_data='0' AND driver.jk='$jk';");

    while ($data = mysqli_fetch_array($pencarian2)) {
      // Variable x2 y2
      $radius   = $data['radius'];
      $kordinat  = $data['kordinat'];
     

      // Variabledata x1 y1
      $radius1 = $datax1['radius'];
      $kordinat1   = $datax1['kordinat'];

      // Hitung jarak mengunakan rumus euclidean
      $rumus = sqrt(pow(($radius1-$radius), 2) + pow(($kordinat1-$kordinat), 2));
      // Simpan hasil hitung jarak
      $x1 = sqrt(($radius1+$radius) /2);
      mysqli_query($koneksi,"INSERT INTO pencarian (Nama,Radius,Kordinat,Jarak,Status)
      VALUES ('".$data['nama']."','".$rumus."','".$rumus."',".$rumus.",'".$data['Status']."'); ");
    }

    // Urutkan jarak dari yang terdekat
    $urutan = mysqli_query($koneksi,"SELECT * FROM pencarian ORDER BY Jarak ASC LIMIT $jumlah;");
    while ($data = mysqli_fetch_array($urutan)) {
      // Simpan data pencarian
      mysqli_query($koneksi,"INSERT INTO hasil (Nama,Radius,Kordinat,Jarak,Status)
      VALUES ('".$data['Nama']."','".$data['Radius']."','".$data['Kordinat']."',".$data['Jarak'].",'".$data['Status']."'); ");
    }

?>
	  <!--table data driver -->

	  <h3 class="box-title">Hasil pencarian</h3>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class='thead-light'>
          <tr>
            <th style="width: 50px">No</th>
            <th>Nama Driver</th>
            <th>Nilai x</th>
            <th>Nilai y</th>
            <th>Jarak Driver</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no_urut = 0;
            $jarak = mysqli_query($koneksi,"SELECT * FROM hasil Where jarak > 0");
            while ($data = mysqli_fetch_array($jarak)) {
            $no_urut++; 
          ?>
            <tr>
              <td><?php echo"$no_urut"?></td>
              <td><?=$data["Nama"]?></td>
              <td><?=$data["Radius"]?></td>
              <td><?=$data["Kordinat"]?> </td>
              <td><?=$data["Jarak"]?>km</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
   </div> <!-- responsive -->
   <h3 class="box-title">Driver terdekat</h3>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class='thead-light'>
          <tr>
            <th>Nama Driver</th>
            <th>Kordinat</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
            // Mengambil kategori terbanyak
            $hugo = mysqli_query($koneksi,"SELECT * FROM hasil Where  jarak < '$x1' && jarak > 0 ");
            while ($jangan = mysqli_fetch_array($hugo)) {
          ?>
            <tr>
              <td><?=$jangan["Nama"]?></td>
              <td><?=$jangan["Jarak"]?>km</td>
              <td>
              <button type="Button" class="btn btn-success">Pilih</button>
              <button type="button" class="btn btn-danger">Hapus</button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
   </div> <!-- responsive -->