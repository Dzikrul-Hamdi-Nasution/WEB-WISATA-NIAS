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
                                        <th style="width:5%;">#</th>
                                        <th>Kategori</th>
										<th style="width:9%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
									javascript($m,'confirm');
									$no=0;
									$q=$con->query("SELECT* FROM kategori  ORDER BY idKategori DESC");
									while($r=$q->fetch_object()){
									$no++;
										echo "<tr>
											<td>$no</td>
											<td>$r->kategori</td>
											<td>
											<a href='".$site."$m/update/$r->idKategori'><i class='fa fa-edit fa-fw' title='Update kategori'></i></a>
											<a href='".$site."$m/delete/$r->idKategori'><i class='fa fa-times fa-fw' title='Delete kategori' onclick='return konfirmasi()'></i></a>
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
				   <div class="col-lg-5">
								<div class="panel panel-default">
								<div class="panel-body">
							   <form action="" method="POST" enctype="multipart/form-data">
								  <div class="form-group">
									<label>Kategori</label>
									<input type="text" name="kategori" class="form-control" required>
									
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
				$kategori=ucwords($_POST['kategori']);
				
				$q=$con->query("INSERT INTO kategori (kategori) VALUES
				('$kategori')");
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
$r=$con->query("SELECT * FROM kategori WHERE idKategori='$_GET[id]'")->fetch_object();?>
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-head-line"><?php echo strtoupper($a).' '.strtoupper($m);?></h1>
                    </div>
                </div>
                <div class="row">
				   <div class="col-lg-5">
								<div class="panel panel-default">
								<div class="panel-body">
							   <form action="" method="POST" enctype="multipart/form-data">
								  <div class="form-group">
									<label>Kategori</label>
									<input type="text" name="kategori" value="<?php echo $r->kategori;?>" class="form-control" reqiured>
									
								<input type="hidden" name="idKategori" value="<?php echo $r->idKategori;?>">
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
				$id=$_POST['idKategori'];
				$kategori=ucwords($_POST['kategori']);
				$r=$con->query("UPDATE kategori SET kategori='$kategori' WHERE idKategori='$id'");
				if($r===true){
					javascript($m,'redirect');
				}else{
					echo 'Gagal: '.$con->error;
				}
			}
			?>
			
<?php break; ?>

<?php case 'delete': ?>
<?php 

$r=$con->query("DELETE FROM kategori WHERE idKategori='$_GET[id]'");
if($r===false){
	echo 'Gagal: '.$con->error;
}else{
	javascript($m,'redirect');
}
?>
<?php break; ?>


<?php }	?>
    