
<?php
echo 'test';exit;
$file='folder/file.jpg';
$penerima='sanca.snake@gmail.com';
$pengirim='CS@hotelkarawang.com';
$nama='Pengirim';
$subjek='Tes kirim email dengan attachment';
$pesan='Ini adalah isi pesan email dengan attachment menggunakan script php';
$ukuran=filesize($file);
$buka=fopen($file,"r");
$baca=fread($buka,$ukuran);
fclose($buka);
$konten=base64_encode($baca);
$konten=chunk_split($konten);
$uid=md5(uniqid(time()));
$nama_file=basename($file);
$header="From:".$nama."<".$pengirim.">\r\n";
$header.="Reply-To:".$pengirim."\r\n";
$header.="MIME-Version: 1.0\r\n";
$header.="Content-Type:multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
$header.="--".$uid."\r\n";
$header.="Content-type:text/plain; charset=iso-8859-1\r\n";
$header.="Content-Transfer-Encoding: 7bit\r\n \r\n";
$header.=$pesan."\r\n\r\n";
$header.="--".$uid."\r\n";
$header.="Content-Type:image/jpeg; name=\"".$nama_file."\"\r\n";
$header.="Content-Transfer-Encoding: base64\r\n";
$header.="Content-Disposition: attachment; filename=\"".$nama_file."\"\r\n\r\n";
$header.=$konten."\r\n\r\n";
$header.="--".$uid."--";
if(mail($penerima,$subjek,$pesan,$header))
{
echo 'email dengan attachement '.$nama_file.' berhasil dikirim';
}
else
{
echo 'email gagal terkirim';
}
?>
