<?php
	$soalapa="news"; // menentukan tabel apa yang dipilih
	$menu_title = "Kabar & Agenda"; // menentukan judul halaman ini

	$menu_detail_title = "Input $menu_title";

	include('config/koneksi.php');
	include('config/Html_library.php');
	include('config/form_maker.php');
	session_start();
	$html = new Html_library;
	$html->display_main("Input $menu_title");
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
					<h1 class="page-heading"><?php echo $menu_title ?> <small>Masukan Sebuah <?php echo $menu_title ?></small></h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li class="active"><?php echo $menu_detail_title ?></li>
					</ol>
					<!-- End breadcrumb -->

					<div class="the-box">
						<form id="eventform" method="post" action="<?php echo $soalapa ?>_action.php?action=input" class="form-horizontal" enctype="multipart/form-data" >

							<fieldset>
								<legend>Item Baru</legend>
								<?php combobox('Penulis','author','SELECT * from author WHERE aktif = 1 ORDER BY nama ', 'id','nama')?>
                                                                    <div class="form-group">
                                                            <label class="col-lg-3 control-label"></label>
                                                                    <div class="col-lg-5">        
                                                                      <div class="panel panel-primary">
                                                                        <div class="panel-heading">
                                                                              <h3 class="panel-title">
                                                                                      <a class="block-collapse" data-toggle="collapse" href="#panel-collapse-5">
                                                                                      Penulis Baru
                                                                                      <span class="right-content">
                                                                                              <span class="right-icon">
                                                                                                      <i class="glyphicon glyphicon-minus icon-collapse"></i>
                                                                                              </span>
                                                                                      </span>
                                                                                      </a>
                                                                              </h3>
                                                                        </div>
                                                                              <div id="panel-collapse-5" class="collapse">
                                                                                <div class="panel-body">
                                                                                      <?php textbox("Nama","nama","") ?>
                                                                                    <?php file_input("Foto","foto_penulis","masukan file gambar disini") ?>
                                                                                </div><!-- /.panel-body -->
                                                                                <div class="panel-footer"></div>
                                                                              </div><!-- /.collapse in -->
                                                                      </div><!-- /.panel panel-primary -->
                                                                     </div>
                                                       </div>
								<?php datebox("Tanggal Entry","entrytime","") ?> 
                                <?php textbox("Judul","judul","") ?>
                                <?php textarea_summernote("Content","content", "") ?>
								<?php file_input("Image","file","masukan file gambar disini") ?>    
								<?php textbox("Tag","tag","") ?>                 
									<?php textbox("Video Link","video_link","") ?>

								   	<div class="form-group">
										<label class="col-lg-3 control-label">Thumbnail</label>
										<div class="col-lg-5">									
											<select name="thumbnail">												
												<option value="image">Image</option>
												<option value="video">Video</option>
											</select>
										</div>
									</div>                                                    
                                <?php combobox('Aktif ?','aktif','SELECT * from aktif WHERE id in(1,2) ', 'value','caption')?>      

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