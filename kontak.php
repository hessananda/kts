<?php
require_once('config/koneksi.php');
require_once('config/potong_kata.php');

$query = mysqli_query($con,"SELECT * FROM profile WHERE profile_id = '1' ");
$profile = mysqli_fetch_assoc($query);
?>

<!DOCTYPE HTML>
<html>

<head>
<meta charset="utf-8">
<link rel="icon" href="images/logo/<?php echo $profile['profile_footer_logo'] ?>">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Kota Tanpa Sampah</title>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<script src="js/jquery.min.js"></script>
		<!---script---->
		<link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css" />
		<script src="js/jquery.bxslider.js"></script>
	
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
	</head>

	<body>
			<!---start-header-->
				<?php include("header.php"); ?>
			<!-- end header -->


		<!---start-contact---->
		<div class="contact">
			
				<div class="contact-info">
				
					 <div class="wrap">
					 <div class=" jarak_keatas">
						<nav>
						  <a href="#">Beranda</a> >						  
						  <span class="breadcrumb-item active">Formulir</span>
						</nav>
					</div>
					
			<h1 style="font-size:200%" class="jarak_keatas">Formulir</h1>	
					 	<form method="post" action="kontak_send.php" id="regform">
					          <div class="contact-form">
								<div class="contact-to">
			                     	<input name="nama_depan" title="Nama Depan (Harus Diisi)" type="text" class="text" value="Nama Depan (Harus Diisi)" onfocus="if(this.value == 'Nama Depan (Harus Diisi)'){this.value=''};" onblur="if (this.value == '') {this.value = 'Nama Depan (Harus Diisi)';}" maxlength="30" pattern="[a-zA-Z]{1,30}" required="">

								 	<input name="nama_belakang" type="text" title="Nama Belakang" class="text" value="Nama Belakang" onfocus="if(this.value == 'Nama Belakang'){this.value=''};"onblur="if (this.value == '') {this.value = 'Nama Belakang';}"  >

								</div>
								
								<div class="text2">
				                   <textarea name="alamat" value='' title="Alamat" onblur="if (this.value == '') {this.value = 'Alamat';}" onfocus="if (this.value == 'Alamat') {this.value = '';}" maxlength="300" >Alamat</textarea>
				                </div>

								<div class="contact-to">
			                     	<input name="kota" type="text" class="text" title="Kota" value="Kota" onfocus="if(this.value == 'Kota'){this.value=''};" onblur="if (this.value == '') {this.value = 'Kota';}" maxlength="70"  >

								 	<input name="provinsi" type="text" class="text" title="Provinsi" value="Provinsi" onfocus="if(this.value == 'Provinsi'){this.value=''};" onblur="if (this.value == '') {this.value = 'Provinsi';}" maxlength="100" >

								</div>
								<div class="clear"></div>
								<div class="contact-to">
			                     	<input name="telepon" type="text" class="text" title="Telepon (Harus Diisi)" onfocus="if(this.value == 'Telepon (Harus Diisi)'){this.value=''};" onblur="if (this.value == '') {this.value = 'Telepon (Harus Diisi)';}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder='6281234567891 (Harus Diisi)' maxlength="15" required="">

								 	<input name="email" type="text" class="text" title="Email (Harus Diisi)" value="Email (Harus Diisi)" onfocus="if(this.value == 'Email (Harus Diisi)'){this.value=''};"  onblur="if (this.value == '') {this.value = 'Email (Harus Diisi)';}" required="">
								</div>
								<div class="clear"></div>
								<div class="contact-to">
			                     	<input name="facebook" type="text" class="text" title="Facebook" value="Facebook" onfocus="if(this.value == 'Facebook'){this.value=''};"  onblur="if (this.value == '') {this.value = 'Facebook';}">

								 	<input name="twitter" type="text" class="text" title="Twitter" value="Twitter" onfocus="if(this.value == 'Twitter'){this.value=''};"  onblur="if (this.value == '') {this.value = 'Twitter';}">
								</div>
								
								<div class="text2">
				                   <textarea name="tentang_proyek" value='' title="Jelaskan tentang minat anda mengenai proyek ini" onblur="if (this.value == '') {this.value = 'Jelaskan tentang minat anda mengenai proyek ini';}" onfocus="if (this.value == 'Jelaskan tentang minat anda mengenai proyek ini') {this.value = '';}">Jelaskan tentang minat anda mengenai proyek ini</textarea>
				                </div>
				                <div class="clear"></div>
				                <div class="text2">
				                   <textarea name="informasi_tambahan" value='' title="Informasi Tambahan" onfocus="if(this.value == 'Informasi Tambahan'){this.value=''};" onblur="if (this.value == '') {this.value = 'Informasi Tambahan';}" 
				                   onload="if (this.value == 'a') {this.value = 'Informasi Tambahan';}">Informasi Tambahan</textarea>
				                </div>
				               <span><input type="submit" class="" value="Kirim"></span>
				                <div class="clear"></div>
				               </div>
				           </form>
				
							</div>
			</div>
		</div>
		<!----//End-contact---->
	<!--start-footer-->
			<?php include("footer.php"); ?>
		<!--//End-footer-->

	<script type="text/javascript">

			// var form = document.getElementById('regform'); // form has to have ID: <form id="formID">
			// form.noValidate = true;
			// form.addEventListener('submit', function(event) { // listen for form submitting
	  //       if (!event.target.checkValidity()) {
	  //           event.preventDefault(); // dismiss the default functionality
	  //           alert('Field Nama Depan, Kota, Provinsi, Nomor Telepon dan Email Harus Diisi'); // error message
			//         }
			//     }, false);

			
					</script>

	</body>

</html>

