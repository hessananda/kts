<?php 
require_once('config/koneksi.php');

$query = mysqli_query($con,"SELECT * FROM profile WHERE profile_id = '1' ");
$profile = mysqli_fetch_assoc($query);
?>
<div class="footer latarbelakang">
			<div class="wrap">
			<div class="footer-grids">
				<div class="footer-grid Newsletter" >
					<h4 style="color:white;font-size:130%;">Kota Tanpa Sampah </h3>
					<ul>
						<li><a style="color:white;" href="apa-itu-kts.php">Tentang</a></li>
						<li><a style="color:white;" href="keterlibatan.php">Cara Terlibat</a></li>
						<li><a style="color:white;" href="modul-all.php">Modul</a></li>						
					</ul>
					
				</div>
				<div class="footer-grid Newsletter">
					<h4 style="color:white;font-size:130%;">Terhubung Dengan Kami </h3>
					<ul>
						<?php if ($profile['profile_facebook']<>'') { ?>
						   <li><a style="color:white;" href="<?php echo $profile['profile_facebook'] ?>" target="_blank">Facebook</a></li>
						<?php }	?>

						<?php if ($profile['profile_twitter']<>'') { ?>
						   <li><a style="color:white;" href="<?php echo $profile['profile_twitter'] ?>" target="_blank">Twitter</a></li>
						<?php }	?>

						<?php if ($profile['profile_instagram']<>'') { ?>
						   <li><a style="color:white;" href="<?php echo $profile['profile_instagram'] ?>" target="_blank">Instagram</a></li>
						<?php }	?>

						<?php if ($profile['profile_youtube']<>'') { ?>
						   <li><a style="color:white;" href="<?php echo $profile['profile_youtube'] ?>" target="_blank">Youtube</a></li>
						<?php }	?>

						<li><a style="color:white;" href="kontak.php">Kontak Kami</a></li>
					</ul>
				</div>
				<div class="footer-grid tags">
						&nbsp;&nbsp;&nbsp;
				</div>
				<div class="footer-grid address">					
					<div class="footer-social-icons">
						<a href="index.php"><img id="forever" src="images/logo/<?php echo $profile['profile_footer_logo'] ?>" class="small_footer"></a>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
			</div>
		</div>
		<!--//End-footer-->
		<!--start-subfooter-->
		<div class="subfooter latarbelakang" style="padding:20px 20px 20px 20px">
			<div class="wrap">			
				<p style="padding:0px 0px 0px 0px" class="copy-right"><a href="http://labtanya.org/" target="_blank">LABTANYA &COPY; 2016</a></p>				
			</div>
		</div>

<!-- end subfooter -->

<style type="text/css">

	.small{
		width:30px ;
	}
	
	.main_image{
		margin-bottom: 30px;		
	}

	.jarak_keatas{
		margin-top: 30px;
	}

	.small_footer{
		width:180px ;
	}

	div.ex2 {
    max-width:830px;   
	}

	.spasi{
		margin-bottom: 30px;		
	}

	.spasi_title{
		margin-bottom: 15px;
	}

	.isi{
		/*font-size: 19px;*/
	}

	.latarbelakang{
		background-color:#1f2433 ;
	}
	
	a.inline {
    display:inline;
	}

	.smaller_footer{
		width:80px ;
	}

	.nanda{
		width:100px ;
	}
	
	.video-container {
    position: relative;
    padding-bottom: 56.25%;   
    padding-top: 0px; 
    height: 0; overflow: hidden;
	}
	 
	.video-container iframe,
	.video-container object,
	.video-container embed {
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	}

</style>

<script type="text/javascript">

  layar = window.screen.availWidth ;
  
  if(layar < 768){    
    document.getElementById("binggo").className = "smaller_footer";
    document.getElementById("forever").className = "smaller_footer";
    document.getElementById("live").style.height = "50px";
    document.getElementById("yeah").style.paddingLeft = "10px";
    document.getElementById("sah").className = "navbar navbar-default navbar-fixed-top headerten";
  }
  else{    
    document.getElementById("binggo").className = "small_footer";
    document.getElementById("forever").className = "small_footer";
    
  }
   

 </script>