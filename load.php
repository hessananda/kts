<?php 
require_once("config/koneksi.php");
require_once('config/potong_kata.php');

 $anu = $_POST['data']; 
 $now = date('Y-m-d'); 
 echo $sql = "SELECT * FROM program WHERE aktif = 1 ORDER BY id DESC LIMIT $anu,3 ";
 $query = mysqli_query($con,$sql);
 $count_data = mysqli_num_rows($query);

echo $halo = "SELECT * FROM program WHERE aktif = 1 ";
 $cek = mysqli_query($con,$halo);
 $count_all = mysqli_num_rows($cek);

 $no = 1;
?>
<script>

banteng = <?= $count_data ?>;
cicak = cicak + banteng ;
sapi = <?= $count_all - 4 ?> - cicak;

            if (sapi > 0) {
                $('#btnload').text('LOAD MORE');
            } else{
                $('#btnload').css("display", "none");
            }
</script>
<?php

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
								<p  style="font-size:130%;"><?php echo truncate($program['title'],'25') ?></p>
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