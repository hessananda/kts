<?php
require_once('config/potong_kata.php');
require_once('config/fungsi_tgl.php');
require_once('config/koneksi.php');

$query = mysqli_query($con,"SELECT * FROM profile WHERE profile_id = '1' ");
$profile = mysqli_fetch_assoc($query);
?>
<!DOCTYPE HTML>
<html>

<head>
<meta charset="utf-8">
		<title>Kota Tanpa Sampah</title>
	<link rel="icon" href="images/logo/<?php echo $profile['profile_footer_logo'] ?>">
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

	<div class="wrap">
		<div class="row">
			
			<div class="col-sm-9">
<?php
				$search = isset($_POST['search'])?$_POST['search']:'';
				$sql = "SELECT * FROM artikel WHERE aktif = 1 AND (tag LIKE '%$search%' OR title LIKE '%$search%')  ORDER BY id DESC";
				$query = mysqli_query($con,$sql);
				if (mysqli_num_rows($query)>0) 
				{
?>

				<h1 style="font-weight:bold;">Hasil Pencarian Artikel :</h1>
<?php				
					while($artikel = mysqli_fetch_assoc($query))
					{		
?>
					<br>
					<a href="artikel-detail.php?id=<?php  echo $artikel['id'] ?>"><?php echo $artikel['title'] ?></a>
<?php
					}
				}
				else
				{
					echo "<br><br>";
?>
		<h1 style="font-weight:bold;"><a href="artikel-all.php">Tidak ada Artikel terkait. Cari di halaman semua Artikel</a></h1>
<?php
				}
?>				
				

<hr>
<?php
	$sql = "SELECT * FROM news WHERE aktif = 1 AND (tag LIKE '%$search%' OR title LIKE '%$search%') ORDER BY id DESC ";
	$query = mysqli_query($con,$sql);
	if (mysqli_num_rows($query)>0) 
		{
?>			
			
			<h1 style="font-weight:bold;">Hasil Pencarian Berita & Agenda :</h1>
<?php				
					while($news = mysqli_fetch_assoc($query))
					{		
?>
					<br>
					<a href="news-detail.php?id=<?php  echo $news['id'] ?>"><?php echo $news['title'] ?></a>
<?php
					}
		echo "<br><br>";
		}
		else
		{
?>
		<h1 style="font-weight:bold;"><a href="news-all.php">Tidak ada Berita & Agenda terkait, Cari di halaman semua Berita & Agenda</a></h1>
<?php
		}
?>

				

			
<hr>		

<?php
	$sql = "SELECT * FROM program WHERE aktif = 1 AND (tag LIKE '%$search%' OR title LIKE '%$search%') ORDER BY id DESC ";
	$query = mysqli_query($con,$sql);
	if (mysqli_num_rows($query)>0) 
		{
?>			
			
			<h1 style="font-weight:bold;">Hasil Pencarian Program & Kemitraan :</h1>
<?php				
					while($program = mysqli_fetch_assoc($query))
					{		
?>
					<br>
					<a href="artikel-detail.php?id=<?php  echo $program['id'] ?>"><?php echo $program['title'] ?></a>
<?php
					}
		echo "<br><br>";
		}
				else
		{
?>
		<h1 style="font-weight:bold;"><a href="program.php">Tidak ada program & Kemitraan terkait, Cari di halaman semua Program</a></h1>
<?php
		}
?>	
			</div>

			<div class="col-sm-3"></div>
			
		</div>
	</div>
<br><br><br><br>

		</div>

		<!--start-footer-->
			<?php include("footer.php"); ?>
		<!--//End-footer-->

		<!--//End-wrap-->
	</body>

</html>

