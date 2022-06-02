<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


ini_set('max_execution_time', 3600);
$site="http://localhost/wisata/";
$aplikasi="WISATA";

#koneksi
$con = new mysqli('','root','','wisata');
if($con->connect_error){
	die("Koneksi gagal: ".$con->connect_error);
}



#javascript
function javascript($m,$t,$pesan=''){//$t=redirect,alert,confirm
	global $site;
	if($t=='redirect'){
		echo "<script>window.location='".$site."$m';</script>";
	}elseif($t=='alert'){
		echo "<script>alert('$pesan');
				window.location='".$site."$m';</script>";
	}elseif($t=='confirm'){
		echo "			<script language='JavaScript'>
			function konfirmasi()
			{
			tanya = confirm('Anda Yakin Akan Menghapus Data ?');
			if (tanya == true) return true;
			else return false;
			}
			</script>";
	}
}

#autentikasi
function aut($level=array()){
	//aut(array(1,4));penggunaan
	global $site;
	if(!in_array($_SESSION[level],$level)){
		echo '<meta http-equiv="refresh" content="0; url='.$site.'" />';exit;
	}
}

#modul
function modul($m){
	global $con;
	global $site;
	$l=$_SESSION[level];
	if($l==1){//admin
		if(empty($m)){
			include "modul/home/home.php";
		}elseif($m=='logout'){
			session_start();
			session_destroy();
			javascript('','redirect');
		}else{
			return include "modul/$m/$m.php";
		}
	}else{//public
		if($m=='tentang'){
			include "modul/web/tentang.php";
		}elseif($m=='rekomendasi'){
			include "modul/web/rekomendasi.php";
		}else{
			include "modul/web/home.php";
		}
	}
}

function menu(){
	global $site;
	$l=$_SESSION[level];
	if(empty($l)){
		$l=0;
	}
	switch($l){
		case '0'://public
			echo '
			<li><a href="'.$site.'tentang"><i class="glyphicon glyphicon glyphicon-info-sign"></i> TENTANG</a></li>
			<li><a href="'.$site.'rekomendasi"><i class="glyphicon glyphicon glyphicon-record"></i> REKOMENDASI</a></li>
			<li><a href="'.$site.'login"><i class="glyphicon glyphicon-user"></i> LOGIN</a></li><li>';
        
			break;
	
		case '1'://admin
		echo  '<li><a class="active-menu"  href="'.$site.'"><i class="fa fa-dashboard "></i>Dashboard</a></li>
                    <li>
							<a href="#"><i class="fa fa-bars "></i>Data Master <span class="fa arrow"></span></a>
							 <ul class="nav nav-second-level">
					 <li><a href="'.$site.'user"><i class="fa fa-user "></i>User </a></li>
                    <li><a href="'.$site.'kategori"><i class="fa fa-th-list "></i>Kategori </a></li>
                    	 </ul>
						</li>
						<li><a href="'.$site.'wisata"><i class="fa   fa-picture-o"></i>Wisata </a></li>
					<li><a href="'.$site.'logout"><i class="fa fa-sign-out "></i>Logout</a></li>
					 ';
			break;
	
	}
}


function upload($type=array(),$nfile,$sfile,$tfile,$redirect,$url,$delete=0){
	global $site;
	if(isset($nfile)){
					$file_upload=1;
					$dir = $url;//kalau di cpanel coe di hapus
					$loc=$dir.$nfile;
					if ($sfile>10000000000){
						javascript($redirect,'alert','Ukuran harus < 250MB');
						$file_upload=0;
					}
					
					$ext = strtolower(pathinfo($nfile, PATHINFO_EXTENSION));
					$allowed = $type;
					if (!in_array( $ext, $allowed )){
						$file_upload=0;
						$type=implode(',',$type);
						javascript($redirect,'alert',strtoupper($type));
					}
					
					if (file_exists($loc)) {
						javascript($redirect,'alert','File sudah ada');
						$file_upload = 0;
					}
					
					if($file_upload==1){
						move_uploaded_file($tfile, $loc);
						
					}else{
						javascript($redirect,'alert','Upload gagal');
					}
	}else{
		javascript($redirect,'alert','File tidak ada');
	}
}



?>