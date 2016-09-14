<?php
	$soalapa="keterlibatan"; // menentukan tabel apa yang dipilih
	$menu_title = "Keterlibatan"; // menentukan judul halaman ini

	$menu_detail_title = "Edit $menu_title";

	session_start();
	include('config/koneksi.php');
	include('config/form_maker.php');
	include('config/Html_library.php');

	$html = new Html_library;
	$html->display_main($menu_detail_title);
?>
		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
		<div class="wrapper">
			<!-- BEGIN TOP NAV -->
                        <?php require_once 'top_nav.php'; ?>
			<!-- END TOP NAV -->
								
			<!-- BEGIN SIDEBAR LEFT -->
                        <?php include "sidebar_left.php" ?>
			<!-- END SIDEBAR LEFT -->
			
									
			<!-- BEGIN PAGE CONTENT -->
			<div class="page-content">
				
				
				<div class="container-fluid">
					<!-- Begin page heading -->
					<h1 class="page-heading"><?php echo $menu_title ?><small><?php echo $menu_detail_title ?></small></h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li class="active"><?php echo $menu_detail_title ?></li>
					</ol>
					<!-- End breadcrumb -->

					<?php
						$id = 1;
						$satuan = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM ".$soalapa." WHERE id = '$id' ")); 
					?>
					
					<div class="the-box">
						<form id="eventform" method="post" action="<?php echo $soalapa ?>_action.php?action=edit&id=<?php echo $id ?>" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend>Edit <?php echo $menu_title ?></legend>
									
								<?php textarea_summernote_update('Text 1 :','text1',$satuan['text1']) ?>

                                <hr>
				                    <h4>Image 1</h4>
								<hr>                                            
                            <?php file_gambar_update('../images/keterlibatan/',$satuan['image1'],'image1','english') ?>	
                            <hr>	

                            <?php textarea_summernote_update('Text 2 :','text2',$satuan['text2']) ?>

                                <hr>
				                    <h4>Image 2</h4>
								<hr>                                            
                            <?php file_gambar_update('../images/keterlibatan/',$satuan['image2'],'image2','english') ?>	
                            <hr>	

                            <?php textarea_summernote_update('Text 3 :','text3',$satuan['text3']) ?>

                                <hr>
				                    <h4>Image 3</h4>
								<hr>                                            
                            <?php file_gambar_update('../images/keterlibatan/',$satuan['image3'],'image3','english') ?>	
                            <hr>	
                            

                                <hr>
				                    <h4>Image Home</h4>
								<hr>                                            
                            <?php file_gambar_update('../images/keterlibatan/',$satuan['image_home'],'image_home','english') ?>	
                            <hr>	
							                           						
							</fieldset>

							<div class="form-group">
								<div class="col-lg-9 col-lg-offset-3">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div><!-- /.the-box -->
										
				</div><!-- /.container-fluid -->
				
                                <!-- BEGIN FOOTER -->
				<?php require_once 'footer.php'; ?>
				<!-- END FOOTER -->	
				
				
			</div><!-- /.page-content -->
		</div><!-- /.wrapper -->
		<!-- END PAGE CONTENT -->
		
		
		<!--
		===========================================================
		END PAGE
		===========================================================
		-->
<?php $html->destroy_main(); ?>