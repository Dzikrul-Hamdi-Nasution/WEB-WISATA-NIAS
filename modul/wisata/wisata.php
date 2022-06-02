<?php 
aut(array(1));
$a=$_GET['a'];
switch($a){
	default:
?>
	<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-head-line"><?php echo strtoupper($m);?>
						<span class="pull-right text-muted">
						<a href="<?php echo $site.$m;?>/tambah" class="btn btn-primary">Tambah</a></span>
						</h1>
                    </div>
                </div>
                <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="t1">
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="width:5%;">#</th>
										<th rowspan="2"  style="width:5%;">Foto</th>
                                        <th rowspan="2" >Kategori</th>
                                        <th rowspan="2" >Nama Tempat</th>
                                        <th rowspan="2" >Area</th>
                                        <th class="text-center" colspan="4">Harga</th>
                                        <th rowspan="2" >Jam Buka</th>
                                        <th rowspan="2" >Popularitas</th>
										<th rowspan="2" >Terdekat</th>
										<th rowspan="2" >Restoran</th>
										<th rowspan="2" >Penginapan</th>
										<th rowspan="2" >Akomodasi</th>
										<th rowspan="2" >Peta</th>
										<th rowspan="2" >Referal</th>
										<th rowspan="2" >Koresponden</th>
										<th rowspan="2" >Bintang</th>
										<th rowspan="2" >Deskripsi</th>
										<th rowspan="2"  style="width:5%;">Edit</th>
                                    </tr>
									 <tr>
                                        <th>WNI</th>
                                        <th>WNI Weekend</th>
                                        <th>WNA</th>
                                        <th>WNA Weekend</th>
                                    </tr>
                                </thead>
                                <tbody>
								
									<?php 
									javascript($m,'confirm');
									$no=0;
									$q=$con->query("SELECT * FROM wisata a, kategori b WHERE a.idKategori=b.idKategori  ORDER BY a.idWisata DESC");
									while($r=$q->fetch_object()){
									$no++;
											echo "<tr>
											<td>$no</td>
											<td align='center'>";
											if(!empty($r->file)){
												echo "<a href='$r->file' target='_blank'><i class='fa  fa-file fa-fw' title='wisata'></i></a>";
											}
											echo "</td>
											<td>$r->kategori</td>
											<td>$r->namaWisata</td>
											<td>$r->areaWisata</td>
											<td>".number_format($r->hargaWni)."</td>
											<td>".number_format($r->hargaWniWeek)."</td>
											<td>".number_format($r->hargaWna)."</td>
											<td>".number_format($r->hargaWnaWeek)."</td>
											<td>$r->jamBuka - $r->jamTutup</td>
											<td>";
											for($i=1;$i<=$r->popularitas;$i++){
												echo "<i class='fa  fa-star fa-fw'></i>";
											}
											echo "</td><td>$r->terdekat</td>";
											echo "</td><td>$r->restoran</td>";
											echo "</td><td>$r->penginapan</td>";
											echo "</td><td>$r->akomodasi</td>";
											echo "</td><td>$r->peta</td>";
											echo "</td><td>$r->referal</td>";
											echo "</td><td>$r->koresponden</td>";
											echo "</td><td>$r->bintang</td>";
											echo "</td><td>$r->deskripsi</td>";
											echo "</td>
											<td>
											<a href='".$site."$m/update/$r->idWisata'><i class='fa fa-edit fa-fw' title='Update'></i></a>
											<a href='".$site."$m/delete/$r->idWisata'><i class='fa fa-times fa-fw' title='Delete' onclick='return konfirmasi()'></i></a>
											</td>
										</tr>";
									}
									?>
                                </tbody>
                            </table>
                        </div>

                        </div>
              
             
            </div>
            <!-- /. PAGE INNER  -->
		
			
<?php break; ?>

<?php case 'tambah': ?>
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-head-line"><?php echo strtoupper($a).' '.strtoupper($m);?></h1>
                    </div>
                </div>
                <div class="row">
				   <div class="col-lg-12">
								<div class="panel panel-default">
								<div class="panel-body">
							   <form action="" method="POST" enctype= "multipart/form-data">
								  <div class="form-group">
								   <div class="col-lg-5">		  
									<label>Kategori</label>
									<select name="idKategori" class="form-control">
									<?php 
									$q=$con->query("SELECT * FROM kategori ORDER BY kategori ASC");
									while($r=$q->fetch_object()){
										echo "<option value='$r->idKategori'>$r->kategori</option>";
									}
									?>
									</select>
								   <label>Tempat Wisata</label>
									<input type="text" name="namaWisata" class="form-control" required>
									<label>Area Wilayah</label>
									<input type="text" name="areaWisata" class="form-control" required>
									<label>Wisata Terdekat</label>
									<input type="text" name="terdekat" class="form-control" required>
									<label>Akomodasi</label>
									<input type="text" name="akomodasi" class="form-control" required>
									<label>Restoran</label>
									<input type="text" name="restoran" class="form-control" required>
									<label>Peta</label>
									<input type="text" name="peta" class="form-control" required>
									
								

								<label>Jam Buka</label>
								<table class="table">
									<tr>
									<td>
									<select name="mJam" class="form-control">
									<?php 
									for($i=1;$i<=24;$i++){
										if($i<10){$i="0$i";}
										echo "<option value='$i'>$i</option>";
									}
									?>
									</select>
									</td>
									<td>
									<select name="mMenit" class="form-control">
									<?php 
									for($i=0;$i<=59;$i++){
										if($i==0){$i="00";}elseif($i<10){$i="0$i";}
										echo "<option value='$i'>$i</option>";
									}
									?>
									</select>
									</td>
									<td>-</td>
									<td>
									<select name="aJam" class="form-control">
									<?php 
									for($i=0;$i<=24;$i++){
										if($i==0){$i="00";}elseif($i<10){$i="0$i";}
										echo "<option value='$i'>$i</option>";
									}
									?>
									</select>
									</td>
									<td>
									<select name="aMenit" class="form-control">
									<?php 
									for($i=0;$i<=59;$i++){
										if($i==0){$i="00";}elseif($i<10){$i="0$i";}
										echo "<option value='$i'>$i</option>";
									}
									?>
									</select>
									</td>
									</tr>
									</table>
								<label>Foto</label>
									<input type="file" name="file" class="form-control">
								   </div>
								   
								     <div class="col-lg-5">
								   	<label>Harga WNI</label>
									<input type="number" name="hargaWni" class="form-control" required>
								<label>Harga WNI Weekend</label>
								<input type="number" name="hargaWniWeek" class="form-control" required>
								<label>Penginapan</label>
									<input type="text" name="penginapan" class="form-control" required>
								<label>Harga WNA</label>
									<input type="number" name="hargaWna" class="form-control" required>
								<label>Harga WNA Weekend</label>
									<input  type="number" name="hargaWnaWeek" class="form-control" required>
									<label>Kode Referal</label>
									<input type="number" name="referal" class="form-control" required>
								<label>Popularitas</label>
									<select name="popularitas" class="form-control">
										
									<?php 
									for($i=1;$i<=5;$i++){
										echo "<option value='$i'>$i</option>";
									}
									?>
									
									</select>
									<label>Deskripsi Wisata</label>
									<input value="<?php echo $r->deskripsi;?>" type="text" name="deskripsi" class="form-control" required>
								
								   </div>
							
									
									
								</div>
								</div>
								<div class="panel-footer">
								   <a href="<?php echo $site.$m;?>" class="btn btn-primary">Kembali</a>
								   <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
								</div>								
								</form>
								</div>
							</div>
              
             
            </div>
            <!-- /. PAGE INNER  -->
			
			<?php 
			#insert
			if(isset($_POST['submit'])){
				$idKategori=$_POST['idKategori'];
				$namaWisata=$_POST['namaWisata'];
				$areaWisata=$_POST['areaWisata'];
				$terdekat=$_POST['terdekat'];
				$deskripsi=$_POST['deskripsi'];
				$akomodasi=$_POST['akomodasi'];
				$restoran=$_POST['restoran'];
				$peta=$_POST['peta'];
				$hargaWni=$_POST['hargaWni'];
				$hargaWniWeek=$_POST['hargaWniWeek'];
				$hargaWna=$_POST['hargaWna'];
				$hargaWnaWeek=$_POST['hargaWnaWeek'];
				$mJam=$_POST['mJam'];
				$mMenit=$_POST['mMenit'];
				$aJam=$_POST['aJam'];
				$aMenit=$_POST['aMenit'];
				$jamBuka="$mJam:$mMenit";
				$jamTutup="$aJam:$aMenit";
				$popularitas=$_POST['popularitas'];
				$referal=$_POST['referal'];
				$penginapan=$_POST['penginapan'];
				$nFile=$_FILES['file']['name'];
				$sFile=$_FILES['file']['size'];
				$tFile=$_FILES['file']['tmp_name'];
				
				if(!empty($nFile)){
					$file="wisata-".str_replace(' ','-',$nomor)."-".str_replace(" ", "-",$nFile);
					$root=str_replace(array('http://localhost/','/'),'',$site);					
					$url = $_SERVER['DOCUMENT_ROOT']."/$root/assets/file/";
					$type=array('jpg','png','bmp','jpeg');
					$redirect=$m.'/wisata/tambah';
					upload($type,$file,$sFile,$tFile,$redirect,$url);
				}else{
					$file="";
				}
				
				
				$q=$con->query("INSERT INTO wisata (idKategori,namaWisata,areaWisata,hargaWni,
				hargaWniWeek,hargaWna,hargaWnaWeek,jamBuka,jamTutup,popularitas,file,terdekat,akomodasi,restoran,peta,referal,penginapan) 
				VALUES('$idKategori','$namaWisata','$areaWisata','$hargaWni','$hargaWniWeek',
				'$hargaWna','$hargaWnaWeek','$jamBuka','$jamTutup','$popularitas','$deskripsi','$file','$terdekat','$akomodasi','$restoran','$peta','$referal','$penginapan')");
				
				
				if($q===true){
					javascript($m,'redirect');
				}else{
					echo 'Gagal: '.$con->error;
				}
			}
			?>
			
<?php break; ?>












<?php case 'update': ?>
<?php 
$r=$con->query("SELECT * FROM wisata a, kategori b WHERE a.idKategori=b.idKategori AND idWisata='$_GET[id]'")->fetch_object();
									
?>
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-head-line"><?php echo strtoupper($a).' '.strtoupper($m);?></h1>
                    </div>
                </div>
                <div class="row">
				   <div class="col-lg-12">
								<div class="panel panel-default">
								<div class="panel-body">
							   <form action="" method="POST"enctype= "multipart/form-data">
								  <div class="form-group">
								   <div class="col-lg-5">		  
									<label>Kategori</label>
									<select name="idKategori" class="form-control">
									<?php 
									echo "<option value='$r->idKategori'>$r->kategori</option>";
									$q=$con->query("SELECT * FROM kategori ORDER BY kategori ASC");
									while($r2=$q->fetch_object()){
										echo "<option value='$r2->idKategori'>$r2->kategori</option>";
									}
									?>
									</select>
								   <label>Tempat Wisata</label>
									<input value="<?php echo $r->namaWisata;?>" type="text" name="namaWisata" class="form-control" required>
									<label>Area Wilayah</label>
									<input value="<?php echo $r->areaWisata;?>" type="text" name="areaWisata" class="form-control" required>
									<label>Wisata Terdekat</label>
									<input value="<?php echo $r->terdekat;?>" type="text" name="terdekat" class="form-control" required>
									<label>Akomodasi</label>
									<input value="<?php echo $r->akomodasi;?>" type="text" name="akomodasi" class="form-control" required>
									<label>Restoran</label>
									<input value="<?php echo $r->restoran;?>" type="text" name="restoran" class="form-control" required>
									<label>Peta</label>
									<input value="<?php echo $r->peta;?>" type="text" name="peta" class="form-control" required>
									<label>Kode Referal</label>
									<input value="<?php echo $r->referal;?>" type="number" name="referal" class="form-control" required>
									<label>Deskripsi Wisata</label>
									<input value="<?php echo $r->deskripsi;?>" type="text" name="deskripsi" class="form-control" required>
								
								   </div>
								   
								     <div class="col-lg-5">
								   	<label>Harga WNI</label>
									<input value="<?php echo $r->hargaWni;?>" type="number" name="hargaWni" class="form-control" required>
								<label>Harga WNI Weekend</label>
								<input value="<?php echo $r->hargaWniWeek;?>" type="number" name="hargaWniWeek" class="form-control" required>
								<label>Harga WNA</label>
									<input value="<?php echo $r->hargaWna;?>" type="number" name="hargaWna" class="form-control" required>
								<label>Harga WNA Weekend</label>
									<input value="<?php echo $r->hargaWnaWeek;?>"  type="number" name="hargaWnaWeek" class="form-control" required>
								<label>Popularitas</label>
									<select name="popularitas" class="form-control">
									<?php 
									echo "<option value='$r->popularitas'>$r->popularitas</option>";
									for($i=1;$i<=5;$i++){
										echo "<option value='$i'>$i</option>";
									}
									?>
									</select>
									<label>Penginapan</label>
									<input value="<?php echo $r->penginapan;?>" type="text" name="penginapan" class="form-control" required>
									<label>Jam  Buka</label>
									<table class="table">
									<tr>
									<td>
									<select name="mJam" class="form-control">
									<?php 
									$jamBuka=explode(':',$r->jamBuka);
									echo "<option value='$jamBuka[0]'>$jamBuka[0]</option>";
									for($i=1;$i<=24;$i++){
										if($i<10){$i="0$i";}
										echo "<option value='$i'>$i</option>";
									}
									?>
									</select>
									</td>
									<td>
									<select name="mMenit" class="form-control">
									<?php 
									echo "<option value='$jamBuka[1]'>$jamBuka[1]</option>";
									for($i=0;$i<=59;$i++){
										if($i==0){$i="00";}elseif($i<10){$i="0$i";}
										echo "<option value='$i'>$i</option>";
									}
									?>
									</select>
									</td>
									<td>-</td>
									<td>
									<select name="aJam" class="form-control">
									<?php 
									$jamTutup=explode(':',$r->jamTutup);
									echo "<option value='$jamTutup[0]'>$jamTutup[0]</option>";
									for($i=1;$i<=24;$i++){
										if($i<10){$i="0$i";}
										echo "<option value='$i'>$i</option>";
									}
									?>
									</select>
									</td>
									<td>
									<select name="aMenit" class="form-control">
									<?php 
									echo "<option value='$jamTutup[1]'>$jamTutup[1]</option>";
									for($i=0;$i<=59;$i++){
										if($i==0){$i="00";}elseif($i<10){$i="0$i";}
										echo "<option value='$i'>$i</option>";
									}
									?>
									</select>
									</td>
									</tr>
									</table>
									<label>Foto</label>
									<input type="file" name="file" class="form-control">
								<input value="<?php echo $r->idWisata;?>"  type="hidden" name="idWisata" class="form-control" required>
								
								   </div>
							</div>
								</div>
								<div class="panel-footer">
								   <a href="<?php echo $site.$m;?>" class="btn btn-primary">Kembali</a>
								   <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
								</div>
								</form>	
								
									</div>
							</div>
              
             
            </div>
            <!-- /. PAGE INNER  -->
			<?php 
			#insert
			if(isset($_POST['submit'])){
				$id=$_POST['idWisata'];
				$idKategori=$_POST['idKategori'];
				$referal=$_POST['referal'];
				$penginapan=$_POST['penginapan'];
				$deskripsi=$_POST['deskripsi'];
				$namaWisata=$_POST['namaWisata'];
				$areaWisata=$_POST['areaWisata'];
				$terdekat=$_POST['terdekat'];
				$akomodasi=$_POST['akomodasi'];
				$restoran=$_POST['restoran'];
				$peta=$_POST['peta'];
				$hargaWni=$_POST['hargaWni'];
				$hargaWniWeek=$_POST['hargaWniWeek'];
				$hargaWna=$_POST['hargaWna'];
				$hargaWnaWeek=$_POST['hargaWnaWeek'];
				$mJam=$_POST['mJam'];
				$mMenit=$_POST['mMenit'];
				$aJam=$_POST['aJam'];
				$aMenit=$_POST['aMenit'];
				$jamBuka="$mJam:$mMenit";
				$jamTutup="$aJam:$aMenit";
				$popularitas=$_POST['popularitas'];
				
				$nFile =  $_FILES['file']['name'];
				$sFile =  $_FILES['file']['size'];
				$tFile =  $_FILES['file']['tmp_name'];
				
				$r=$con->query("SELECT * FROM wisata WHERE idWisata='$id'")->fetch_object();
				if(!empty($nFile)){
					$root=str_replace(array('$site','/'),'',$site);	
					$linkFile=$_SERVER['DOCUMENT_ROOT']."/$root/assets/file/$r->file";
					unlink($linkFile);
					$file="wisata-".str_replace(' ','-',$nomor)."-".str_replace(" ", "-",$nFile);
					$url = "/$site/assets/file/";
					$type=array('jpg','png','bmp','jpeg');
					$redirect=$m.'/update/'.$id;
					upload($type,$file,$sFile,$tFile,$redirect,$url);
				}else{
					$file=$r->file;
				}
				
				
				$q=$con->query("UPDATE wisata SET idKategori='$idKategori',namaWisata='$namaWisata',areaWisata='$areaWisata',hargaWni='$hargaWni',hargaWniWeek='$hargaWniWeek',hargaWna='$hargaWna',
				hargaWnaWeek='$hargaWnaWeek',jamBuka='$jamBuka',jamTutup='$jamTutup',popularitas='$popularitas',terdekat='$terdekat',akomodasi='$akomodasi',restoran='$restoran',peta='$peta',
				file='$file',referal='$referal',penginapan='$penginapan',deskripsi='$deskripsi' WHERE idWisata='$id'");
				
				
				if($q===true){
					javascript($m,'redirect');
				}else{
					echo 'Gagal: '.$con->error;
				}
			}
			?>
			
<?php break; ?>



<?php case 'delete': ?>
<?php 
$r=$con->query("SELECT * FROM wisata WHERE idWisata='$_GET[id]'")->fetch_object();
//remove img 
$root=str_replace(array('http://localhost/','/'),'',$site);					
$linkFile=$_SERVER['DOCUMENT_ROOT']."/$root/assets/file/$r->file";
unlink($linkFile);	
$q=$con->query("DELETE FROM wisata WHERE idWisata='$_GET[id]'");
if($q===false){
	echo 'Gagal: '.$con->error;
}else{
	javascript($m,'redirect');
}
?>
<?php break; ?>

<?php }	?>
    