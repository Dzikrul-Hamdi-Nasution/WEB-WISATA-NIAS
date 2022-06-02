<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $aplikasi;?></title>	
    <meta name="description" content="">
	 <meta name="keyword" content="">
    <meta name="author" content="">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $site;?>assets/web/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo $site;?>assets/web/css/1-col-portfolio.css" rel="stylesheet">
	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo $site;?>assets/web/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.css">
    <!-- DataTables Responsive CSS -->
    <link href="<?php echo $site;?>assets/web/plugins/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?php echo $site;?>assets/web/plugins/morrisjs/morris.css" rel="stylesheet">
	<!--search-->

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top bg-custom-2x" role="navigation" >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $site;?>"><i class="glyphicon glyphicon-home"></i> HOME</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">			
					<?php menu();?>
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

   <div class="container">
		<?php modul($_GET['m'],$_GET['a']);?>
        <hr>
 <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright @ <?php echo $aplikasi;?></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
	 
	    <!-- jQuery -->
    <script src="<?php echo $site;?>assets/web/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $site;?>assets/web/js/bootstrap.min.js"></script>
	<script src="<?php echo $site;?>assets/web/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $site;?>assets/web/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	<!-- Morris Charts JavaScript -->	
    <script src="<?php echo $site;?>assets/web/plugins/raphael/raphael-min.js"></script>
    <script src="<?php echo $site;?>assets/web/plugins/morrisjs/morris.min.js"></script>	
	 <script>
    $(document).ready(function() {
        $('#t1','#t2').DataTable({
                responsive: true
        });
		$('[data-toggle="tooltip"]').tooltip(); 
    });	
		</script>
		
</body>
</html>
