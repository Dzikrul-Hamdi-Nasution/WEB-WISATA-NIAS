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
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Email</th>
										<th style="width:5%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
									javascript($m,'confirm');
									$no=0;
									$q=$con->query("SELECT* FROM user ORDER BY nama ASC");
									while($r=$q->fetch_object()){
									$no++;
										echo "<tr>
											<td>$no</td>
											<td>$r->nama</td>
											<td>$r->username</td>
											<td>$r->password</td>
											<td>$r->email</td>
											<td>
											<a href='".$site."$m/update/$r->idUser'><i class='fa fa-edit fa-fw' title='Update'></i></a>
											<a href='".$site."$m/delete/$r->idUser'><i class='fa fa-times fa-fw' title='Delete' onclick='return konfirmasi()'></i></a>
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
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" required>
									<label>Username</label>
									<input type="text" name="username" class="form-control" required>
								  <label>Password</label>
									<input type="text" name="password" class="form-control" required>
								 <label>Email</label>
									<input type="text" name="email" class="form-control" required>
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
				$nama=$_POST['nama'];
				$user=$_POST['username'];
				$pass=$_POST['password'];
				$email=$_POST['email'];
				
				$q=$con->query("INSERT INTO user (nama,username,password,email) VALUES('$nama','$user','$pass','$email')");
				if($q===true){
					javascript($m,'redirect');
				}else{
					echo 'Gagal: '.$con->error;
				}
			}
			?>
			
<?php break; ?>

<?php case 'update': ?>
<?php $r=$con->query("SELECT * FROM user WHERE idUser='$_GET[id]'")->fetch_object();?>
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
									<label>Nama</label>
									<input type="text" name="nama" value="<?php echo $r->nama;?>" class="form-control" reqiured>
									<label>Username</label>
									<input type="text" name="username" value="<?php echo $r->username;?>"  class="form-control" required>
								  <label>Password</label>
									<input type="text" name="password" value="<?php echo $r->password;?>"  class="form-control" required>
								  <label>Email</label>
									<input type="text" name="email" value="<?php echo $r->email;?>"  class="form-control" required>
								<input type="hidden" name="idUser" value="<?php echo $r->idUser;?>">
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
				$id=$_POST['idUser'];
				$nama=$_POST['nama'];
				$user=$_POST['username'];
				$pass=$_POST['password'];
				$email=$_POST['email'];
				
				$q=$con->query("UPDATE user SET nama='$nama', username='$user',password='$pass',email='$email' WHERE idUser='$id'");
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

$q=$con->query("DELETE FROM user WHERE idUser='$_GET[id]'");
if($q===false){
	echo 'Gagal: '.$con->error;
}else{
	javascript($m,'redirect');
}
?>
<?php break; ?>

<?php }	?>
    