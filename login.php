<?php
if(isset($_POST['submit'])){
	$u=$_POST['us'];
	$p=$_POST['pw'];
	$q=$con->query("SELECT * FROM user WHERE username='$u' AND password='$p'");
	if($q->num_rows > 0){
		$r = $q->fetch_assoc();
		$_SESSION['username']     = $r[username];
		$_SESSION['password']     = $r[password];
		$_SESSION['nama']  		= $r[nama];
		$_SESSION['telp']  		= $r[telp];
		$_SESSION['alamat']  		= $r[alamat];
		$_SESSION['level']  		= $r[level];
		$_SESSION['status']  		= $r[status];	
		$_SESSION['foto']  		= $r[foto];	
		$_SESSION['idUser']  		= $r[idUser];
		javascript('','redirect');
        //javascript('','alert','anda masuk');
	}else{
		javascript('login','alert','Username / Password Salah');
	}
}

?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $aplikasi;?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo $site;?>assets/login/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo $site;?>assets/login/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo $site;?>assets/login/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
     <style>
		.bg { 
	background-color:#424244;
	 background-image: url("<?php echo $site;?>assets/img/background.png");
    background-size: 100% auto;
    background-position: center;
    background-repeat: no-repeat;
	background-attachment: fixed;

		</style>
    </head>
    <body class="bg">

        <div class="form-box" id="login-box">
            <div class="header">LOGIN <br/> ADMINISTRATOR</div>
            <form action="" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text"  name="us" class="form-control" placeholder="Username" required/>
                    </div>
                    <div class="form-group">
                        <input type="password"  name="pw" class="form-control" placeholder="Password" required/>
                    </div> 
                </div>
                <div class="footer text-center">                                                               
                    <button type="submit" name='submit' class="btn btn-block">LOGIN</button> 
					</div>
            </form>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="<?php echo $site;?>assets/login/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo $site;?>assets/login/bootstrap.min.js" type="text/javascript"></script>        

    </body>
<!--</html>-->
