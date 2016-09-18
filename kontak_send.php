<?php
include('config/koneksi.php');

$email_to = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM contact_us where id = '1' "));

echo mysqli_error($con);

$to = $email_to['email'];

$subject = 'Kontak - www.kotatanpasampah.id';

$headers = "From: Kota Tanpa Sampah Website " . strip_tags("info@kotatanpasampah.id") . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
$message .= '<table cellpadding="5">';
$message .= "<tr><td><strong>Nama:</strong> </td><td>" . strip_tags($_POST['nama_depan']) . " " . strip_tags($_POST['nama_belakang']) . "</td></tr>";
$message .= "<tr><td><strong>Kota:</strong> </td><td>" . strip_tags($_POST['kota']) . "</td></tr>";
$message .= "<tr><td><strong>Provinsi:</strong> </td><td>" . strip_tags($_POST['provinsi']) . "</td></tr>";
$message .= "<tr><td><strong>Alamat:</strong> </td><td>" . htmlentities($_POST['alamat']) . "</td></tr>";
$message .= "<tr><td><strong>Telepon:</strong> </td><td>" . strip_tags($_POST['telepon']) . "</td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
$message .= "<tr><td><strong>Facebook:</strong> </td><td>" . htmlentities($_POST['facebook']) . "</td></tr>";
$message .= "<tr><td><strong>Twitter:</strong> </td><td>" . strip_tags($_POST['twitter']) . "</td></tr>";
$message .= "<tr><td><strong>Tentang Proyek:</strong> </td><td>" . strip_tags($_POST['tentang_proyek']) . "</td></tr>";
$message .= "<tr><td><strong>Informasi Tambahan:</strong> </td><td>" . htmlentities($_POST['informasi_tambahan']) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

mail($to, $subject, $message, $headers);
?>
<script type="text/javascript">
	alert("Terimakasih atas pesan yang anda kirim");
	window.location = "index.php";
</script>
