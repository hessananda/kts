<?php
require_once('config/potong_kata.php');
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

		<!-- <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
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
		<div class="wrap">
		<br/>		
			<div class="row">
				<nav>
				  <a href="index.php">Beranda</a> >			  
				  <span class="breadcrumb-item active">Program & Kemitraan</span>
				</nav>
			</div>					
		<br/>
				
				<?php
					$sql = "SELECT * FROM program WHERE aktif = 1 ORDER BY id DESC LIMIT 1";
					$query = mysqli_query($con,$sql);
					$program = mysqli_fetch_assoc($query);
				if (mysqli_num_rows($query)>0) {
				?>
						<div class="row">
							  <div class="main_image">
							<a href="program-detail.php?id=<?php echo $program['id'] ?>"><img src="images/program/<?php echo $program['image'] ?>"></a>
							  </div>	

							  <h1 style="font-size:200%"><?php echo $program['title'] ?></h1>
								<p align="justify">
								<?php 
										$content = strip_tags($program['content']);								
										echo substr($content,0,288)."..." ;
										?>
								</p>			
							
						</div>
				<?php	
				}
				else{
					?>
					<p>Tidak ada data</p>
					<?php
				}

				?>
				
		<br><br>	

	<div class="destination-places-grids">

<?php
					$sql = "SELECT * FROM program WHERE aktif = 1 ORDER BY id DESC LIMIT 1,3 ";
					$query = mysqli_query($con,$sql);
					
					$no =1 ;
					
					while($program = mysqli_fetch_assoc($query))
					{

?>
				<!-- start kabar agenda -->
						<div id="program" class="destination-places-grid <?php echo $no%3 == 0?'last-d-grid':'' ?>" onclick="location.href='program-detail.php?id=<?php  echo $program['id'] ?>';">
							
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img style="max-height: 280px;"  src="images/program/<?php  echo $program['image'] ?>" title="<?php echo $program['title'] ?>" />					
							</div>
							<br>
							<div class="dest-place-opt pad-ten">								
								<p  style="font-size:130%;"><?php echo truncate($program['title'],'40') ?></p>
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
				<!-- end kabar agenda -->
<?php
		$no++;
				}
?>				
			
					</div>					
			</div>
				
<div class="clear"></div>
		<br><br>
					<div>
					  <center><a id="btnload" class="btn btn-primary" onclick="hajar(3)">LOAD MORE</a></center>
				    </div>
				    <br><br>

		<!--start-footer-->
			<?php include("footer.php"); ?>
		<!--//End-footer-->

		<!--//End-wrap-->
<?php
 $halo = "SELECT * FROM program WHERE aktif = 1 ";
 $cek = mysqli_query($con,$halo);
 $count_all = mysqli_num_rows($cek);
?>

<script>
cicak = 0;
banteng= 0;
sapi = 0;

        // $(window).on('scroll', function(){
        //      if( $(window).scrollTop() > $(document).height() - $(window).height() - 2 ) {
        //             //call function hajar() , terus isi nilainya dengan 6 coy


                    
        //         }
        // }).scroll();

        var ins = 1;        

        function hajar(nina){            
            $('#btnload').text('LOADING...');

            ins = ins + nina ;  
            $.ajax({
                type: "POST",
                url: "load.php",
                data :{data: ins } ,
                success : loadMore
            });
        }

     

        function loadMore(data){            
                      
            $(data).insertAfter('div#program:last');
            if (banteng > 0) {
                $('#btnload').text('LOAD MORE');
            } else{
                $('#btnload').css("display", "none");
            }            
            
        }

	</script>
    <script>
    $(document).on('scroll', function (e) {
        $('.topbar').css('opacity', ($(document).scrollTop() / 500));
    });
    </script>

	</body>

</html>

