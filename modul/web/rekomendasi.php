<?php 
$m=$_GET['m'];
switch($m){
	default:
	if(isset($_POST['search'])){
			$wni=$_POST['wni'];
			$wna=$_POST['wna'];
			$budget=$_POST['budget'];
			$idKategori=implode("','",$_POST['idKategori']);
			$mulaiTour=$_POST['mulaiTour'];
			$akhirTour=$_POST['akhirTour'];
			
		 	$q=$con->query("SELECT * FROM wisata a,kategori b WHERE a.idKategori=b.idKategori AND a.idKategori IN ('$idKategori')   ORDER BY a.jamTutup ASC, a.popularitas DESC");
			if($q->num_rows<1){
				javascript('rekomendasi','alert','Maaf! Tidak ada rekomendasi wisata');
			}

			

			echo '
			<h2 class="text-center">HASIL REKOMENDASI<br/><small>Keyword Matching</small></h2><hr/>
								
			 <div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<h3>Paket Wisata </h3>
					</div>
					<div class="col-md-2"></div>
			
			</div>';
			$i=0;
			while($r=$q->fetch_object()){
				$hWni=$wni*$r->hargaWni;
				$hWna=$wna*$r->hargaWna;
				$total_orang =$wni+$wna;
				$total_orang=$total_orang/6;
				$jumlah_akomodasi=ceil($total_orang);

				$total_akomodasi = $r->akomodasi*$jumlah_akomodasi;
				$total[$i]=$hWni+$hWna+$total_akomodasi;
				$tes[$i]=$hWni+$hWna+$total_akomodasi;

				for($j=1;$j<=$r->popularitas;$j++){
					$po[$i][$j]= "<i class='glyphicon glyphicon-star'></i>";
				}
				$p[$i]=implode($po[$i]);
				$idtombol=explode(" ",$r->namaWisata);
				$key_tombol=end($idtombol);
				//$peta="https://goo.gl/maps/7eavotrvo8aVzFKX9";
				// /<button onclick='myFunction()'>See More</button>

				if ($total[$i]<$budget){
					
					
				
				echo "
		
					<div class='row'>
					<div class='col-md-2'></div>
					<div class='col-md-3'>
						<a href='#'>
			<img style='height:200px;' class='img-responsive' src='$r->file' alt=''>
						</a>
					</div>
					<div class='col-md-5'>
						<h3>$r->namaWisata</h3>
						<h4>$r->areaWisata</h4>
						<p>Jam buka: $r->jamBuka-$r->jamTutup</p>
						<p>$p[$i]</p>
						<a href='$r->peta'> Maps $r->kategori</a>
						<b class='btn btn-default' onclick='$key_tombol()'>More</b>
					</div>
				<div class='col-md-2'></div>
				</div>
				<!-- /.row -->
				
				<br/>


				<script language='javascript'>
				
				

				function $key_tombol() {
				
					
					var x = document.getElementById('$i');
					if (x.style.display == 'none') {
						x.style.display = 'block';
					} else {
						x.style.display = 'none';
					}
					
				  }
				
				</script>
			
				
			 <div class='row'>
					<div class='col-md-2'></div>
					
					<div id='$i' hidden class='col-md-8'>
						<table class='table  table-striped table-bordered'>
						<tr><td><b>Traveler<b></td><td>Jumlah:$wni orang</td></tr>
						<tr><td><b>Harga<b></td><td>$wni x ".number_format($r->hargaWni)." = Rp. ".number_format($hWni)." </td></tr>
					
						<tr><td><b>Tanggal<b></td><td>$mulaiTour s.d $akhirTour</td></tr>
						<tr><td><b>Jumlah Mobil<b></td><td>$jumlah_akomodasi x ".number_format($r->akomodasi)." = Rp. ".number_format($total_akomodasi)."</td></tr>
						<tr><td><b>Terdekat<b></td><td>$r->terdekat</td></tr>
						<tr><td><b>Restoran<b></td><td>$r->restoran</td></tr>
						<tr><td><b>Total Biaya<b></td><td>Rp.".number_format($total[$i])."</td></tr>
						</table>
						
						
					</div>
					<div class='col-md-2'></div>
					
			</div>"
			;
				}else{
					$total[$i]=$total[$i]-$total[$i];
						echo "
		
					<div class='row'>
					<div class='col-md-2'></div>
					<div class='col-md-3'>
						<a href='#'>
			<img style='height:200px;' class='img-responsive' src='$r->file' alt=''>
						</a>
					</div>
					<div class='col-md-5'>
						<h3>$r->namaWisata</h3>
						<h4>$r->areaWisata</h4>
						<p>Jam buka: $r->jamBuka-$r->jamTutup</p>
						<p>$p[$i]</p>
						<a href='$r->peta'> Maps $r->kategori</a>
						<b class='btn btn-default' >Tidak cukup</b>
					</div>
				<div class='col-md-2'></div>
				</div>
				<!-- /.row -->
				
				<br/>


				<script language='javascript'>
				
				

				function $key_tombol() {
				
					
					var x = document.getElementById('$i');
					if (x.style.display == 'none') {
						x.style.display = 'block';
					} else {
						x.style.display = 'none';
					}
					
				  }
				
				</script>
			
				
			 <div class='row'>
					<div class='col-md-2'></div>
					
					<div id='$i' hidden class='col-md-8'>
						<table class='table  table-striped table-bordered'>
						<tr><td><b>Traveler<b></td><td>Jumlah:$wni orang</td></tr>
						<tr><td><b>Harga WNI<b></td><td>$wni x ".number_format($r->hargaWni)." = Rp. ".number_format($hWni)." </td></tr>
				
						<tr><td><b>Tanggal<b></td><td>$mulaiTour s.d $akhirTour</td></tr>
						<tr><td><b>Jumlah Mobil<b></td><td>$jumlah_akomodasi x ".number_format($r->akomodasi)." = Rp. ".number_format($total_akomodasi)."</td></tr>
						<tr><td><b>Terdekat<b></td><td>$r->terdekat</td></tr>
						<tr><td><b>Restoran<b></td><td>$r->restoran</td></tr>
						<tr><td><b>Total Biaya<b></td><td>Rp.".number_format($total[$i])."</td></tr>
						</table>
						
						
					</div>
					<div class='col-md-2'></div>
					
			</div>"
			;
				}
			
			$i++;
			}
			echo "
			 <div class='row'>
					<div class='col-md-2'></div>
					<div class='col-md-8'>
						<table class='table  table-striped table-bordered'>
						
						<tr><td><b>Budget<b></td><td>Rp.".number_format($budget)."</td></tr>
						<tr><td colspan='2'><a href='".$site."rekomendasi' class='btn btn-primary'>Cari Lagi</a></td></tr>
						</table>
					</div>
					<div class='col-md-2'></div>
			
			</div>";
			
		}else{	
		
		echo '

			<div class="col-lg-12">
			<h2 class="text-center">REKOMENDASI WISATA<br/><small>Keyword Matching</small></h2><hr/>
								<!-- tabs pane-->
								<div class="tab-content">
			
	
    <link href="'.$site.'assets/web/search/css/main.css" rel="stylesheet" />
 
    <div class="s130">
      <form action="" method="POST"  style="width:50%;">
	  <table>
	  <tr>
	  <td style="width:18%;"><label>Jumlah Orang</label></td>
	  <td><input placeholder="wni" name="wni" type="number" class="form-control" value="0" required></td>
	   
	  </tr>
	 <td style="width:18%;"><label>Budget</label></td>
	 <td><input placeholder="Budget" name="budget" type="number" class="form-control" value="0" required></td>
	  <tr><td>
       <label>Kategori</label></td>
	   <td colspan="3">
			';
									$q=$con->query("SELECT * FROM kategori ORDER BY kategori ASC");
									while($r2=$q->fetch_object()){
										echo "<input name='idKategori[]' type='checkbox' value='$r2->idKategori'> $r2->kategori ";
									}
		echo '</td>
	</tr>
	 <tr>
	  <td><label>Tanggal Tour</label></td>
	  <td><input value="'.date('Y-m-d').'"  name="mulaiTour" type="date" class="form-control" required></td>
	   <td style="width:1%;"> - </td>
	  <td><input value="'.date('Y-m-d').'" name="akhirTour" type="date" class="form-control" required></td>
	  </tr>
	  <tr>
	  <td></td>
	  
	 
	   <td colspan="2"><br/><button type="submit" name="search" class="btn btn-primary">Cari</button></td>
	 
	  </tr>
	</table>
      </form>
    </div>
   

	
			</div> <!-- /panel -->';
		}

	
			
				
			
		break;
	
	
			
		
	
}

			
?>