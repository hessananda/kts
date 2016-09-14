<?php
	$soalapa="program"; // menentukan tabel apa yang dipilih
	$menu_title = "Program Kemitraan"; // menentukan judul halaman ini

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
						$id = $_GET['id'];
						$satuan = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM ".$soalapa." WHERE id = '$id' ")); 
					?>
					
					<div class="the-box">
						<form id="eventform" method="post" action="<?php echo $soalapa ?>_action.php?action=edit&id=<?php echo $id ?>" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend>Edit <?php echo $menu_title ?></legend>
							<?php combobox_update('Penulis','penulis','SELECT * from author ', 'id', 'nama', 'SELECT author FROM '.$soalapa.' WHERE id = '.$id.' ', 'id', 'author') ?>
							<?php datebox_update("Tanggal Entry","entrytime","",$satuan['entrytime']) ?> 
                            <?php textbox_update('Judul','judul',$satuan['title']) ?>					
							<?php textarea_summernote_update('Content','content',$satuan['content']) ?>	
                            <?php file_gambar_update('../images/program/',$satuan['image'],'file','english') ?>				
                            <?php textbox_update('Tag','tag',$satuan['tag']) ?>

                               <?php textbox("Video Link","video_link",$satuan['video_link']) ?>

								   	<div class="form-group">
										<label class="col-lg-3 control-label">Thumbnail</label>
										<div class="col-lg-5">									
											<select name="thumbnail">												
												<option value="image" <?php echo $satuan['thumbnail']=='image'?'selected':'' ?> >Image</option>
												<option value="video" <?php echo $satuan['thumbnail']=='video'?'selected':'' ?> >Video</option>
											</select>
										</div>
									</div>
                            <?php combobox_update('Aktif ?','aktif','SELECT * from aktif WHERE id in(1,2) ', 'value', 'caption', 'SELECT aktif FROM '.$soalapa.' WHERE id = '.$id.' ', 'value', 'aktif') ?>
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