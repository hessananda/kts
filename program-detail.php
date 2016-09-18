<?php
require_once('config/potong_kata.php');
require_once('config/fungsi_tgl.php');
require_once('config/koneksi.php');
?>

<?php

		if (isset($_GET['id'])) {			
			$id = $_GET['id'];
		}

		$sql = "SELECT a.*,at.nama FROM program a INNER JOIN author at ON a.author = at.id  WHERE a.id = '$id'";
		$query = mysqli_query($con,$sql);
		$program = mysqli_fetch_assoc($query);

?>
<!DOCTYPE HTML>
<html>

<head>
<meta charset="utf-8">
<title><?php echo $program['title']; ?></title>
<meta property="og:url" content="http://kotatanpasampah.id?program-detail.php?id=<?php echo $id ?>">
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo $program['title']; ?>">
<meta property="og:description" content="<?php $content = strip_tags($program['content']); echo substr($content,0,144)."..." ;?>">
<meta property="og:image" content="http://www.kotatanpasampah.id/images/program/<?php echo $program['image'] ?>">
<meta property="og:title" content="<?php echo $program['title'] ?>" />

<meta name="title" content="<?php echo $program['title']; ?>" />
<meta name="description" content="<?php $content = strip_tags($program['content']); echo substr($content,0,144)."..." ;?>" />
<meta name="author" content="<?php echo $program['nama'] ?>" />
<meta property="article:publisher" content="https://www.facebook.com/kotatanpasampah/">
<meta property="article:author" content="<?php echo $program['nama'] ?>">
<meta property="article:section" content="Program Kemitraan">


<meta property="og:site_name" content="Kotatanpasampah.id" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@kotatanpasampah">
<meta name="twitter:title" content="<?php echo $program['title']; ?>">
<meta name="twitter:description" content="<?php $content = strip_tags($program['content']); echo substr($content,0,50)."..." ;?>">
<meta name="twitter:image:src" content="http://www.kotatanpasampah.id/images/program/<?php echo $program['image'] ?>">
<meta name="robots" content="index, follow" />

		
		<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
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
		
		<style type="text/css">
			.pad-content{
				padding-left: 14px;				
			}
		</style>
		<!---//calender-style---->
	</head>

	<body>
		<!---start-header-->
			<?php include("header.php"); ?>
		<!-- end header -->

		<div class="wrap">		
		<br>		
		<div>
			<nav>
			  <a href="index.php">Beranda</a> >
			  <a href="artikel-all.php">Program Kemitraan</a> >
			  <span class="breadcrumb-item active"><?php echo $program['title'] ?></span>
			</nav>
		</div>
				
		<h1 style="font-size:200%"><?php echo $program['title'] ?></h1>	
		
		<p><?php echo $program['nama'] ?> - <?php echo tgl_indo($program['entrytime']) ?></p>

		<br>
		 <p>bagikan melalui :	 
		          <a href="http://www.facebook.com/sharer.php?u=http://kotatanpasampah.id/program-detail.php?id=<?php echo $program['id'] ?>" class="btn waves-effect waves-light" style="background-color:#3b5998;" target="_blank"><i style="color:white;" class="fa fa-facebook" style="font-size: 15px;"></i></a>
		          <a href="https://plus.google.com/share?hl=en&url=http://kotatanpasampah.id/program-detail.php?id=<?php echo $program['id'] ?>" class="btn waves-effect waves-light" style="background-color:#dc4e41" target="_blank"><i style="color:white;" class="fa fa-google-plus" style="font-size: 15px;"></i></a>
		          <a href="https://twitter.com/home?status=<?php echo str_replace(" ","%20",$program['title']); ?>,%20%3A%20http://kotatanpasampah.id/program-detail.php?id=<?php echo $program['id'] ?>" class="btn waves-effect waves-light" style="background-color:#55acee" target="_blank"><i style="color:white;" class="fa fa-twitter" style="font-size: 15px;"></i></a>
		      </p>
		
		<br><br>	
		<div class="row pad-content">
			  <div class="main_image ex2">
				   <?php
			   if ($program['thumbnail']=='image') {
			   	?>
			   		<img src="images/program/<?php echo $program['image'] ?>">
			   	<?php
			   }
			   else{
			   	$video =  $news['video_link'];
			   	?>
			   		<iframe width="100%" height="473" frameborder="0" allowfullscreen src="<?php echo $video ?>"></iframe>
			   	<?php
			   }
				?>	
			  </div>	
			  <div align="justify" class="ex2 isi">
			  <font size="4">
				<?php echo $program['content'] ?>
			  </font>
			  </div>
			<br><br>
		</div>
		<div class="clear"></div>
			
<?php
	$sql = "SELECT * FROM news WHERE aktif = 1 AND tag LIKE '%$program[tag]%' ORDER BY id DESC LIMIT 0,3 ";
	$query = mysqli_query($con,$sql);
	
	if (mysqli_num_rows($query)>0) {

?>

		<p>Kabar Terkait :</p>
		<br><br>
		<div class="destination-places-grids">

<?php														
					$no =1 ;
					
					while($news = mysqli_fetch_assoc($query))
					{

?>
				<!-- start kabar agenda -->
						<div class="destination-places-grid <?php echo $no%3 == 0?'last-d-grid':'' ?>" onclick="location.href='news-detail.php?id=<?php  echo $news['id'] ?>';">
							
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img style="max-height: 280px;"  src="images/kabar_agenda/<?php  echo $news['image'] ?>" title="place-name" />					
							</div>
							<br>
							<div class="dest-place-opt">								
								<p  style="font-size:130%;"><center><?php echo truncate($news['title'],'35') ?></center></p>
							
								<br>
							</div>
						</div>
				<!-- end kabar agenda -->
<?php
				}
?>
	</div>
<?php		
	}
?>				
			
<div class="clear"></div>

		</div>



		<!--start-footer-->
			<?php include("footer.php"); ?>
		<!--//End-footer-->

		<!--//End-wrap-->
	</body>

</html>
