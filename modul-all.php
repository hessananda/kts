<?php
require_once('config/potong_kata.php');
require_once('config/koneksi.php');
?>

<!DOCTYPE HTML>
<html>

<head>
<style type="text/css">
	.small{
		width:30px ;
	}
	
	.main_image{
		margin-bottom: 30px;
	}

	.background-white{
	  background: #fff;
	}

</style>
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

		<!-- <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
		<!---//calender-style---->

		<style type="text/css">
			.pad-ten{
				padding-left: 10px;
				padding-right: 10px;
			}
		</style>
	</head>

	<body>
		<!---start-header-->
			<?php include("header.php"); ?>
		<!-- end header -->
		<div class="wrap">
		<br/>		
			<div>
				<nav>
				  <a href="index.php">Beranda</a> >			  
				  <span class="breadcrumb-item active">Modul</span>
				</nav>
			</div>					
		<br/>
		
		<?php
// zebra pagination

      $records_per_page = 9;
      require 'config/Zebra_Pagination/Zebra_Pagination.php';
      $pagination = new Zebra_Pagination();

        $MySQL = "SELECT
                  SQL_CALC_FOUND_ROWS
                  *
                  FROM
                      modul
                  WHERE 
                      aktif = 1
                  ORDER BY id DESC
                  LIMIT ". (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page."";

        // if query could not be executed
        if (!($result = @mysqli_query($con,$MySQL))) {

            // stop execution and display error message
            die(mysqli_error());

        }
		        // fetch the total number of records in the table
		$rows = mysqli_fetch_assoc(mysqli_query($con,'SELECT FOUND_ROWS() AS rows'));
		// pass the total number of records to the pagination class
		$pagination->records($rows['rows']);
		// records per page
		$pagination->records_per_page($records_per_page);		        

		$no = 1;
        while ($modul = mysqli_fetch_assoc($result)) {        
        	?>
						<!-- start modul -->
						<div class="destination-places-grid" onclick="window.open('modul/<?php echo $modul['file'] ?>');">
							
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img style="max-height: 280px;"  src="images/modul/<?php echo $modul['image'] ?>"/>				
							</div>
							<br>
							<div class="dest-place-opt pad-ten spasi_title">								
								<p  style="font-size:130%;"><center><?php echo truncate($modul['title'],'35') ?></center></p>
									<br>										
							</div>
						</div>
					<!-- end modul -->	
					<?php
				}

				?>
					

					</div>
			</div>
				
<div class="clear"></div>
		
		<center>

		<?php
		// render the pagination links
			$pagination->render();
		?>

		</center>	





		<!--start-footer-->
			<?php include("footer.php"); ?>
		<!--//End-footer-->

		<!--//End-wrap-->
	</body>

</html>

