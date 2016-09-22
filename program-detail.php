<?php
require_once('config/potong_kata.php');
require_once('config/fungsi_tgl.php');
require_once('config/koneksi.php');

$query = mysqli_query($con,"SELECT * FROM profile WHERE profile_id = '1' ");
$profile = mysqli_fetch_assoc($query);
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
<title><?php echo $program['title']; ?></title>
<link rel="icon" href="images/logo/<?php echo $profile['profile_footer_logo'] ?>">
<meta charset="utf-8">
<meta property="og:image" content="http://www.kotatanpasampah.id/images/program/<?php echo $program['image'] ?>">
<meta property="fb:app_id" content="1731865247074658">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $program['title']; ?>">
<link rel="image_src" href="/images/program/<?php echo $program['image'] ?>"/>
<meta property="og:url" content="http://kotatanpasampah.id/program-detail.php?id=<?php echo $id ?>">
<!-- <meta property="og:type" content="article"> -->
<meta property="og:description" content="<?php $content = strip_tags($program['content']); echo substr($content,0,144)."..." ;?>">

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
			  <a href="index.php">Beranda</a> >
			  <a href="program.php">Program & Kemitraan</a> >
			  <span class="breadcrumb-item active"><?php echo $program['title'] ?></span>
			</nav>
		</div>
				
		<h1 style="font-size:200%"><?php echo $program['title'] ?></h1>	
		
		<p><?php echo $program['nama'] ?> - <?php echo tgl_indo($program['entrytime']) ?></p>

		<br>
		 bagikan melalui :	 
		          <div class="btn fb-share-button" data-href="http://kotatanpasampah.id/program-detail.php?id=<?php echo $program['id'] ?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" style="background-color:#3b5998;" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fkotatanpasampah.id%2Fprogram-detail.php%3Fid%3D37&amp;src=sdkpreparse"><i style="color:white;" class="fa fa-facebook" style="font-size: 15px;"></i></a></div>

		          <a href="https://plus.google.com/share?hl=en&url=http://kotatanpasampah.id/program-detail.php?id=<?php echo $program['id'] ?>" class="btn waves-effect waves-light" style="background-color:#dc4e41" target="_blank"><i style="color:white;" class="fa fa-google-plus" style="font-size: 15px;"></i></a>
		          <a href="https://twitter.com/home?status=<?php echo str_replace(" ","%20",$program['title']); ?>,%20%3A%20http://kotatanpasampah.id/program-detail.php?id=<?php echo $program['id'] ?>" class="btn waves-effect waves-light" style="background-color:#55acee" target="_blank"><i style="color:white;" class="fa fa-twitter" style="font-size: 15px;"></i></a>
		      
		
		<br><br>	
		<div class="row pad-content">
			  <div class="main_image ex2">
				   <?php
			   if ($program['thumbnail']=='image') {
			   	?>
			   		<img alt="<?php echo $program['title'] ?>" src="images/program/<?php echo $program['image'] ?>">
			   	<?php
			   }
			   else{
			   	$video =  $program['video_link'];
			   	?>
			   	<div class="video-container">
			   		<iframe width="100%" height="473" frameborder="0" allowfullscreen src="<?php echo $video ?>"></iframe>
				</div>
					<img style="display:none;" alt="<?php echo $program['title'] ?>" src="images/program/<?php echo $program['image'] ?>">
			   		 
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

	<hr>
		<div class="row">
			
			<div class="col-sm-3">
<?php

if ($program['tag']<>'') {
	$replace = str_replace(' ', '',$program['tag']);
	$tag =  explode('#', $replace);

     $sql = "SELECT * FROM news WHERE aktif = 1 AND ( ";
     $i = 0;
     $len = count($tag);

	 foreach ($tag as $word) {

	 			if ($i == 0) {
	 				$sql .= '';
	 			}
	 			else if ($i == $len - 1) {
			        $sql .= " tag LIKE '%".$word."%' ";
			    }
			    else{
			    	
			    	$sql .= " tag LIKE '%".$word."%' OR ";
			    }
			    
			    $i++;		
				
			}

	 $sql .= ") AND id <> '$id' ORDER BY id DESC ";
						
				$query = mysqli_query($con,$sql);
				if (mysqli_num_rows($query)>0) 
				{
?>

				<h1 style="font-weight:bold;">Kabar & Agenda Terkait :</h1>
<?php				
					while($news = mysqli_fetch_assoc($query))
					{		
?>
					<br>
					<a href="news-detail.php?id=<?php echo $news['id'] ?>"><?php echo $news['title'] ?></a>
<?php
					}
					echo "<br><br>";
				}
}				

?>				

				<h1 style="font-weight:bold;"><a href="news-all.php">Semua Kabar & Agenda</a></h1>
			</div>

			<div class="col-sm-1"></div>
			<div class="col-sm-3">

<?php
if ($program['tag']<>'') {
	$replace = str_replace(' ', '',$program['tag']);
	$tag =  explode('#', $replace);

     $sql = "SELECT * FROM program WHERE aktif = 1 AND ( ";
     $i = 0;
     $len = count($tag);

	 foreach ($tag as $word) {

	 			if ($i == 0) {
	 				$sql .= '';
	 			}
	 			else if ($i == $len - 1) {
			        $sql .= " tag LIKE '%".$word."%' ";
			    }
			    else{
			    	
			    	$sql .= " tag LIKE '%".$word."%' OR ";
			    }
			    
			    $i++;		
				
			}

	 $sql .= ") AND id <> '$id' ORDER BY id DESC ";

	$query = mysqli_query($con,$sql);
	if (mysqli_num_rows($query)>0) 
		{
?>			
			
			<h1 style="font-weight:bold;">Program & Kemitraan Terkait :</h1>
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
}		
?>

				<h1 style="font-weight:bold;"><a href="program.php">Semua Program & Kemitraan</a></h1>

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
