<?php 
	
	$soalapa="modul"; // menentukan tabel apa yang dipilih
	$menu_title = "Modul"; // menentukan judul halaman ini

	$menu_detail_title = "Daftar $menu_title";

	session_start();
	include('config/koneksi.php');
	include('config/Html_library.php');
        require_once '../config/potong_kata.php';


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
					<h1 class="page-heading"><?php echo $menu_title ?></h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
                                                <li><a href="slider_view.php"><?php echo $menu_title ?></a></li>
						<li class="active"><?php echo $menu_detail_title ?></li>
					</ol>
					<!-- End breadcrumb -->
					
					<!-- BEGIN DATA TABLE -->
					<div class="the-box">
						<div class="table-responsive">
						<table class="table table-striped table-hover" id="datatable-example">
							<thead class="the-box dark full">
								<tr>
									<th>No</th>									
									<th>Title</th>                                                                                                                                                
                                                                        <th>Aktif ?</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query = mysqli_query($con,"SELECT a.*, IF(a.aktif = 1,'Ya','Tidak') status FROM ".$soalapa." a ORDER BY id DESC");
									$no = 1;
									while ($satuan = mysqli_fetch_assoc($query)) {
										?>
											<!-- Modal -->
										<div class="modal fade" id="DefaultModal<?php echo $no ?>" tabindex="-1" role="dialog" aria-labelledby="DefaultModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="DefaultModalLabel"><center> Apakah Anda Yakin akan menghapus data ?</center>
											  </div>

											  <div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" onclick="location.href='<?php echo $soalapa ?>_action.php?action=hapus&id=<?php echo $satuan['id'] ?>' " >Hapus</button>
											  </div><!-- /.modal-footer -->
											</div><!-- /.modal-content -->
										  </div><!-- /.modal-doalog -->
										</div><!-- /#DefaultModal -->


										<?php

										?>
										<tr class="odd gradeX">
											<td width="5%"><?php echo $no ?></td>                                                                                        
											<td width="30%"><?php echo $satuan['title'] ?></td>                                                                                        
                                                                                        <td width="10%"><?php echo $satuan['status'] ?></td>
											<td width="10%"><a href="<?php echo $soalapa ?>_edit.php?id=<?php echo $satuan['id'] ?>">Edit</a> / <a data-toggle="modal" data-target="#DefaultModal<?php echo $no ?>" href="#" >Hapus</a></td>
										</tr>

									<?php		
									$no++;
									}
								?>								
							</tbody>
						</table>
						</div><!-- /.table-responsive -->
					</div><!-- /.the-box .default -->
					<!-- END DATA TABLE -->
						
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