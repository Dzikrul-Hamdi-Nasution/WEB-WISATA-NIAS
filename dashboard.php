
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $aplikasi;?></title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo $site;?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="<?php echo $site;?>assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="<?php echo $site;?>assets/css/style.css" rel="stylesheet" />
	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo $site;?>assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.css">
	<!-- DataTables Responsive CSS -->
	<link href="<?php echo $site;?>assets/plugins/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="navbar-brand" href="<?php echo $site;?>"><?php echo $aplikasi;?>

                </a>
            </div>

            <div class="notifications-wrapper">
<ul class="nav">
               
                <li class="dropdown">
                    <a href="<?php echo $site;?>logout" ><i class="fa fa-sign-out fa-fw"></i>Logout
					</a>
                </li>
            </ul>
               
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
						<?php if (empty($_SESSION['foto'])){?>
                            <img src="<?php echo $site;?>assets/img/user.jpg" class="img-circle" />
						<?php }else{?>
							<img src="<?php echo $site;?>assets/file/foto/<?php echo $_SESSION['foto'];?> " class="img-circle" />
						<?php } ?>
						</div>

                    </li>
					<?php menu();?>
                  
                </ul>
            </div>

        </nav>
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
			<?php 
			modul($_GET['m']);
			?>			
			</div>
        <!-- /. PAGE WRAPPER  -->
    </div>
        </div>
    <!-- /. WRAPPER  -->
    <footer >
        &copy; <?php echo date('Y');?> <?php echo $aplikasi;?>
    </footer>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo $site;?>assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo $site;?>assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo $site;?>assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo $site;?>assets/js/custom.js"></script>
	<!-- DATA TABLE -->
	<script src="<?php echo $site;?>assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $site;?>assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	<!-- jQuery UI 1.10.3 search ajax -->
    <script src="<?php echo $site;?>assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <script>
	//datatable
    $(document).ready(function() {
				
        $('#t1,#t2,#t3,#t4,#t5').DataTable({
                responsive: true,
				stateSave: true // keep paging
        });
    });
	//menu
	$('ul li a').click(function(){ 
	$('li a').removeClass("active-menu"); 
	$(this).addClass("active-menu"); 
	});
	</script>
	
<?php if($_GET['m']=='hasil'){ ?>
	
	 <!-- jQuery 2.0.2 -->
        <script src="<?php echo $site;?>assets/js/jquery.min.js"></script>

         <!-- FLOT CHARTS -->
        <script src="<?php echo $site;?>assets/plugins/flot-chart/jquery.flot.min.js" type="text/javascript"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="<?php echo $site;?>assets/plugins/flot-chart/jquery.flot.resize.min.js" type="text/javascript"></script>
        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="<?php echo $site;?>assets/plugins/flot-chart/jquery.flot.pie.min.js" type="text/javascript"></script>
        <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
        <script src="<?php echo $site;?>assets/plugins/flot-chart/jquery.flot.categories.min.js" type="text/javascript"></script>
<!--penambahan-->
		<script src="<?php echo $site;?>assets/plugins/flot-chart/jquery.flot.time.js" type="text/javascript"></script>

		<script type="text/javascript">
            $(function() {
                 /* BAR CHART */				 
				//chart pemakaian___________________________
				
			   var bar_data_pemakaian = {
                    data: [
					["Sangat Tinggi (<?php echo $_SESSION['gsangattinggi'];?>)",<?php echo $_SESSION['gsangattinggi'];?>],
					["Tinggi (<?php echo $_SESSION['gtinggi'];?>)",<?php echo $_SESSION['gtinggi'];?>],
					["Sedang (<?php echo $_SESSION['gsedang'];?>)",<?php echo $_SESSION['gsedang'];?>],
					["Rendah (<?php echo $_SESSION['grendah'];?>)",<?php echo $_SESSION['grendah'];?>]	
					],
                    color: "#3c8dbc"
                };
                $.plot("#bar-pemakaian", [bar_data_pemakaian], {
                    grid: {
                        borderWidth: 1,
                        borderColor: "#f3f3f3",
                        tickColor: "#f3f3f3"
                    },
                    series: {
                        bars: {
                            show: true,
                            barWidth: 0.3,
                            align: "center"
                        }
                    },
                    xaxis: {
                        mode: "categories",
                        tickLength: 0
                    }
                });
                /* END BAR CHART */
				
				
			         
				
		 });


        </script>
		
<?php 
} ?>
	

</body>
</html>
