<?php
require_once('config/potong_kata.php');
require_once('config/koneksi.php');
?>

<!DOCTYPE HTML>
<html>

<head>
<meta charset="utf-8">
		<title>Kota Tanpa Sampah</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<script src="js/jquery.min.js"></script>
		<!---script---->
		<link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css" />
		<script src="js/jquery.bxslider.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$('.bxslider').bxSlider({
						 auto: true,
 						 autoControls: true,
						 minSlides: 10,
						 maxSlides: 10,
						 slideWidth:600,
						 slideMargin: 10
					});
				});
			</script>
		<!---//script---->
		<!---smoth-scrlling---->
			<script type="text/javascript">
				$(document).ready(function(){
									$('a[href^="#"]').on('click',function (e) {
									    e.preventDefault();
									    var target = this.hash,
									    $target = $(target);
									    $('html, body').stop().animate({
									        'scrollTop': $target.offset().top
									    }, 1000, 'swing', function () {
									        window.location.hash = target;
									    });
									});
								});
				</script>
		<!---//smoth-scrlling---->
		<!----start-top-nav-script---->
		<script type="text/javascript" src="js/flexy-menu.js"></script>
		<script type="text/javascript">$(document).ready(function(){$(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});});</script>
		<!----//End-top-nav-script---->
		<!---webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!---webfonts---->
		<!--start slider -->
	    <link rel="stylesheet" href="css/fwslider.css" media="all">
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
		<script src="js/fwslider.js"></script>
		<!--end slider -->
		<!---calender-style---->
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<!---//calender-style---->
		
		<style type="text/css">
			.pad-ten{
				padding-left: 11px;
				padding-right: 11px;
			}
		</style>


	</head>

	<body>
			<!---start-header-->
				<?php include("header.php"); ?>
			<!-- end header -->

		<?php
				$sql = "SELECT * FROM slider WHERE aktif = 1 ORDER BY id";
				$query = mysqli_query($con,$sql);

		?>

		<!----start-images-slider---->
		<div class="images-slider">
			<!-- start slider -->
		    <div id="fwslider">
		        <div class="slider_container">
					<?php 
						while ($slider = mysqli_fetch_assoc($query)) {
							?>
							<div class="slide"> 		                
		                    	<img src="images/slider/<?= $slider['image'] ?>" alt=""/>
		            		</div>
							<?php
						}
					?>
		            
		        </div>
		        <div class="timers"> </div>
		        <div class="slidePrev"><span> </span></div>
		        <div class="slideNext"><span> </span></div>
		    </div>
		    <!--/slider -->
		</div>
				
		<div class="clear"></div>
		<br>
		<!----start-menu---->
		<div class="wrap">			
			
			<div class="destination-places-grids">
				<!-- start kabar agenda -->
				<?php
				 	$bataskata = 25;
					$sql = "SELECT * FROM news WHERE aktif = 1 ORDER BY id DESC LIMIT 1";
					$query = mysqli_query($con,$sql);
					$news = mysqli_fetch_assoc($query);

				?>
						<div class="destination-places-grid " onclick="location.href='news-detail.php?id=<?php echo $news['id'] ?>';">
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li style="color:white;">| <a href="news-detail.php?id=<?php echo $news['id'] ?>" style="color:white;">Kabar & Agenda</a></li>									
									<div class="clear"> </div>
								</ul>
								<br>
							</div>
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img style="max-height: 280px;"  src="images/kabar_agenda/<?php echo $news['image'] ?>" title="<?php echo $news['title'] ?>" />					
							</div>
							<br>
							<div class="dest-place-opt pad-ten">								
								<p  style="font-size:130%;"><?php echo truncate($news['title'],$bataskata) ?></p>
									<br>		
								<p align="justify">									
									<?php 
										 $content = strip_tags($news['content']);								
										 echo substr($content,0,144)."..." ;
									?>
								</p>
								<br>
							</div>
						</div>
				<!-- end kabar agenda -->
				<?php
					$sql = "SELECT * FROM artikel WHERE aktif = 1 ORDER BY id DESC LIMIT 1";
					$query = mysqli_query($con,$sql);
					$artikel = mysqli_fetch_assoc($query);
				?>
				<!-- start artikel -->
						<div class="destination-places-grid" onclick="location.href='artikel-detail.php?id=<?php echo $artikel['id'] ?>';">
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li style="color:white;">| <a href="artikel-detail.php?id=<?php echo $artikel['id'] ?>" style="color:white;">Artikel</a></li>									
									<div class="clear"> </div>
								</ul>
								<br>
							</div>
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img style="max-height: 280px;" src="images/artikel/<?php echo $artikel['image'] ?>" title="<?php echo $artikel['title'] ?>" />
						
							</div>
							<br>
							<div class="dest-place-opt pad-ten">
								<p  style="font-size:130%;"><?php echo truncate($artikel['title'],$bataskata) ?></p>
									<br>								
								<p align="justify">
									
								<?php 
								$content = strip_tags($artikel['content']);								
								echo substr($content,0,144)."..." ;
								?>
								</p>
								<br>
							</div>
						</div>
			<!-- end artikel -->
			<?php
					$sql = "SELECT * FROM program WHERE aktif = 1 ORDER BY id DESC LIMIT 1";
					$query = mysqli_query($con,$sql);
					$program = mysqli_fetch_assoc($query);
				?>
			<!-- start kemitraan -->
						<div class="destination-places-grid last-d-grid" onclick="location.href='program.php';">
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li style="color:white;">| <a href="program.php" style="color:white;">Program Kemitraan</a></li>								
									<div class="clear"> </div>
								</ul>
								<br>
							</div>
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img style="max-height: 280px;" src="images/program/<?php echo $program['image'] ?>" title="<?php echo $program['title'] ?>" />								
							</div>
							<br>
							<div class="dest-place-opt pad-ten">								
								<p  style="font-size:130%;"><?php echo truncate($program['title'],$bataskata) ?></p>
									<br>			
									<p align="justify">
									
								<?php 
								$content = strip_tags($program['content']);								
								echo substr($content,0,144)."..." ;
								?>
								</p>
								<br>
							</div>
						</div>
					<!-- end kemitraan -->

					</div>

		</div>
		<!----//End-menu---->
		
		<div class="clear"></div>		

		<!----start-modul---->
		<div class="wrap">
			<div class="dest-place-opt-fea">
				<h3  style="color:white;">| <a  style="color:white;" href="keterlibatan.php">Bergabung</a></h3>
			</div>
		<?php 
			$query = mysqli_query($con,"SELECT * FROM keterlibatan WHERE id = '1' ");
			$keterlibatan = mysqli_fetch_assoc($query);
		?>
			<div class="criuse-grids">
				<div class="criuse-grid">
					<div class="criuse-grid-head">
						<div class="criuse-img">
							<div class="criuse-pic">
							 	   <a href="keterlibatan.php"><img src="images/keterlibatan/<?php echo $keterlibatan['image_home']  ?>" title="grafis keterlibatan" /></a>
							</div>						
						</div>			
					</div>
				
				</div>
			</div>
		</div>
		<!--//End-modul-->

		<!--start-footer-->
			<?php include("footer.php"); ?>
		<!--//End-footer-->

		<!--//End-wrap-->
	</body>

</html>