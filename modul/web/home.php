<?php 
$m=$_GET['m'];
switch($m){
	default:
	
		echo '

			
        <!-- Page Heading -->
        <div class="row">
		<div class="col-md-2"></div>
            <div class="col-lg-8">
                <h1 class="page-header">Wisata
                    <small></small>
                </h1>
            </div>
		<div class="col-md-2"></div>
        </div>
        <!-- /.row -->

       ';$i=0 ;
		$q=$con->query("SELECT * FROM wisata a, kategori b WHERE a.idKategori=b.idKategori ORDER BY a.idWisata DESC");
		while($r=$q->fetch_object()){ $idtombol=strtok($r->namaWisata, " ");?>
		
			<div class="row">
			<div class="col-md-2"></div>
            <div class="col-md-3">
                <a href="#">
                    <img style="height:200px;" class="img-responsive" src="<?php echo $r->file;?>" alt="">
                </a>
            </div>
            <div class="col-md-5">
            <?php $idtombol2=explode(" ",$r->namaWisata);
				$key_tombol=end($idtombol2);?>
                
                <h3><?php echo $r->namaWisata;?></h3>
                <h4><?php echo $r->areaWisata;?></h4>
                <p>Jam buka: <?php echo $r->jamBuka.'-'.$r->jamTutup;?></p>
                
                <b class="btn btn-default"><?php echo $r->kategori;?></b>
                <b class="btn btn-default" data-toggle="modal" data-target="#<?php echo $key_tombol;?>">Rating Now</b>
                <b class='btn btn-default' onclick="<?php echo $key_tombol ;?>()">More</b>
                <div id='<?php echo $i;?>' hidden class='col-md-8'>
						<table class='table  table-striped table-bordered'>
						<tr><td><b><?php echo $r->deskripsi;?><b></td></tr>	
						</table>
						
						
					</div>
            </div>
		<div class="col-md-2"></div>


       

            <script language='javascript'>
				function <?php echo $key_tombol;?>() {
                  //  alert(<?php echo $i;?>);
					var x = document.getElementById('<?php echo $i;?>');
					if (x.style.display == 'none') {
						x.style.display = 'block';
					} else {
						x.style.display = 'none';
					}
					
				  }				
				</script>


        
        <div id="<?php echo $key_tombol;?>" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Kode Referal Wisata <?php echo $r->namaWisata;?> </h4>
          </div>
          <div class="modal-body">
            <form>
            
        <div class="form-group">
          <label for="exampleInputEmail1">Rating ( 1 - 5 )</label>
          <input type="number" class="form-control" name="rat<?php echo $key_tombol;?>" id="rating<?php echo $key_tombol;?>" placeholder="Rating">
        </div>
        </div> 
      </form>
          </div>
          <div class="modal-footer">
          <button type="submit" name='kirim' onclick="rate<?php echo $key_tombol;?>()"  class="btn btn-success" data-dismiss="modal">Rate Now</button>
          </div>
        </div>
      </div>
    

      

      <?php $i++;;?>

		
		</div>
        <!-- /.row -->
		<br/>

        
        <script language='javascript'>
				
				function rate<?php echo $key_tombol;?>() {
					hasil_rating = document.getElementById("rating<?php echo $key_tombol;?>").value;
                   
                

                        <?php


                            $param = isset($_GET['param']) ? $_GET['param'] : null;
                            if($param == null){
                            ?>

                            window.location.href = "?param=" + encodeURI(hasil_rating)+","+encodeURI(<?php echo $r->idWisata;?>)+","+encodeURI(<?php echo $r->koresponden;?>)+","+(<?php echo $r->bintang;?>);

                        <?php
                        } else {
                        //echo $param;
                        //$param=$_POST['param'];
                        $parsing=explode(",",$param);
                        $total_koresponden=$parsing[2]+1;
                        $total_bintang = $parsing[3]+$parsing[0];

                        $perhitungan=$total_bintang/$total_koresponden;
                        $perhitungan2=floor($perhitungan);

                        
                        $con->query("UPDATE wisata SET popularitas='$perhitungan2',koresponden='$total_koresponden',bintang='$total_bintang' WHERE idWisata='$parsing[1]'");
                        }

                        ?>
                                        

                        
                               
                    alert("Terima Kasih Atas Feedback Anda");
                
					//alert("<?php echo $r->referal;?>");
					
				  }
				</script>

		<?php } 
		
        echo '

        <hr>



        <!-- Pagination --><!--
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">«</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">»</a>
                    </li>
                </ul>
            </div>-->
			
			';
			
			
		break;
	
		
	
}
?>