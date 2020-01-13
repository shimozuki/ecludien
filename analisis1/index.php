<?php require_once 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Menghitung jarak | robbi</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
  </div>
  <nav class="navbar navbar-light bg-success">
				<a class="navbar-brand" href="#"></a>
		<a class="text-light"><marquee width="500" height="40"><h2><b>GO-Jek Yukk</b></h2></marquee></a>
		<a class="navbar-brand" href="#"></a>
  </nav>
</div>
<body>

    <!-- Full Width Column -->
 	<div class="container" style="margin-top: 50px">
        <!-- Main content -->
		<div id="simpan"></div>

        <div class="col-md-12">
			<form class="form-horizontal" method="POST">
				<div class="form-group">
				  <label class="col-sm-4 control-label">Jarak & Radius :</label>
				  <div class="col-sm-4">
				    <select class="form-control select2" name="id_driver" required>
	                  <option value="" readonly >Pilih</option>
	                  <?php
	                    $koneksi = koneksi();
	                    $sql  = "select * from driver
	                    		 inner join jarak on driver.id_driver = jarak.id_driver
	                    		 group by driver.id_driver";
	                    $hasil = mysqli_query($koneksi, $sql);
	                    while ($isi = mysqli_fetch_array($hasil)) {
						  $jk = "pria";
						  if($isi["jk"] == "wanita"){
						    $jk = "wanita";
						  }
	                  ?>
	                  <option
	                  	value="<?=$isi['id_driver']?>">
	                  	<?php echo
	                  		$isi['kordinat'];
	                  	?>
	                  </option>
									<?php } ?>
	                </select>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-4 control-label">Jumlah driver :</label>
					<div class="form-group">
				  <div class="col-sm-4">
				    <select class="form-control select2" name="jumlah" required>
				      <option value="" readonly >Pilih</option>
				      <option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
				      		<option>9</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
				      		<option>13</option>
							<option>14</option>
				      		<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
				    </select>
				  </div>
				</div>
				<div class="col-sm-6" style="margin-top: 20px;margin-bottom: 30px">
					<button type="submit" id="cari" name="cari" class="btn btn-success">GOLEK</button>
				</div>
			</form>

			<!-- Munculkan hasil -->
	        <?php
	          if(isset($_POST["cari"])){
	            include_once('aksi.php');
	          }
	         ?>

		</div> <!-- /.col 7 -->
	</div> <!-- /.container -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
