<?php include("config/koneksi.php");

$query = mysqli_query($con,"SELECT * FROM profile WHERE profile_id = '1' ");
$profile = mysqli_fetch_assoc($query);
 ?>
<!DOCTYPE HTML>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">


<head>
		<title>Kota Tanpa Sampah</title>
		<link rel="icon" href="images/logo/<?php echo $profile['profile_footer_logo'] ?>">
		<meta charset="utf-8">
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
	</head>

	<body>
		<!---start-header-->
			<?php include("header.php"); ?>
		<!-- end header -->
		<?php 
			$query = mysqli_query($con,"SELECT * FROM keterlibatan WHERE id = '1' ");
			$keterlibatan = mysqli_fetch_assoc($query);
		?>
		<div class="wrap">
		<br>
		<div class="ex2 pad-content">
		<font size="4">
		<?php echo $keterlibatan['text1']  ?>
		</font>
		<br>
		<img src="images/keterlibatan/<?php echo $keterlibatan['image1']  ?>">

		<br>
		<font size="4">
		<?php echo $keterlibatan['text2']  ?>
		</font>
		<br>
		<img src="images/keterlibatan/<?php echo $keterlibatan['image2']  ?>">

		<br>
		<div class="row spasi">
			<div class="col-sm-6">
			<font size="4">				
				<?php echo $keterlibatan['text3']  ?>
			</font>
			</div>
			<div class="col-sm-6">
				<img src="images/keterlibatan/<?php echo $keterlibatan['image3']  ?>">
			</div>
		</div>

		<div class="row spasi">
			<div class="col-sm-6">
			<font size="4">				
				<?php echo $keterlibatan['text4']  ?>
			</font>
			</div>
			<div class="col-sm-6">
				<img alt="Kota Tanpa Sampah" src="images/keterlibatan/<?php echo $keterlibatan['image4']  ?>">
			</div>
		</div>

		<center><font size="4">
			<a class="btn btn-lg btn-primary" href="kontak.php">Bergabung !</a>
			</font>
		</center>
		<br>
		<br>

		</div>	
		</div>



		<!--start-footer-->
			<?php include("footer.php"); ?>
		<!--//End-footer-->

		<!--//End-wrap-->
	</body>

</html>

