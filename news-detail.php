<?php
require_once('config/potong_kata.php');
require_once('config/fungsi_tgl.php');
require_once('config/koneksi.php');
?>

	<?php

		if (isset($_GET['id'])) {			
			$id = $_GET['id'];
		}

		$sql = "SELECT a.*,at.nama FROM news a INNER JOIN author at ON a.author = at.id  WHERE a.id = '$id'";
		$query = mysqli_query($con,$sql);
		$news = mysqli_fetch_assoc($query);

		?>
<!DOCTYPE HTML>
<html>

<head>
<title><?php echo $news['title'] ?></title>
<meta charset="utf-8">

<link rel="image_src" href="/images/kabar_agenda/<?php echo $news['image'] ?>"/>
<meta property="og:url" content="http://kotatanpasampah.id?news-detail.php?id=<?php echo $id ?>">
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo $news['title']; ?>">
<meta property="og:description" content="<?php $content = strip_tags($news['content']); echo substr($content,0,144)."..." ;?>">
<meta property="og:image" content="/images/kabar_agenda/<?php echo $news['image'] ?>">
<meta property="og:title" content="<?php echo $news['title'] ?>" />


<meta property="og:site_name" content="Kotatanpasampah.id" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@kotatanpasampah">
<meta name="twitter:title" content="<?php echo $news['title']; ?>">
<meta name="twitter:description" content="<?php $content = strip_tags($news['content']); echo substr($content,0,50)."..." ;?>">
<meta name="twitter:image:src" content="http://www.kotatanpasampah.id/images/kabar_agenda/<?php echo $news['image'] ?>">
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
			.pad-content{
				padding-left: 14px;				
			}
		</style>
	</head>

	<body>
	<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1731865247074658',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
		<!---start-header-->
			<?php include("header.php"); ?>
		<!-- end header -->

		<div class="wrap">		
		<br>		
		<div>
			<nav>
			  <a href="index.php">Beranda</a> > <a href="someurl.com/some-article" data-image="article-1.jpg" data-title="Article Title" data-desc="Some description for this article" class="btnShare">Share</a>

			  <a href="news-all.php">Kabar & Agenda</a> >
			  <span class="breadcrumb-item active"><?php echo $news['title'] ?></span>
			</nav>
		</div>
				<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
		<h1 style="font-size:200%"><?php echo $news['title'] ?></h1>	
		
		<p><?php echo $news['nama'] ?> - <?php echo tgl_indo($news['entrytime']) ?></p>

		<br>
		   <p>bagikan melalui :	 
		          <a id="btnShare"
					 data-image="<?php echo $news['image'] ?>" 
					 data-title="<?php echo $news['title'] ?>"
					 data-desc="Some description for this article"
		           href="http://www.facebook.com/sharer.php?u=http://kotatanpasampah.id/news-detail.php?%3Fid%3D<?php echo $news['id'] ?>" class="btn waves-effect waves-light" style="background-color:#3b5998;" ><i style="color:white;" class="fa fa-facebook" style="font-size: 15px;"></i></a>
		          <a href="https://plus.google.com/share?hl=en&url=http://kotatanpasampah.id/news-detail.php?id=<?php echo $news['id'] ?>" class="btn waves-effect waves-light" style="background-color:#dc4e41" target="_blank"><i style="color:white;" class="fa fa-google-plus" style="font-size: 15px;"></i></a>
		          <a href="https://twitter.com/home?status=<?php echo str_replace(" ","%20",$news['title']); ?>,%20%3A%20http://kotatanpasampah.idnews-detail.php?id=<?php echo $news['id'] ?>" class="btn waves-effect waves-light" style="background-color:#55acee" target="_blank"><i style="color:white;" class="fa fa-twitter" style="font-size: 15px;"></i></a>
		      </p>
		
		<br><br>	
		<div class="row pad-content">
			  <div class="main_image ex2">
				   <?php
			   if ($news['thumbnail']=='image') {
			   	?>
			   		<img src="images/kabar_agenda/<?php echo $news['image'] ?>">
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
				<?php echo $news['content'] ?>
			  </font>
			  </div>
			<br><br>
		</div>
		
	<div class="clear"></div>
				<hr>
		<div class="row">
			
			<div class="col-sm-3">
<?php
				$sql = "SELECT * FROM news WHERE aktif = 1 AND tag LIKE '%$news[tag]%' ORDER BY id DESC LIMIT 0,3 ";
				$query = mysqli_query($con,$sql);
				if (mysqli_num_rows($query)>0) 
				{
?>

				<h1 style="font-weight:bold;">Kabar & Agenda Lainnya :</h1>
<?php				
					while($news = mysqli_fetch_assoc($query))
					{		
?>
					<br>
					<a href="news-detail.php?id=<?php echo $news['id'] ?>"><?php echo $news['title'] ?></a>
<?php
					}
				}
echo "<br><br>";
?>				

				<h1 style="font-weight:bold;"><a href="news-all.php">Semua Kabar & Agenda</a></h1>
			</div>
			<div class="col-sm-1"></div>
<?php
	$sql = "SELECT * FROM program WHERE aktif = 1 AND tag LIKE '%$news[tag]%' ORDER BY id DESC LIMIT 0,3 ";
	$query = mysqli_query($con,$sql);
	if (mysqli_num_rows($query)>0) 
		{
?>			
			<div class="col-sm-3">
			<h1 style="font-weight:bold;">Program Kemitraan :</h1>
<?php				
					while($program = mysqli_fetch_assoc($query))
					{		
?>
					<br>
					<a href="program-detail.php?id=<?php  echo $program['id'] ?>"><?php echo $program['title'] ?></a>
<?php
					}
		echo "<br><br>";
		}
?>

				<h1 style="font-weight:bold;"><a href="program.php">Semua Program Kemitraan</a></h1>
			</div>
			<div class="col-sm-5"></div>
			
		</div>
<br><br><br><br>

		</div>



		<!--start-footer-->
			<?php include("footer.php"); ?>
		<!--//End-footer-->

		<!--//End-wrap-->
	</body>

</html>
